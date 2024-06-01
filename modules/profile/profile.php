<?php

$pageTitle = "Профиль пользователя";
$pageClass = "profile-page";

// Проверка есть ли параметр ID
if (isset($uriArray[1])) {
  // Id передан
  // Загружаем данные юзера
  $user = R::load('users', $uriArray[1]);
} else {

  // Проверка авторизован ли пользователь
  if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
    // Залогинен, показываем профиль
    $user = R::load('users', $_SESSION['logged_user']['id']);
  } else {
    $userNotLoggedIn = true;
  }
}



include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/profile/profile.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';