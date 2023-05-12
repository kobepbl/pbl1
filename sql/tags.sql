-- ユーザーテーブル
CREATE TABLE current_users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    grade TINYINT NOT NULL,
    graduation_year SMALLINT NOT NULL,
    gender TINYINT DEFAULT 2,
    mail VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(40) NOT NULL,
    INDEX current_users_index(
        user_id,
        name,
        grade,
        graduation_year,
        mail
    )
);

-- 記事テーブル
CREATE TABLE article_list(
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(30) NOT NULL,
    sentence VARCHAR(400) NOT NULL,
    like_count INT NOT NULL DEFAULT 0,
    creation_date DATETIME NOT NULL,
    INDEX article_list_index(
        article_id,
        title,
        like_count,
        creation_date
    ),
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)
);

-- 記事とタグの中間テーブル
CREATE TABLE article_list_tags(
    article_list_tags_id INT PRIMARY KEY AUTO_INCREMENT,
    article_id INT NOT NULL,
    tags_id INT NOT NULL,
    INDEX article_list_tags_index(
        article_list_tags_id
    ),
    FOREIGN KEY (article_id) REFERENCES article_list(article_id)
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
VALUES  (1, 'C言語'),
        (2, 'Python'),
        (3, 'Java'),
        (4, 'Javascript'),
        (5, '制作実習'),
        (6, 'HTML'),
        (7, 'CSS'),
        (8, 'C#'),
        (9, 'データベース'),
        (10, 'SQL'),
        (11, 'Linux'),
        (12, 'ネットワーク'),
        (13, 'ITパスポート'),
        (14, '基本情報技術者試験'),
        (15, '応用情報技術者試験'),
        (16, 'AI'),
        (17, 'numpy'),
        (18, 'pandas'),
        (19, 'ICT概論'),
        (20, 'アルゴリズム'),
        (21, 'matplotlib'),
        (22, 'PHP'),
        (23, 'xampp'),
        (24, 'terapad'),
        (25, 'MYSQL'),
        (26, 'vscode'),
        (27, 'G検定'),
        (28, 'AI検定'),
        (29, 'ポインタ'),
        (30, '構造体'),
        (31, '変数'),
        (32, '配列'),
        (33, 'リスト');
    
/* 不要なタグの削除用
DELETE FROM tags WHERE tags = タグ名
*/


/* 以下テストケース（タグは上記のものを使用） */
-- 記事
INSERT INTO article_list(user_id, title, sentence, creation_date)
VALUES  (7, 'title23', 'sentence183', '2021-02-04 10:25:07'),
        (10, 'title43', 'sentence13', '2023-10-03 15:25:07'),
        (2, 'title12', 'sentence93', '2022-11-04 23:25:07'),
        (4, 'title9', 'sentence21', '2027-08-04 15:25:07'),
        (23, 'title16', 'sentence76', '2028-07-04 15:25:07'),
        (19, 'title89', 'sentence1934', '2022-10-04 06:24:39'),
        (15, 'title17', 'sentence3', '2023-02-04 13:25:07');

-- 記事とタグの紐づけ（中間）
INSERT INTO article_list_tags(article_id, tags_id)
VALUES  (1, 29),
        (1, 3),
        (1, 10),
        (4, 29),
        (5, 29),
        (2, 4),
        (2, 25),
        (4, 13),
        (7, 33),
        (5, 3);

-- Verified_SQL(ユーザー名まだ)
SELECT
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list
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
            tags = ?（ここにタグ入れる。）
    )
;