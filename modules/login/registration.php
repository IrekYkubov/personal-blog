<?php


$pageTitle = "Регистрация на сайте";
$pageClass = "authorization-page";

if (isset($_POST['register'])) {
  if (trim($_POST['email']) == '') {
    $errors[] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = ['title' => 'Введите корректный email'];
  }
  if (trim($_POST['password']) == '') {
    $errors[] = ['title' => 'Введите пароль'];
  } else if (strlen($_POST['password']) <= 4) {
    $errors[] = ['title' => 'Некорректный пароль', 'desc' => '<p>Длина пароля должна быть больше 4-х символов</p>'];
  }
  if (R::count('users', 'email = ?', array($_POST['email'])) > 0) {
    $errors[] = [
      'title' => 'Пользователь с таким email уже зарегистрирован',
      'desc' => '<p>Используйте другой email адрес, или воспользуйтесь <a href="'.HOST.'lost-password">восстановлением пароля</a>.</p>'
    ];
  }

  if (empty($errors)) {
    $user = R::dispense('users');
    $user->email = $_POST['email'];
    $user->role = 'user';
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $result = R::store($user);
    if (is_int($result)) {
      $success[] = ['title' => 'Вы успешно зарегистрировались'];

      // Автологин пользователя
      $_SESSION['logged_user'] = $user;
      $_SESSION['login'] = 1;
      $_SESSION['role'] = $user->role;

      header('Location: ' . HOST . 'profile-edit');
      exit();
    } else {
      $errors[] = ['title' => 'Что то пошло не так...'];
    }
  }
}

ob_start();
include ROOT . 'templates/login/form-registration.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';