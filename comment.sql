-- 作成日は日付と時間

CREATE TABLE article_comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    article_id int NOT NULL,
    user_id int NOT NULL,
    comment VARCHAR(400) NOT NULL,
    posted_date DATETIME NOT NULL,
    INDEX article_comment_list_index(
        comment_id,
        posted_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id),
    FOREIGN KEY (article_id) REFERENCES article_list(article_id)
);

CREATE TABLE question_comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    question_id int NOT NULL,
    user_id int NOT NULL,
    comment VARCHAR(400) NOT NULL,
    posted_date DATETIME NOT NULL,
    INDEX article_comment_list_index(
        comment_id,
        posted_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id),
    FOREIGN KEY (question_id) REFERENCES question_list(question_id)
);