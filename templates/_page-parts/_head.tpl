<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?php echo $pageTitle; ?></title>
  <meta name="keywords" />
  <meta name="description" />
  <link rel="stylesheet" href="<?php echo HOST; ?>static/css/main.css" />
  <link rel="stylesheet" href="<?php echo HOST; ?>static/css/custom.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Playfair+Display:400,700&amp;display=swap&amp;subset=cyrillic-ext" rel="stylesheet" />
</head>

<?php if (isset($pageClass) && $pageClass === 'authorization-page') : ?>
  <body class="authorization-page">
<?php else : ?>
  <body class="sticky-footer <?php echo isset($pageClass) ? $pageClass : '' ?>">
<?php endif; ?>