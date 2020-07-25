<?php

use models\NewUser;
use libs\Controllers;

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
    $user = NewUser::authenticate($_POST['email'], $_POST['password']);

    if ($user) {
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/testlog', true, 303);
      exit;
    } else {
      $this->view->render('views/forms.php');
    }
  }
}
?>
