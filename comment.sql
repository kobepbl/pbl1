-- コメントテーブル

CREATE TABLE comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    comment VARCHAR(200),
    article_id,
    posted_date DATETIME NOT NULL,
    CREATE INDEX comment_list_index(
        comment_id,
        comment
    )
);

-- コメントの確認
SELECT
    cmment
FROM
    comment_list
GROUP BY
    article_id
HAVING
    条件があるなら指定
ORDER BY
    ソート指定
;