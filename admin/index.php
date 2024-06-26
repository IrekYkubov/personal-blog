<?php

require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "libs/resize-and-crop.php";
require_once ROOT . "libs/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();
session_start();

// Проверка на права доступа
if ( !(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') ) {
  header('Location: ' . HOST . 'login');
  exit();
}

/* ..........................................

РОУТЕР // ROUTE - МАРШРУТ

............................................. */

$uriModule = getModuleNameForAdmin();

// Роутер
switch ($uriModule) {

  case '':
    require(ROOT . "admin/modules/admin/index.php");
    break;

  // ::::::::::::::::::: BLOG :::::::::::::::::::

  case 'blog':
    require ROOT . "admin/modules/blog/index.php";
    break;

  case 'post-new':
    require ROOT . "admin/modules/blog/post-new.php";
    break;

  case 'post-edit':
    require ROOT . "admin/modules/blog/post-edit.php";
    break;

  case 'post-delete':
    require ROOT . "admin/modules/blog/post-delete.php";
    break;

  // ::::::::::::::::::: OTHERS :::::::::::::::::::

  default:
    require ROOT . "admin/modules/admin/index.php";
    break;
}
