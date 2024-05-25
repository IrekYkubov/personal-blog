<?php

$details = R::find('project', 1);


$page_name = "Главная страница";
$page_text = "Текст Главная страница";

ob_start();

include ROOT . 'templates/main/main.tpl';
$content = ob_get_contents();

ob_end_clean();


include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/template.tpl';
include ROOT . 'templates/_parts/_footer.tpl';