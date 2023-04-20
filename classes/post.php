<?php
// スーパークラスであるDbDataを利用するため
require_once __DIR__ . '/dbdata.php';

// Postクラスの宣言
class  Post  extends  DbData
{
    // すべての記事を逆順でを取り出す
    public  function  getArticles()
    {
        $sql  =  "select  *  from  article_list join current_users on article_list.user_id = current_users.user_id order by article_list.article_id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll();
        return  $articles;
    }

    // 選択された記事を取り出す
    public function getArticle($article_id)
    {
        $sql = "select * from article_list join current_users on article_list.user_id = current_users.user_id where article_id = ?";
        $stmt = $this->query($sql, [$article_id]);
        $article = $stmt->fetch();
        return $article;
    }
}
