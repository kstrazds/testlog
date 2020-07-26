<?php

use models\NewUser;
use libs\Controllers;
use classes\Auth;

class TestlogController extends Controllers
{
  public function showFormsAction()
  {
    $this->view->render('views/forms.php');
  }

  public function errorAction()
  {
    $this->view->message = "The controller doesn't exist!";
    $this->view->render('views/error/error.php');
  }

  public function createUserAction()
  {
    $user = new NewUser($_POST);

    if ($user->saveUser()) {
      $output = json_encode($user->messages);
      echo $output;
    } else {
      $output = json_encode($user->messages);
      echo $output;
    }
  }

  public function loginAction()
  {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $user = NewUser::authenticate($_POST['email'], $_POST['password']);

      if ($user) {
        Auth::login($user);

        $this->view->render('views/userpanel.php');
      } else {
        $this->view->render('views/forms.php');
      }
    } else {
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/testlog', true, 303);
      exit;
    }
  }

  public function destroySessionAction()
  {
    Auth::logout();

    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/testlog', true, 303);
    exit;
  }
}
?>
