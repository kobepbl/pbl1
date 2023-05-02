<?php
if (isset($_SESSION['search_error'])) {
    echo '<p class="error_class">' . $_SESSION['search_error'] . '</p>';
    unset($_SESSION['search_error']);
}
?>

<form class="search" method="GET" action=<?= $search_php ?>?q=>
    <input type="text" class="search_text" maxlength="50" name="q" placeholder="記事を検索">
    <input type="submit" class="search_submit" value="検索">
</form>