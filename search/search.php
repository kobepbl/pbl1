<?php
require_once __DIR__ . '/../header.php';
?>
<?php
if(isset($_SESSION['search_error'] )){
    echo '<p class="error_class">' . $_SESSION['search_error'] . '</p>';
    unset($_SESSION['search_error'] );
}
?>

<form class="search" method="POST" action="./search/search_db.php">
    <input type="text" name="search">    
    <input type="submit" value="検索">
</form>