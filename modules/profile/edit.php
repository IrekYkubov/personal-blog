<?php

function updateProfile($user)
{
  if (isset($_POST['updateProfile'])) {

    // Проверить поля на заполненность
    if ( trim($_POST['name']) === '') {
      $_SESSION['errors'][] = ['title' => 'Введите имя'];
    }
    if ( trim($_POST['surname']) === '') {
      $_SESSION['errors'][] = ['title' => 'Введите фамилию'];
    }
    if ( trim($_POST['email']) === '') {
      $_SESSION['errors'][] = ['title' => 'Введите Email'];
    }

    // Обновить инфу в БД
    if (empty($_SESSION['errors'])) {
      $user->name = htmlentities($_POST['name']);
      $user->surname = htmlentities($_POST['surname']);
      $user->email = htmlentities($_POST['email']);
      $user->city = htmlentities($_POST['city']);
      $user->country = htmlentities($_POST['country']);

      // Работа с файлом фотографии для аватара пользователя
      if ( isset($_FILES['avatar']['name']) && $_FILES['avatar']['tmp_name'] !== '') {

        // echo $_FILES['avatar']['name'];
        // echo $_FILES['avatar']['tmp_name'];
        // die();

        // 1. Записываем параметры файла в переменные
        $fileName = $_FILES["avatar"]["name"];
        $fileTmpLoc = $_FILES["avatar"]["tmp_name"];
        $fileType = $_FILES["avatar"]["type"];
        $fileSize = $_FILES["avatar"]["size"];
        $fileErrorMsg = $_FILES["avatar"]["error"];
        $kaboom = explode(".", $fileName);
        $fileExt = end($kaboom);

        // 2. Проверка файла на корректность
        // 2.1 Проверка на маленький размер изображения
        list($width, $height) = getimagesize($fileTmpLoc);
        if ($width < 160 || $height < 160) {
          $_SESSION['errors'][] = [
            'title' => 'Изображение слишком маленького размера. ',
            'desc' => 'Загрузите изображение побольше.'
          ];
        }

        // 2.2 Проверка на большой вес файла
        if ($fileSize > 4194304) {
          $_SESSION['errors'][] = ['title' => 'Файл изображения не должен быть более 4 Mb'];
        }

        // 2.3 Проверка на формат файла
        if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
          $_SESSION['errors'][]  = ['title' => 'Неверный формат файла', 'desc' => '<p>Файл изображения должен быть в формате gif, jpg, jpeg, или png.</p>',];
        }

        // 2.4 Проверка на ошибки файла
        if ($fileErrorMsg == 1) {
          $_SESSION['errors'][] = ['title' => 'При загрузке изображения произошла ошибка. Повторите попытку'];
        }

        // Если нет ошибок - двигаемся дальше
        if (empty($_SESSION['errors'])) {

          // Поверям установлен ли аватар у пользователя
          $avatar = $user->avatar;
          $avatarFolderLocation = ROOT . 'usercontent/avatars/';

          // Если у подльзователя уже есть старый аватар - тогда удаляем его
          if (!empty($avatar)) {
            // Определяем путь к большой аватарке и удаляем ее
            $pictureUrl = $avatarFolderLocation . $avatar;
            file_exists($pictureUrl) ? unlink($pictureUrl) : '' ;

            // Определяем путь к маленькой аватарке и удаляем ее
            $pictureUrl48 = $avatarFolderLocation . '48-' . $avatar;
            file_exists( $pictureUrl48) ? unlink($pictureUrl48) : '';
          }

          $db_file_name = rand(100000000000,999999999999) . "." . $fileExt;
          $uploadfile160 = $avatarFolderLocation . $db_file_name;
          $uploadfile48 = $avatarFolderLocation . '48-' . $db_file_name;
          // Обработать фотографию
          // 1. Обрезать до 160х160
          $result168 = resize_and_crop($fileTmpLoc, $uploadfile160, 160, 160);
          // 2. Обрезать до 48х48
          $result148 = resize_and_crop($fileTmpLoc, $uploadfile48, 48, 48);
          if ($result168 != true || $result148 != true) {
            $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
            return false;
          }

          // Сохраняем имя файла в БД
          $user->avatar = $db_file_name;
          $user->avatarSmall = '48-' . $db_file_name;

        }

      }

      if (isset($_POST['delete-avatar']) && $_POST['delete-avatar'] == 'on') {
        // Удалить файлы аватарки
        $avatarFolderLocation = ROOT . 'usercontent/avatars/';
        unlink($avatarFolderLocation . $user->avatar);
        unlink($avatarFolderLocation . '48-' . $user->avatar);

        // Удалить записи в БД
        $user->avatar = '';
        $user->avatarSmall = '';
      }

      R::store($user);
      if ($user->id === $_SESSION['logged_user']['id']) {
        $_SESSION['logged_user'] = $user;
      }

      header('Location: ' . HOST . 'profile/' . $user->id);
      exit();
    }

  }
}

// Проверка на что что юзер залогинен
if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
  // Юзер залогинен

  // Проверка на роль Юзера (пользователь или админ)
  if ($_SESSION['logged_user']['role'] === 'user') {
    // Это обычный пользователь
    $user = R::load('users', $_SESSION['logged_user']['id']);
    updateProfile($user);

  } else if ($_SESSION['logged_user']['role'] === 'admin' ) {
    // Это Администратор сайта

    if (isset($uriGet)) {
      $user = R::load('users', intval($uriGet));
      updateProfile($user);
    } else {
      $user = R::load('users', $_SESSION['logged_user']['id']);
      updateProfile($user);
    }

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