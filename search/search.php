<?php
if(isset($_SESSION['search_error'] )){
    echo '<p class="error_class">' . $_SESSION['search_error'] . '</p>';
    unset($_SESSION['search_error'] );
}
?>

<form class="form" method="POST" action="./search_db.php">
    <div>
        <input type="text" name="search">
    </div>

    <div>
        <input type="submit" value="検索">
    </div>
</form>