<?php


// Проверка на что что юзер залогинен
if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
  // Юзер залогинен

  // Проверка на роль Юзера (пользователь или админ)
  if ($_SESSION['logged_user']['role'] === 'user') {
    // Это обычный пользователь
    $user = R::load('users', $_SESSION['logged_user']['id']);

    if (isset($_POST['updateProfile'])) {

      // Проверить поля на заполненность
      if ( trim($_POST['name']) === '') {
        $errors[] = ['title' => 'Введите имя'];
      }
      if ( trim($_POST['surname']) === '') {
        $errors[] = ['title' => 'Введите фамилию'];
      }
      if ( trim($_POST['email']) === '') {
        $errors[] = ['title' => 'Введите Email'];
      }

      // Обновить инфу в БД
      if (empty($errors)) {
        $user->name = htmlentities($_POST['name']);
        $user->surname = htmlentities($_POST['surname']);
        $user->email = htmlentities($_POST['email']);
        $user->city = htmlentities($_POST['city']);
        $user->country = htmlentities($_POST['country']);

        R::store($user);
        $_SESSION['logged_user'] = $user;
        header('Location: ' . HOST . 'profile');
        exit();
      }

    }


  } else if ($_SESSION['logged_user']['role'] === 'admin' ) {
    // Это Администратор сайта

  }

} else {
  header('Location: ' . HOST . 'login');
  exit();
}



$pageTitle = "Редактировать профиль";


include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/profile/profile-edit.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';