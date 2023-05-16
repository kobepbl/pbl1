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

    // 選択された記事のタグを取り出す
    public function getTags($article_id)
    {
        $sql = "select * from article_list join article_list_tags on article_list.article_id = article_list_tags.article_id join tags on article_list_tags.tags_id = tags.tags_id where article_list.article_id = '" . $article_id . "'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $tags = $stmt->fetchAll();
        return $tags;
    }

    // 選択された記事のタグを取り出す
    // public function getTag($tags_id)
    // {
    //     $sql = "select * from article_list join article_list_tags on article_list.article_id = article_list_tags.article_id join tags on article_list_tags.tags_id = tags.tags_id where article_list.article_id = ?";
    //     $stmt = $this->query($sql, [$tags_id]);
    //     $tag = $stmt->fetch();
    //     return $tag;
    // }

    // ユーザーの記事を取り出す
    public function userArticles($user_show_id)
    {
        $sql = "select * from article_list join current_users on article_list.user_id = current_users.user_id where article_list.user_id = ? order by article_list.article_id desc";
        $stmt = $this->query($sql, [$user_show_id]);
        $userarticles = $stmt->fetchAll();
        return $userarticles;
    }

    // すべての質問を逆順でを取り出す
    public  function  getQuestions()
    {
        $sql  =  "select  *  from  question_list join current_users on question_list.user_id = current_users.user_id order by question_list.question_id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $questions = $stmt->fetchAll();
        return  $questions;
    }

    // 選択された質問を取り出す
    public function getQuestion($question_id)
    {
        $sql = "select * from question_list join current_users on question_list.user_id = current_users.user_id where question_id = ?";
        $stmt = $this->query($sql, [$question_id]);
        $question = $stmt->fetch();
        return $question;
    }

    // 選択された質問のすべてのタグを取り出す
    public function get_q_Tags($question_id)
    {
        $sql = "select * from question_list join question_list_tags on question_list.question_id = question_list_tags.question_id join tags on question_list_tags.tags_id = tags.tags_id where question_list.question_id = '" . $question_id . "'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $tags = $stmt->fetchAll();
        return $tags;
    }

    // ユーザーの質問を取り出す
    public function userQuestions($user_show_id)
    {
        $sql = "select * from question_list join current_users on question_list.user_id = current_users.user_id where question_list.user_id = ? order by question_list.question_id desc";
        $stmt = $this->query($sql, [$user_show_id]);
        $userquestions = $stmt->fetchAll();
        return $userquestions;
    }

    // すべての記事コメントを逆順でを取り出す
    public  function  getArticlecomments($article_id)
    {
        $sql  =  "select  *  from  article_comment_list join current_users on article_comment_list.user_id = current_users.user_id where article_id = '" . $article_id . "'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $article_comments = $stmt->fetchAll();
        return  $article_comments;
    }

    // 選択された記事コメントを取り出す
    public function getArticlecomment($article_comment_id)
    {

        $sql = "select * from article_comment_list join current_users on article_comment_list.user_id = current_users.user_id where article_id = ?";
        $stmt = $this->query($sql, [$article_comment_id]);
        $article_comment = $stmt->fetch();
        return $article_comment;
    }

    // すべての質問回答を逆順でを取り出す
    public  function  getQuestioncomments($question_id)
    {
        $sql  =  "select  *  from  question_comment_list join current_users on question_comment_list.user_id = current_users.user_id where question_id = '" . $question_id . "' order by question_comment_list.comment_id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $question_comments = $stmt->fetchAll();
        return  $question_comments;
    }
}
