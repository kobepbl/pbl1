<?php
require_once __DIR__ . '/../header.php';
?>
<?php
require_once __DIR__ . '/../classes/user.php';
$article_id =(int) 53;
$iine = new Iine();
$article = $iine->IineSelect($article_id);
print_r($article);
?>
<form class="form" method="POST" action="./iine_db.php">
        <input type="submit" value=<?=$article[0]?> class="button">
</form>

