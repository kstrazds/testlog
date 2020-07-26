<?php
session_start();
require_once('models/DatabaseConfig.php');
require_once('models/DatabaseConnection.php');
require_once('classes/Auth.php');
require_once('classes/Token.php');
require_once('classes/Mail.php');
require_once('libs/View.php');
require_once('models/NewUser.php');
require_once('libs/Controllers.php');
require_once('libs/Router.php');
new Router;
?>