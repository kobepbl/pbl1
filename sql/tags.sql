-- 記事テーブル
CREATE TABLE article_list(
    article_id int PRIMARY KEY AUTO_INCREMENT,
    user_id int NOT NULL,
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
    FOREIGN KEY (article_id) REFERENCES article_list(article_id)
);

-- 記事とタグの中間テーブル
CREATE TABLE article_list_tags(
    article_list_tags_id INT PRIMARY KEY AUTO_INCREMENT,
    article_id INT NOT NULL,
    tags_id INT NOT NULL,
    INDEX article_list_tags_index(
        article_list_tags_id
    ),
    FOREIGN KEY (article_id) REFERENCES current_users(user_id),
);


-- タグテーブル
CREATE TABLE tags(
    tags_id INT PRIMARY KEY,
    tags VARCHAR(20) NOT NULL,
    INDEX tags_index(
        tags
    )
);

INSERT INTO tags(tags_id, tags)
        VALUES(1, 'C'),
        VALUES(2, 'Python'),
        VALUES(3, 'Java'),
        VALUES(4, 'Javascript'),
        VALUES(5, '制作実習'),
        VALUES(6, 'HTML'),
        VALUES(7, 'CSS'),
        VALUES(8, 'C#'),
        VALUES(9, 'データベース'),
        VALUES(10, 'SQL'),
        VALUES(11, 'Linux'),
        VALUES(12, 'ネットワーク'),
        VALUES(13, 'ITパスポート'),
        VALUES(14, '基本情報技術者試験'),
        VALUES(15, '応用情報技術者試験'),
        VALUES(16, 'AI'),
        VALUES(17, 'numpy'),
        VALUES(18, 'pandas'),
        VALUES(19, 'ICT概論'),
        VALUES(20, 'アルゴリズム'),
        VALUES(21, 'matplotlib'),
        VALUES(22, 'PHP'),
        VALUES(23, 'xampp'),
        VALUES(24, 'terapad'),
        VALUES(25, 'MYSQL'),
        VALUES(26, 'vscode'),
        VALUES(27, 'G検定'),
        VALUES(28, 'AI検定'),
        VALUES(29, 'ポインタ'),
        VALUES(30, '構造体'),
        VALUES(31, '変数'),
        VALUES(32, '配列'),
        VALUES(33, 'リスト');