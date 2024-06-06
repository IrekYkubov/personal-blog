<?php

require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "libs/resize-and-crop.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();
session_start();

/* ..........................................

РОУТЕР // ROUTE - МАРШРУТ

............................................. */

// Обработка запроса
$uri = $_SERVER['REQUEST_URI'];

$uriArr = explode('?', $uri); // Разбиваем запрос по символу '?' чтобы отсечь GET запрос
$uri = $uriArr[0]; // /admin/blog?id=15 => /admin/blog
$uri = rtrim($uri, "/"); // Обрезаем слеш в конце /admin/blog/ => /admin/blog
$uri = substr($uri, 1); // Обрезаем слеш в начале /admin/blog => admin/blog
$uri = filter_var($uri, FILTER_SANITIZE_URL);

$moduleNameArr = explode('/', $uri);
// Разбиваем строку запроса по символу / и получаем массив
// admin/blog => ['admin', 'blog']

$uriModule = $moduleNameArr[1];  // Достаем имя модуля который надо запустить admin/blog => blog

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
