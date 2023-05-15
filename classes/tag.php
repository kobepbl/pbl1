<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/dbdata.php';

// Postクラスの宣言
class  Tag  extends  DbData
{
  public  function  getTags()
  {
    $sql  =  "select  *  from  tags order by tags_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $tags = $stmt->fetchAll();
    return  $tags;
  }

  public function insertTags($article_id, $tag_id)
  {
    $sql = "insert into article_list_tags(article_id,tags_id) values(?,?)";
    $article_tags = $this->exec($sql, [$article_id, $tag_id]);
    return $article_tags;
  }

  // public  function  getArticleid()
  // {
  //   $sql  =  "select  article_id  from  article_list order by article_list.article_id desc LIMIT 0,1";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->execute();
  //   $article_id = $stmt->fetch();
  //   return  $article_id;
  // }
}
