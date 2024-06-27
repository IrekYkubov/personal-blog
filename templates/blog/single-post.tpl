<main class="page-post">
  <section class="page-post__post">
    <div class="section-posts">
      <div class="section-posts__title">
        <h1 class="heading"><?=$post['title']?></h1>
      </div>
      <div class="section-posts__info">
        <? if ($post['timestamp']): ?>
          <?=rus_date('j F Y', $post['timestamp'])?>
        <? endif; ?>
      </div>
      <? if (!empty($post['cover'])): ?>
        <div class="section-posts__img">

            <img src="<?=HOST?>usercontent/blog/<?=$post['cover']?>" alt="<?=$post['title']?>" />

        </div>
      <? endif; ?>
      <div class="section-posts__content">
        <?=$post['content']?>
      </div>
    </div>
    <div class="page-post__post-pagination">
      <div class="post-pagination"> <a class="post-pagination__button" href="#">Назад </a><a class="post-pagination__button post-pagination__button--forward" href="#">Вперед</a></div>
    </div>
  </section>
  <section class="page-post__comments">
    <div class="page-post__title">
      <h2 class="heading">2 комментария </h2>
    </div>
    <div class="page-post__comments-comment">
      <div class="comment">
        <div class="comment__avatar"><a href="#">
            <div class="avatar-small"><img src="./img/avatars/comment-avatars.png" alt="Аватарка" /></div>
          </a>
        </div>
        <div class="comment__data">
          <div class="comment__user-info">
            <div class="comment__username">Джон До</div>
            <div class="comment__date"><img src="./img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
          </div>
          <div class="comment__text">
            <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="page-post__comments-comment">
      <div class="comment">
        <div class="comment__avatar"><a href="#">
            <div class="avatar-small"><img src="./img/avatars/comment-avatar-02.jpg" alt="Аватарка" /></div>
          </a>
        </div>
        <div class="comment__data">
          <div class="comment__user-info">
            <div class="comment__username">Джейн Смитт</div>
            <div class="comment__date"><img src="./img/favicons/clock.svg" alt="Дата публикации" />05 Мая 2017 года в 15:45</div>
          </div>
          <div class="comment__text">
            <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="page-post__post-comments">
    <div class="page-post__title">
      <h2 class="heading">Оставить комментарий </h2>
    </div>
    <div class="page-post__comments-post-comment">
      <div class="post-comment">
        <div class="post-comment__avatar"><a href="#">
            <div class="avatar-small"><img src="./img/avatars/avatar-comment.png" alt="Аватарка" /></div>
          </a>
        </div>
        <form class="post-comment__form">
          <div class="post-comment__form-textarea">
            <textarea class="textarea" placeholder="Введите ваш комментарий..."></textarea>
          </div>
          <div class="post-comment__form-button">
            <button class="primary-button" type="submit">Комментировать</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="page-post__see-also">
    <div class="container">
      <div class="page-post__title">
        <h2 class="heading">Смотрите также </h2>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="card-post">
            <div class="card-post__img"><a href="#"><img src="./img/posts/post-10.jpg" alt="Как устроена подземка в NY. Плюсы и минусы" /></a></div>
            <h4 class="card-post__title"><a href="#"> Как устроена подземка в NY. Плюсы и минусы</a></h4>
          </div>
        </div>
        <div class="col-4">
          <div class="card-post">
            <div class="card-post__img"><a href="#"><img src="./img/posts/post-11.jpg" alt="Летние воспоминания. Трекинг поход по Кавказским горам" /></a></div>
            <h4 class="card-post__title"><a href="#"> Летние воспоминания. Трекинг поход по Кавказским горам</a></h4>
          </div>
        </div>
        <div class="col-4">
          <div class="card-post">
            <div class="card-post__img"><a href="#"><img src="./img/posts/post-12.jpg" alt="Купил дрон. Впечатления и фотосессия " /></a></div>
            <h4 class="card-post__title"><a href="#"> Купил дрон. Впечатления и фотосессия </a></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>