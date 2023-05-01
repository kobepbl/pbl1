<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/dbdata.php';

// Postクラスの宣言
class  Search  extends  DbData
{
  // 検索されたすべての記事を逆順でを取り出す
  public  function  getSearcharticles($search_word)
  {
    $sql  =  "
    WITH article_username AS(
      SELECT
          name
      FROM
          current_users AS cu
      INNER JOIN
          article_list AS al
      ON
          cu.user_id = al.user_id
      WHERE
          al.sentence LIKE '%?%'
    ),
    search AS(
      SELECT
          (SELECT * FROM article_username),
          title,
          sentence,
          like_count,
          creation_date
      FROM
          article_list
      WHERE
          sentence LIKE '%?%'
    )
    SELECT
      *
    FROM
      search";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($search_word);
    $search_articles = $stmt->fetchAll();
    return  $search_articles;
  }
}
