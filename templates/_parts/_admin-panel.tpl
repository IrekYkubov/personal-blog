<?php if (isset($_SESSION['login']) && $_SESSION['login'] === 1) : ?>

  <div class="admin-panel">
    <div class="admin-panel__block-list">

      <?php if ($_SESSION['role'] === 'admin') : ?>
      <a class="admin-panel__link" href="#">
        <img src="<?= HOST ?>static/img/admin-panel/target.svg" alt="Перейти в админ панель">
        <div class="span">Панель управления</div>
      </a>
      <?php endif; ?>

      <a class="admin-panel__link" href="<?= HOST ?>profile">
        <img src="<?= HOST ?>static/img/admin-panel/user.svg" alt=" Профиль">
        <div class="span">Профиль</div>
      </a>

      <?php if ($_SESSION['role'] === 'admin') : ?>
      <a class="admin-panel__link" href="#">
        <div class="admin-panel__message" data-number="8"><img src="<?= HOST ?>static/img/admin-panel/mail.svg" alt=" Сообщение"></div>
        <div class="span">Сообщение</div>
      </a>
      <a class="admin-panel__link" href="#">
        <div class="admin-panel__comments" data-number="15"><img src="<?= HOST ?>static/img/admin-panel/message-square.svg" alt="Комментарии"></div>
        <div class="span">Комментарии</div>
      </a>
      <a class="admin-panel__link" href="#"><img src="<?= HOST ?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
        <div class="span">Редактировать</div>
      </a>
      <?php endif; ?>
    </div>

    <a href="<?= HOST ?>logout" class="admin-panel__block-button">Выход</a>
  </div>


  <?php else : ?>

  <div class="admin-panel">

    <div class="admin-panel__block-list">
    </div>

    <a href="<?= HOST ?>login" class="admin-panel__block-button">Вход</a>
  </div>

<?php endif; ?>