<main class="page-profile">
  <div class="section">
    <div class="section__title">
      <div class="container">
        <h2 class="heading">Редактировать профиль </h2>
      </div>
    </div>
    <div class="section__body">
      <form action="<?=HOST?>profile-edit" method="POST">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="form-group">
                <label class="input__label">Введите имя
                  <input class="input input--width-label" type="text" placeholder="Имя" name="name" value="<?= $user->name ?>" />
                </label>
              </div>
              <div class="form-group">
                <label class="input__label">Введите фамилию
                  <input class="input input--width-label" type="text" placeholder="Фамилия" name="surname" value="<?= $user->surname ?>" />
                </label>
              </div>
              <div class="form-group">
                <label class="input__label">Введите email
                  <input
                          class="input input--width-label"
                          type="text"
                          placeholder="Email"
                          name="email"
                          value="<?= $user->email ?>"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="row justify-content-center pt-40 pb-40">
            <div class="col-2">
              <div class="avatar-big"><img src="<?= HOST ?>static/img/section-about-me/img-01.jpg" alt="Аватарка" /></div>
            </div>
            <div class="col-6">
              <div class="block-upload">
                <div class="block-upload__description">
                  <div class="block-upload__title">Фотография</div>
                  <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
                  <div class="block-upload__file-wrapper">
                    <button class="file-button" type="file">Выбрать файл</button>
                    <div class="block-upload__file-name">Файл не выбран</div>
                  </div>
                </div>
              </div>
              <button class="delete-button mt-20" type="reset">Удалить</button>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="form-group">
                <label class="input__label">Введите страну
                  <input class="input input--width-label" type="text" placeholder="Страна" name="country" value="<?= $user->country ?>" />
                </label>
              </div>
              <div class="form-group">
                <label class="input__label">Введите город
                  <input class="input input--width-label" type="text" placeholder="Город" name="city" value="<?= $user->city ?>" />
                </label>
              </div>
              <div class="form-group form-group--buttons-left">
                <button name="updateProfile" class="primary-button" type="submit">Сохранить</button>
                <a class="secondary-button" href="<?= HOST ?>profile">Отмена</a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>