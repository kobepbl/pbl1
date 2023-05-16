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

  public function insert_q_Tags($question_id, $tag_id)
  {
    $sql = "insert into question_list_tags(question_id,tags_id) values(?,?)";
    $question_tags = $this->exec($sql, [$question_id, $tag_id]);
    return $question_tags;
  }

  public function getTags_id($article_id)
  {
    $sql = "select tags_id from article_list_tags where article_id=?";
    $stmt = $this->query($sql, [$article_id]);
    $tags_id = $stmt->fetchAll();
    return $tags_id;
  }

  public function tagShow($article_id)
  {
    $sql = "select tags from tags join article_list_tags on tags.tags_id = article_list_tags.tags_id where article_id = ?";
    $tag_names = $this->exec($sql, [$article_id]);
    return $tag_names;
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
