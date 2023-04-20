-- making
-- 作成日は日付と時間

CREATE TABLE article_list(
    article_id int PRIMARY KEY AUTO_INCREMENT,
    user_id int UNIQUE NOT NULL,
    title VARCHAR(30) NOT NULL,
    sentence VARCHAR(400) NOT NULL,
    like_count int NOT NULL DEFAULT 0,
    creation_date DATETIME NOT NULL,
    INDEX article_list_index(
        article_id,
        title,
        like_count,
        creation_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);

CREATE TABLE question_list(
    question_id PRIMARY KEY AUTO_INCREMENT,
    user_id int NOT NULL,
    title VARCHAR(30) NOT NULL,
    question VARCHAR(400) NOT NULL,
    question_date DATETIME NOT NULL,
    INDEX question_list_index(
        question_id,
        title,
        question_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);