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
    OR title LIKE '" . "%" . $search_word . "%" . "'
ORDER BY
    creation_date DESC
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $search_articles = $stmt->fetchAll();
        return  $search_articles;
    }

    // 検索されたすべての質問を逆順でを取り出す
    public  function  getSearchquestions($search_word)
    {
        $sql  = "SELECT
    question_id,
    cu.user_id,
    name,
    title,
    question,
    like_count,
    question_date
FROM
    question_list AS ql
INNER JOIN
    current_users AS cu
ON
    cu.user_id = ql.user_id
WHERE
    question LIKE '" . "%" . $search_word . "%" . "'
    OR title LIKE '" . "%" . $search_word . "%" . "'
ORDER BY
    question_date DESC
;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $search_questions = $stmt->fetchAll();
        return  $search_questions;
    }

    // 検索されたタグのすべての記事を逆順でを取り出す
    public  function  getSearch_tag_articles($search_tag)
    {
        $sql  = "
        SELECT
    article_id,
    current_users.user_id,
    name,
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list
INNER JOIN
    current_users
ON
    article_list.user_id = current_users.user_id
WHERE
    article_id IN (
        SELECT
            article_id
        FROM
            tags
        INNER JOIN
            article_list_tags
        ON
            tags.tags_id = article_list_tags.tags_id
        WHERE
            tags = ?
    )
    ORDER BY
    creation_date DESC
;";

        $stmt = $this->query($sql, [$search_tag]);
        $search_tag_articles = $stmt->fetchAll();
        return  $search_tag_articles;
    }

    // 検索されたタグのすべての質問を逆順でを取り出す
    public  function  getSearch_tag_questions($search_tag)
    {
        $sql  = "
        SELECT
    question_id,
    current_users.user_id,
    name,
    title,
    question,
    like_count,
    question_date
FROM
    question_list
INNER JOIN
    current_users
ON
question_list.user_id = current_users.user_id
WHERE
    question_id IN (
        SELECT
            question_id
        FROM
            tags
        INNER JOIN
            question_list_tags
        ON
            tags.tags_id = question_list_tags.tags_id
        WHERE
            tags = ?
    )
    ORDER BY
    question_date DESC
;";

        $stmt = $this->query($sql, [$search_tag]);
        $search_tag_questions = $stmt->fetchAll();
        return  $search_tag_questions;
    }
}

// "select  *  from  article_list join current_users on article_list.user_id = current_users.user_id where sentence like '" . "%" . $search_word . "%" . "' order by article_list.article_id desc";