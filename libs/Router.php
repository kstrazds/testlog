<?php

class Router
{
  public function __construct()
  {
    $tokens = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
    $controllerName = ucfirst($tokens[1]) . 'Controller';
  
    if (file_exists('controllers/' . $controllerName . '.php')) {
      require_once('controllers/' . $controllerName . '.php');
      $controller = new $controllerName;

      if (isset($tokens[2])) {
        $actionName = $tokens[2] . 'Action';

        if (isset($tokens[3])) {
            $controller->{$actionName}($tokens[3]);
        } else {
          $controller->{$actionName}();
        }
      } else {
        $controller->showFormsAction();
      }
    }
  }
}
?>
