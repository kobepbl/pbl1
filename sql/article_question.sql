-- 作成日は日付と時間

CREATE TABLE article_list(
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(30) NOT NULL,
    sentence VARCHAR(2000) NOT NULL,
    like_count int NOT NULL DEFAULT 0,
    creation_date DATETIME NOT NULL,
    article_image VARCHAR(25),
    INDEX article_list_index(
        article_id,
        title,
        like_count,
        creation_date,
        article_image
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);

CREATE TABLE question_list(
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int NOT NULL,
    title VARCHAR(30) NOT NULL,
    question VARCHAR(2000) NOT NULL,
    like_count int NOT NULL DEFAULT 0,
    question_date DATETIME NOT NULL,
    question_image VARCHAR(25),
    INDEX question_list_index(
        question_id,
        title,
        question_date,
        question_image
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);


-- article_listに新規記事を入れる。
