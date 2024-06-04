<?php
if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
  // Если админ
  if ($_SESSION['logged_user']['role'] === 'admin' ) {
    //  Админ открыл свой профиль
    if ($_SESSION['logged_user']['id'] === $user->id ) {
      echo "<a class=\"secondary-button\" href=\"" . HOST ."profile-edit\">Редактировать</a>";
    } else {
      echo "<a class=\"secondary-button\" href=\"" . HOST . "profile-edit/". $user->id ."\">Редактировать</a>";
    }
    // Если Юзер
  } else if($_SESSION['logged_user']['role'] === 'user' ) {
    // Юзер открыл свой профиль
    if ($_SESSION['logged_user']['id'] === $user->id ) {
      echo "<a class=\"secondary-button\" href=\"" . HOST ."profile-edit\">Редактировать</a>";
    }
  }
}
?>