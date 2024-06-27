<?php

if (isset($uriGet)) {
  // Id передан
  // Загружаем данные записи
  $post = R::load('posts', $uriGet);

  ob_start();
  include ROOT . 'templates/blog/single-post.tpl';
  $content = ob_get_contents();
  ob_end_clean();

} else {
  $posts = R::find('posts', 'ORDER BY id DESC');
  ob_start();
  include ROOT . 'templates/blog/all-posts.tpl';
  $content = ob_get_contents();
  ob_end_clean();

}



$pageTitle = "Блог - все записи";

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/blog/index.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';