<p class="from_to"><?php echo $count; ?>件中 <?php echo $from_record; ?> - <?php echo $to_record; ?> 件目を表示</p>
<div class="pagination">
  <?php if ($page > 1) : ?>
    <a href="index.php?page_id=<?php echo ($page - 1); ?>" class="page_feed">&laquo;</a>
  <?php else :; ?>
    <span class="first_last_page">&laquo;</span>
  <?php endif; ?>
  <?php for ($i = 1; $i <= $max_page; $i++) : ?>
    <?php if ($i >= $page - $range && $i <= $page + $range) : ?>
      <?php if ($i == $page) : ?>
        <span class="now_page_number"><?php echo $i; ?></span>
      <?php else : ?>
        <a href=?page_id=<?php echo $i; ?> class="page_number"><?php echo $i; ?></a>
      <?php endif; ?>
    <?php endif; ?>
  <?php endfor; ?>
  <?php if ($page < $max_page) : ?>
    <a href="index.php?page_id=<?php echo ($page + 1); ?>" class="page_feed">&raquo;</a>
  <?php else : ?>
    <span class="first_last_page">&raquo;</span>
  <?php endif; ?>
</div>