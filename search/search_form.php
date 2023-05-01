<?php
if (isset($_SESSION['search_error'])) {
    echo '<p class="error_class">' . $_SESSION['search_error'] . '</p>';
    unset($_SESSION['search_error']);
}
?>

<form class="search" method="GET" action=<?= $search_php ?>?q=>
    <input type="text" name="q" placeholder="記事を検索">
    <input type="submit" value="検索">
</form>