<form class="authorization-form" method="POST" action="<?php echo HOST; ?>registration">
  <div class="authorization-form__heading">
    <h2 class="heading">Регистрация </h2>
  </div>
  <?php include ROOT . "templates/components/errors.tpl"; ?>
  <?php include ROOT . "templates/components/success.tpl"; ?>
  <div class="authorization-form__input">
    <input name="email" class="input" type="text" placeholder="Email" />
  </div>
  <div class="authorization-form__input">
    <input name="password" class="input" type="password" placeholder="Пароль" />
  </div>
  <div class="authorization-form__button">
    <button name="register" value="register" class="primary-button" type="submit">Зарегистрироваться</button>
  </div>
  <div class="authorization-form__links"><a>Вход на сайт</a></div>
</form>