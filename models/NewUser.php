<?php
namespace models;

use PDO;
use classes\Token;
use classes\Mail;

class NewUser extends DatabaseConnection
{
  public function __construct($data = [])
  {
    foreach ($data as $key => $value) {
      $this->$key = $value;
    }
  }

  public function saveUser()
  {
    $this->validateData();

    if (empty($this->messages)) {
      $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

      $sql = 'INSERT INTO users (name, email, password_hash) VALUES (:name, :email, :password_hash)';

      $db = static::getDB();

      $this->messages[] = 'Registration successful!';

      $stmt = $db->prepare($sql);

      $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
      $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

      $stmt->execute();

      return true;
    }

    return false;
  }

  public function validateData()
  {
    if ($this->name == '') {
      $this->messages[] = 'Name is required!';
    }

    if ($this->existingEmail($this->email)) {
      $this->messages[] = 'Email is already registered!';
    }

    if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
      $this->messages[] = 'Invalid email!';
    }
  
    if (isset($this->password)) {
      if (strlen($this->password) < 6) {
        $this->messages[] = 'Please enter atleast 6 character for the password!';
      }
    }
  }

  public static function existingEmail($email)
  {
    return static::findByEmail($email) !== false;
  }

  public static function findByEmail($email)
  {
    $sql = 'SELECT * FROM users WHERE email = :email';

    $db = static::getDB();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

    $stmt->execute();

    return $stmt->fetch();
  }

  public static function authenticate($email, $password)
  {
    $user = static::findByEmail($email);

    if ($user && password_verify($password, $user->password_hash)) {
      return $user;
    }

    return false;
  }

  public function findById($id)
  {
    $sql = 'SELECT * FROM users WHERE id = :id';

    $db = static::getDB();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

    $stmt->execute();

    return $stmt->fetch();
  }

  public static function sendPasswordReset($email)
  {
    $user = static::findByEmail($email);

    if ($user && $user->startPasswordReset()) {
      $user->sendPasswordResetEmail();
    }
  }

  protected function startPasswordReset()
  {
    $token = new Token();
    $hashed_token = $token->getHash();
    $this->password_reset_token = $token->getValue();

    $expiry_timestamp = time() + 60 * 60 * 2; // 2hours

    $sql = 'UPDATE users SET password_reset_hash = :token_hash, password_reset_expiry = :expires_at WHERE id = :id';

    $db = static::getDB();
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
    $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $expiry_timestamp), PDO::PARAM_STR);
    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  protected function sendPasswordResetEmail()
  {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/testlog/reset/' . $this->password_reset_token;

    $text = "Please click on the following URL to reset password: $url";
    $html = "Please click <a href=\"url\">here</a> to reset your password.";

    Mail::send($this->email, 'Password reset', $text, $html);
  }

  public function findByPasswordReset($token)
  {
    $token = new Token($token);
    $hashed_token = $token->getHash();

    $sql = 'SELECT * FROM users WHERE password_reset_hash = :token_hash';

    $db = static::getDB();
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

    $stmt->execute();

    $user = $stmt->fetch();

    if ($user && strtotime($user->password_reset_expiry) > time()) {
      return $user;
    }
  }

  public function resetPassword($password)
  {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'UPDATE users 
            SET password_hash = :password_hash,
                password_reset_hash = NULL,
                password_reset_expiry = NULL
            WHERE id = :id';

    $db = static::getDB();
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
    $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function updateUserProfile($data)
  {
    $this->name = $data['name'];
    $this->email = $data['email'];

    if ($data['age'] != '') {
      $this->age = $data['age'];
    } else {
      $this->age = null;
    }

    // As the password update for logged in users are optional, empty field won't update password.
    if ($data['password'] != '') {
      $this->password = $data['password'];
    }

    $this->validateData();

    if (empty($this->errors)) {
      $sql = 'UPDATE users 
              SET name = :name';
      
      if ($data['age'] != '') {
        $sql .= ', age = :age';
      }

      $sql .= ',email = :email';

      if (isset($this->password)) {
        $sql .= ', password_hash = :password_hash';
      }
      
      $sql .= "\nWHERE id = :id";

      $db = static::getDB();
      $stmt = $db->prepare($sql);

      $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);

      if (isset($this->age)) {
        $stmt->bindValue(':age', $this->age, PDO::PARAM_STR);
      }
      
      $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
      $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

      if (isset($this->password)) {
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);
      }
      
      return $stmt->execute();
    }

    return false;
  }
}
?>