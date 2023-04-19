-- 投稿内容テーブル作成
CREATE TABLE article_list(
    article_id int PRIMARY KEY AUTO_INCREMENT,
    user_id int NOT NULL,
    title VARCHAR(30) NOT NULL,
    sentence TEXT NOT NULL,
    like_count int NOT NULL DEFAULT 0,
    creation_date DATETIME NOT NULL,
    question_check tinyint NOT NULL,
    INDEX article_list_index(
        article_id,
        title,
        like_count,
        creation_date
    )
);

/* 挙動怪しいので保留
-- 投稿者名で検索
SELECT
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list
WHERE
    user_id = (SELECT
                    name
                FROM
                    current_users
                WHERE
                    user_id = current_user_id
                )
                UNION ALL
                (
                    SELECT
                        name
                    FROM
                        graduate_users
                    WHERE
                        user_id = graduate_user_id               
                )
;

*/

-- 日付で検索
SELECT
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list
WHERE
    creation_date (< or > or =) ひづけ
    ここPHP
ORDER BY
    ソート指定
;

-- 部分列で検索（文章）
SELECT
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list
WHERE
    sentence REGEXP '*文章（ここ貰った検索ワード）*'
;