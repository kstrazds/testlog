<?php

namespace classes;

use models\NewUser;

class Auth
{
  public static function login($user)
  {
    session_regenerate_id(true);

    $_SESSION['user_id'] = $user->id;
  }

  public static function logout()
  {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();

      setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
      );
    }

    session_destroy();
  }

  public static function isLoggedIn()
  {
    return isset($_SESSION['user_id']);
  }

  public function getUser()
  {
    if (isset($_SESSION['user_id'])) {
      return NewUser::findById($_SESSION['user_id']);
    }
  }
}
?>