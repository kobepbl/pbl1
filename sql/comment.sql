<<<<<<< HEAD
-- 作成日は日付と時間

CREATE TABLE article_comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    article_id int NOT NULL,
    user_id int NOT NULL,
    comment VARCHAR(400) NOT NULL,
    like_count int NOT NULL DEFAULT 0,
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
    like_count int NOT NULL DEFAULT 0,
    posted_date DATETIME NOT NULL,
    INDEX article_comment_list_index(
        comment_id,
        posted_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id),
    FOREIGN KEY (question_id) REFERENCES question_list(question_id)
=======
-- 作成日は日付と時間

CREATE TABLE article_comment_list(
    comment_id int PRIMARY KEY AUTO_INCREMENT,
    article_id int NOT NULL,
    user_id int NOT NULL,
    comment VARCHAR(400) NOT NULL,
    like_count int NOT NULL DEFAULT 0,
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
    like_count int NOT NULL DEFAULT 0,
    posted_date DATETIME NOT NULL,
    INDEX article_comment_list_index(
        comment_id,
        posted_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id),
    FOREIGN KEY (question_id) REFERENCES question_list(question_id)
>>>>>>> d180abab2f2e29048237d9e186736972d3864b5f
);