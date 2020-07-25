<?php
namespace models;

use PDO;

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

    if (empty($this->messages)){
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

    if (strlen($this->password) < 6) {
      $this->messages[] = 'Please enter atleast 6 character for the password!';
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
}
?>