<main class="page-profile">

  <?php if (isset($userNotLoggedIn)): ?>

    <div class="section">
      <div class="container">
        <div class="section__title">
          <h2 class="heading mb-35">Профиль пользователя</h2>
          <p>Для просмотра профиля, <a href="<?=HOST?>registration">зарегестрируйтесь</a> или <a href="<?=HOST?>login">войдите</a> на сайт</p>
        </div>
      </div>
    </div>

  <?php elseif ($user->id === 0): ?>

    <div class="section">
      <div class="container">
        <div class="section__title">
          <h2 class="heading mb-35">Такого пользователя нет</h2>
          <p>Вернуться на <a href="<?=HOST?>">главную страницу</a>.</p>
        </div>
      </div>
    </div>

  <?php else: ?>

    <div class="section">
    <div class="container">
      <div class="section__title">
        <h2 class="heading">Профиль пользователя </h2>
      </div>
      <div class="section__body">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <?php include ROOT . "templates/components/errors.tpl"; ?>
            <?php include ROOT . "templates/components/success.tpl"; ?>
          </div>
        </div>

        <?php if (empty($user->name)) : ?>

          <!-- Профиль пуст -->
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="enter-or-reg flex-column flex-column-elements-margin">
                <div class="enter-or-reg__text">
                  😐 Пустой профиль
                </div>
                <?php
                  include ROOT . "templates/profile/_parts/profile-edit-button.tpl";
                ?>
              </div>
            </div>
          </div>

        <?php else : ?>
          <div class="row justify-content-center">
            <div class="col-md-2">
              <div class="avatar-big">
                <?php if (!empty($user->avatar)) : ?>
                  <img src="<?=HOST ?>usercontent/avatars/<?=$user->avatar?>" alt="Аватарка" />
                <?php else : ?>
                  <img src="<?=HOST ?>usercontent/avatars/no-avatar.png" alt="Аватарка" />
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="definition-list mb-20">
                <?php if (!empty($user->name)) : ?>
                  <dl class="definition">
                    <dt class="definition__term">имя и фамилия</dt>
                    <dd class="definition__description"> <?= $user->name ?> <?= $user->surname ?></dd>
                  </dl>
                <?php endif; ?>
                <?php if (!empty($user->country) || !empty($user->city)) : ?>
                  <dl class="definition">
                    <dt class="definition__term">

                      <?php if (!empty($user->country)) : ?>
                      Страна
                      <?php endif; ?>

                      <?php if (!empty($user->country) && !empty($user->city)) : ?>
                      ,
                      <?php endif; ?>

                      <?php if (!empty($user->city)) : ?>
                      город
                      <?php endif; ?>

                    </dt>
                    <dd class="definition__description">
                      <?=$user->country ?>

                      <?php if (!empty($user->country) && !empty($user->city)) : ?>
                      ,
                      <?php endif; ?>

                      <?=$user->city ?>
                    </dd>
                  </dl>
                <?php endif; ?>
              </div>
              <?php
                include ROOT . "templates/profile/_parts/profile-edit-button.tpl";
              ?>

            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
    <div class="section bg-grey">
    <div class="container">
      <div class="section__title">
        <h2 class="heading">Комментарии пользователя </h2>
      </div>
      <div class="section__body">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="comment">
              <div class="comment__avatar"><a href="#">
                  <div class="avatar-small"><img src="<?=HOST ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                </a>
              </div>
              <div class="comment__data">
                <div class="comment__user-info">
                  <div class="comment__username">Джон До</div>
                  <div class="comment__date"><img src="<?=HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                </div>
                <div class="comment__text">
                  <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                </div>
              </div>
            </div>
            <div class="comment">
              <div class="comment__avatar"><a href="#">
                  <div class="avatar-small"><img src="<?=HOST ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                </a>
              </div>
              <div class="comment__data">
                <div class="comment__user-info">
                  <div class="comment__username">Джон До</div>
                  <div class="comment__date"><img src="<?=HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                </div>
                <div class="comment__text">
                  <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                </div>
              </div>
            </div>
            <div class="comment">
              <div class="comment__avatar"><a href="#">
                  <div class="avatar-small"><img src="<?=HOST ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                </a>
              </div>
              <div class="comment__data">
                <div class="comment__user-info">
                  <div class="comment__username">Джон До</div>
                  <div class="comment__date"><img src="<?=HOST ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                </div>
                <div class="comment__text">
                  <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php endif;?>
</main>