<?php
require_once "config.php";
require_once "db.php";
require_once "libs/resize-and-crop.php";
require_once ROOT . "./libs/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();
session_start();
// router
$uriModule = getModuleName();
$uriGet = getUriGet();

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