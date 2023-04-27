<?php 

require_once __DIR__ . '/dbdata.php';
class Article extends DbData{
    public function Insertarticle($user_id,$title,$sentence,$creation_date){

        $sql = "insert into article_list(user_id,title,sentence,creation_date) values(?, ?, ?, ?)";
        $result = $this->exec($sql,[$user_id,$title,$sentence,$creation_date]);

        if($result){
            return '';
        } else {
            return '記事登録できませんでした。管理者にお問い合わせください。';
        }
    }

    public function SelectArticle($title, $sentence)
    {
        $sql = "select * from article_list where title=? and sentence=? ORDER BY creation_date DESC ";
        $stmt = $this->query($sql, [$title, $sentence]);
        return $stmt->fetch();
    }
}

class Article_comment extends DbData{
    public function Insertarticle_comment($article_id,$user_id,$comment,$posted_date){

        $sql = "insert into article_comment_list(article_id,user_id,comment,posted_date) values(?, ?, ?, ?)";
        $result = $this->exec($sql,[$article_id,$user_id,$comment,$posted_date]);

        if($result){
            return '';
        } else {
            return 'コメント投稿できませんでした。管理者にお問い合わせください。';
        }
    }
}