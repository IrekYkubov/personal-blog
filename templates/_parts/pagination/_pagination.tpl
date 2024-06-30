<div class="section-pagination">
    <?php
        // Кнопка Назад
        include ROOT . "templates/_parts/pagination/_button-prev.tpl";

        if ($pagination['number_of_pages'] > 6){
            // Если больше 6 страниц
            include ROOT . "templates/_parts/pagination/_pages-more-then-6.tpl";
        } else {
            // Если 6 или меньше
            include ROOT . "templates/_parts/pagination/_page-loop.tpl";
        }

        // Кнопка Вперед
        include ROOT . "templates/_parts/pagination/_button-next.tpl";
    ?>
</div>