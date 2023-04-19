-- making

CREATE TABLE article_comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    article_id int NOT NULL,
    user_id int NOT NULL,
    comment VARCHAR(400) NOT NULL,
    posted_date DATETIME NOT NULL
    INDEX article_comment_list_index(
        -- 作成中
    ),
    -- ここキー複数
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);

CREATE TABLE question_comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    question_id int NOT NULL,
    user_id int NOT NULL,
    comment VARCHAR(400) NOT NULL,
    posted_date DATETIME NOT NULL
    INDEX article_comment_list_index(
        -- 作成中
    ),
    -- ここキー複数
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);