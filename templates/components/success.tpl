<?php
if (!empty($success)):
  foreach ($success as $item):
    if (count($item) == 2): ?>
      <div class="notifications notifications__title--with-message mb-3">
        <div class="notifications__title notifications__title--success"><?php echo $item['title']; ?></div>
        <div class="notifications__message">
          <?php echo $item['desc']; ?>
        </div>
      </div>
    <?php elseif (count($item) == 1): ?>
      <div class="notifications mb-3">
        <div class="notifications__title notifications__title--success"><?php echo $item['title']; ?></div>
      </div>
    <?php endif;
  endforeach;
endif;
?>