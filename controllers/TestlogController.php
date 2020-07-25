<?php

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
}
?>
