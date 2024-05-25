<?php

$page_name = "О нас страница";
$page_text = "Текст О нас страница";

ob_start();

include ROOT . 'templates/about/about.tpl';
$content = ob_get_contents();

ob_end_clean();


include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/template.tpl';
include ROOT . 'templates/_parts/_footer.tpl';