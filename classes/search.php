<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/dbdata.php';

// Postクラスの宣言
class  Search  extends  DbData
{
  // 検索されたすべての記事を逆順でを取り出す
  public  function  getSearcharticles($search_word)
  {
    $sql  = "select  *  from  article_list join current_users on article_list.user_id = current_users.user_id where sentence like '" . "%" . $search_word . "%" . "' order by article_list.article_id desc";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $search_articles = $stmt->fetchAll();
    return  $search_articles;
  }
}
