<?php
require_once __DIR__ . '/dbdata.php';
class Article extends DbData
{

    public function Insertarticle($user_id, $title, $sentence, $creation_date)
    {

        $sql = "insert into article_list(user_id,title,sentence,creation_date) values(?, ?, ?, ?)";
        $result = $this->exec($sql, [$user_id, $title, $sentence, $creation_date]);

        if ($result) {
            return ''; // ここも空文字を返すので「''」はシングルクォーテーションが２つ
        } else {
            // 何らかの原因で失敗した場合 
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

class Article_comment extends DbData
{
    public function Insertarticle_comment($article_id, $user_id, $comment, $posted_date)
    {

        $sql = "insert into article_comment_list(article_id,user_id,comment,posted_date) values(?, ?, ?, ?)";
        $result = $this->exec($sql, [$article_id, $user_id, $comment, $posted_date]);

        if ($result) {
            return '';
        } else {
            return 'コメント投稿できませんでした。管理者にお問い合わせください。';
        }
    }
}
class Question extends DbData
{
    public function insert_question($user_id, $title, $question, $question_date)
    {
        $sql = "
                    INSERT INTO question_list(user_id, title, question, question_date)
                    VALUES(?, ?, ?, ?)
                    ";
        $result = $this->exec($sql, [$user_id, $title, $question, $question_date]);
        if ($result) {
            return '';
        } else {
            return '質問の登録が出来ませんでした。管理者にお問い合わせください。';
        }
    }

    public function select_question($title, $question)
    {
        $sql = "
                    SELECT
                        *
                    FROM
                        question_list
                    WHERE
                        title = ?
                        AND question = ?
                    ORDER BY
                        question_date DESC
                    ";
        $stmt = $this->query($sql, [$title, $question]);
        return $stmt->fetch();
    }

    public function select_commentanser($title, $comment_anser)
    {
        $sql = "
                    SELECT
                        *
                    FROM
                        question_list
                    WHERE
                        title = ?
                        AND comment_anser = ?
                    ORDER BY
                        question_date DESC
                    ";
        $stmt = $this->query($sql, [$title, $comment_anser]);
        return $stmt->fetch();
    }
}

class Question_comment extends DbData
{
    public function insertquestion_comment($question_id, $user_id, $comment, $posted_date)
    {

        $sql = "
                    INSERT INTO question_comment_list(question_id, user_id, comment, posted_date)
                    VALUES(?, ?, ?, ?)";
        $result = $this->exec($sql, [$question_id, $user_id, $comment, $posted_date]);

        if ($result) {
            return '';
        } else {
            return '答えを投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    public function insertcomment_anser($question_id, $user_id, $comment, $posted_date,$column_id)
    {

        $sql = "
                    INSERT INTO question_comment_list(question_id, user_id, comment, posted_date,column_id)
                    VALUES(?, ?, ?, ?,?)";
        $result = $this->exec($sql, [$question_id, $user_id, $comment, $posted_date,$column_id]);

        if ($result) {
            return '';
        } else {
            return '返信を投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    public function getcomment_anser($column_id){
        $sql  =  "select  *  from  question_comment_list join current_users on question_comment_list.user_id = current_users.user_id where comment_id = '" . $column_id . "' and comment_id!='" . $column_id . "' order by question_comment_list.comment_id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $comment_ansers_asc = $stmt->fetchAll();
        return  $comment_ansers_asc;
        }
}


class Iine extends DbData
{
    public function Iineupdate($article_id)
    {
        $sql = "select like_count from article_list where article_id=?";
        $stmt = $this->query($sql, [$article_id]);
        $likecount = $stmt->fetch();

        $sql = "update article_list set like_count=? where article_id=?";
        $result = $this->exec($sql, [$likecount[0] + 1, $article_id]);
        if ($result) {
            return '';
        } else {
            return '更新できませんでした。管理者にお問い合わせください。';
        }
    }

    public function q_Iineupdate($question_id)
    {
        $sql = "select like_count from question_list where question_id=?";
        $stmt = $this->query($sql, [$question_id]);
        $likecount = $stmt->fetch();

        $sql = "update question_list set like_count=? where question_id=?";
        $result = $this->exec($sql, [$likecount[0] + 1, $question_id]);
        if ($result) {
            return '';
        } else {
            return '更新できませんでした。管理者にお問い合わせください。';
        }
    }
}
