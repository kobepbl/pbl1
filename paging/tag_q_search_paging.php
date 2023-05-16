<p class="from_to"><?php echo $q_count; ?>件中 <?php echo $q_from_record; ?> - <?php echo $q_to_record; ?> 件目を表示</p>
<div class="pagination">
  <?php if ($page > 1) : ?>
    <a href="tag_search_result.php?tag=<?php echo ($tag); ?>&a_page_id=<?php echo ($page); ?>&q_page_id=<?php echo ($q_page - 1); ?>" class="page_feed">&laquo;</a>
  <?php else :; ?>
    <span class="first_last_page">&laquo;</span>
  <?php endif; ?>
  <?php for ($q_i = 1; $q_i <= $q_max_page; $q_i++) : ?>
    <?php if ($q_i >= $q_page - $q_range && $q_i <= $q_page + $q_range) : ?>
      <?php if ($q_i == $q_page) : ?>
        <span class="now_page_number"><?php echo $q_i; ?></span>
      <?php else : ?>
        <a href=?tag=<?php echo ($tag); ?>&a_page_id=<?php echo $page; ?>&q_page_id=<?php echo $q_i; ?> class="page_number"><?php echo $q_i; ?></a>
      <?php endif; ?>
    <?php endif; ?>
  <?php endfor; ?>
  <?php if ($q_page < $q_max_page) : ?>
    <a href="tag_search_result.php?tag=<?php echo ($tag); ?>&a_page_id=<?php echo ($page); ?>&q_page_id=<?php echo ($q_page + 1); ?>" class="page_feed">&raquo;</a>
  <?php else : ?>
    <span class="first_last_page">&raquo;</span>
  <?php endif; ?>
</div>