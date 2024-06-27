<?php

// Поиск названия модуля для Админки
function getModuleNameForAdmin()
{
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    /*
    * /admin/blog?id=15
    * /admin/blog/
    */
    $uriArr = explode('?', $uri); // Разбиваем запрос по символу '?' чтобы отсечь GET запрос
    $uri = $uriArr[0]; // /admin/blog?id=15 => /admin/blog
    $uri = rtrim($uri, "/"); // Обрезаем слеш в конце /admin/blog/ => /admin/blog
    $uri = substr($uri, 1); // Обрезаем слеш в начале /admin/blog => admin/blog
    $uri = filter_var($uri, FILTER_SANITIZE_URL);

    $moduleNameArr = explode('/', $uri);
    // Разбиваем строку запроса по символу / и получаем массив
    // admin/blog => ['admin', 'blog']

    // Достаем имя модуля который надо запустить admin/blog => blog
    $uriModule = isset($moduleNameArr[1]) ? $moduleNameArr[1] : null;

    return $uriModule; // blog
}

// Поиск названия модуля
function getModuleName()
{
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    /*
    * /admin/blog?id=15
    * /admin/blog/
    */
    $uriArr = explode('?', $uri); // Разбиваем запрос по символу '?' чтобы отсечь GET запрос
    $uri = $uriArr[0]; // /admin/blog?id=15 => /admin/blog
    $uri = rtrim($uri, "/"); // Обрезаем слеш в конце /admin/blog/ => /admin/blog
    $uri = substr($uri, 1); // Обрезаем слеш в начале /admin/blog => admin/blog
    $uri = filter_var($uri, FILTER_SANITIZE_URL);

    $moduleNameArr = explode('/', $uri);
    // Разбиваем строку запроса по символу / и получаем массив
    // admin/blog => ['admin', 'blog']

    $uriModule = $moduleNameArr[0]; // Достаем имя модуля который надо запустить admin/blog => blog

    return $uriModule; // blog
}

// Аналог get запроса из URI
function getUriGet()
{
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, "/"); // 'site.ru/' => 'site.ru'
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $uri = substr($uri, 1);
    $uri = explode('?', $uri); // ['profile/15', 'id=20']
    $uri = $uri[0];
    $uriArr = explode('/', $uri); // ['profile', '15']
    $uriGet = isset($uriArr[1]) ? $uriArr[1] : null;
    return $uriGet; // profile/15 => 15
}

function rus_date(){
  // Перевод
  $translate = array(
    "am" => "дп",
    "pm" => "пп",
    "AM" => "ДП",
    "PM" => "ПП",
    "Monday" => "Понедельник",
    "Mon" => "Пн",
    "Tuesday" => "Вторник",
    "Tue" => "Вт",
    "Wednesday" => "Среда",
    "Wed" => "Ср",
    "Thursday" => "Четверг",
    "Thu" => "Чт",
    "Friday" => "Пятница",
    "Fri" => "Пт",
    "Saturday" => "Суббота",
    "Sat" => "Сб",
    "Sunday" => "Воскресенье",
    "Sun" => "Вс",
    "January" => "Января",
    "Jan" => "Янв",
    "February" => "Февраля",
    "Feb" => "Фев",
    "March" => "Марта",
    "Mar" => "Мар",
    "April" => "Апреля",
    "Apr" => "Апр",
    "May" => "Мая",
    "May" => "Мая",
    "June" => "Июня",
    "Jun" => "Июн",
    "July" => "Июля",
    "Jul" => "Июл",
    "August" => "Августа",
    "Aug" => "Авг",
    "September" => "Сентября",
    "Sep" => "Сен",
    "October" => "Октября",
    "Oct" => "Окт",
    "November" => "Ноября",
    "Nov" => "Ноя",
    "December" => "Декабря",
    "Dec" => "Дек",
    "st" => "ое",
    "nd" => "ое",
    "rd" => "е",
    "th" => "ое"
  );
  // если передали дату, то переводим ее
  if ( func_num_args() > 1 ) {
    return strtr(date(func_get_arg(0), func_get_arg(1)), $translate);
  }
  // иначе генерируем текущее время
  else {
    return strtr(date(func_get_arg(0)), $translate);
  }
}