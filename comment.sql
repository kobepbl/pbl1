-- コメントテーブル

CREATE TABLE comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    comment VARCHAR(200),
    article_id,
    posted_date DATETIME NOT NULL,
    CREATE INDEX comment_list_index(
        

    )
)