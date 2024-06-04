<?php
require_once "config.php";
require_once "db.php";
require_once "libs/resize-and-crop.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();
session_start();
// router
$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, '/');
$uri = filter_var($uri, FILTER_SANITIZE_URL);
$uri = substr($uri, 1);
$uri = explode('?', $uri);

$uriGet = isset($uri[1]) ? $uri[1] : NULL;
$uriArray = explode('/', $uri[0]);
$uriModule = $uriArray[0];

switch ($uriModule) {
  case '':
    require ROOT . "modules/main/index.php";
    break;

  // ::::::::::::::::::: USERS :::::::::::::::::::

  case 'login':
    require ROOT . "modules/login/login.php";
    break;

  case 'registration':
    require ROOT . "modules/login/registration.php";
    break;

  case 'logout':
    require ROOT . "modules/login/logout.php";
    break;

  case 'lost-password':
    require ROOT . "modules/login/lost-password.php";
    break;

  case 'set-new-password':
    require ROOT . "modules/login/set-new-password.php";
    break;

  case 'profile':
    require ROOT . "modules/profile/profile.php";
    break;

  case 'profile-edit':
    require ROOT . "modules/profile/edit.php";
    break;

  // ::::::::::::::::::: OTHERS :::::::::::::::::::

  case 'about':
    require ROOT . "modules/about/index.php";
    break;
  case 'blog':
    require ROOT . "modules/blog/index.php";
    break;
  case 'contact':
    require ROOT . "modules/contacts/index.php";
    break;
  default:
    echo "Main 404";
    break;
}