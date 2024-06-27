<main class="page-blog">
  <div class="container">
    <div class="page-blog__header">
      <h2 class="heading">Блог </h2>
    </div>
    <div class="page-blog__posts">
      <?php foreach($posts as $post): ?>
      <div class="card-post">
        <div class="card-post__img"><a href="<?=HOST?>blog/<?=$post['id']?>"><img src="<?=HOST?>usercontent/blog/<? echo empty($post['cover_small']) ? 'no-photo.jpg' : $post['cover_small'] ?>" alt="<?=$post['title']?>" /></a></div>
        <h4 class="card-post__title"><a href="<?=HOST?>blog/<?=$post['id']?>"><?=$post['title']?></a></h4>
      </div>
      <?php endforeach; ?>

    </div>
    <div class="page-blog__pagination">
      <div class="section-pagination">
        <div class="section-pagination__item"><a class="pagination-button" href="#">назад</a>
        </div>
        <div class="section-pagination__item"> <a class="pagination-button active" href="#">1</a>
        </div>
        <div class="section-pagination__item"><a class="pagination-button" href="#">2</a>
        </div>
        <div class="section-pagination__item"><a class="pagination-button" href="#">3</a>
        </div>
        <div class="section-pagination__item"><a class="pagination-button" href="#">вперед</a>
        </div>
      </div>
    </div>
  </div>
</main>