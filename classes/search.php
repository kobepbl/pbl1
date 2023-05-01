<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/dbdata.php';

// Postクラスの宣言
class  Search  extends  DbData
{
  // 検索されたすべての記事を逆順でを取り出す
  public  function  getSearcharticles($search_word)
  {
    $sql  = "SELECT
    article_id,
    cu.user_id,
    name,
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list AS al
INNER JOIN
    current_users AS cu
ON
    cu.user_id = al.user_id
WHERE
    sentence LIKE '" . "%" . $search_word . "%" . "'
ORDER BY
    creation_date DESC
;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $search_articles = $stmt->fetchAll();
    return  $search_articles;
  }
}
// "select  *  from  article_list join current_users on article_list.user_id = current_users.user_id where sentence like '" . "%" . $search_word . "%" . "' order by article_list.article_id desc";