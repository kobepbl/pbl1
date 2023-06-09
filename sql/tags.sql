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

-- 質問とタグの中間テーブル
CREATE TABLE question_list_tags(
    question_list_tags_id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT NOT NULL,
    tags_id INT NOT NULL,
    INDEX question_list_tags_index(
        question_list_tags_id
    ),
    FOREIGN KEY (question_id) REFERENCES question_list(question_id)
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

-- ユーザ情報
INSERT INTO current_users(name, grade, graduation_year, gender, mail, password)
VALUES  ('name1', 2, 2024, 1, 'kd0000001@st.kobedenshi.ac.jp', 'password_1'),
        ('name2', 3, 2023, 1, 'kd0000002@st.kobedenshi.ac.jp', 'password_2'),
        ('name3', 4, 2028, 0, 'kd0000003@st.kobedenshi.ac.jp', 'password_3'),
        ('name4', 1, 2027, 1, 'kd0000004@st.kobedenshi.ac.jp', 'password_4'),
        ('name5', 4, 2025, 1, 'kd0000005@st.kobedenshi.ac.jp', 'password_5'),
        ('name6', 3, 2026, 0, 'kd0000006@st.kobedenshi.ac.jp', 'password_6'),
        ('name7', 2, 2025, 0, 'kd0000007@st.kobedenshi.ac.jp', 'password_7'),
        ('name8', 3, 2026, 0, 'kd0000008@st.kobedenshi.ac.jp', 'password_8'),
        ('name9', 1, 2027, 1, 'kd0000009@st.kobedenshi.ac.jp', 'password_9'),
        ('name10', 4, 2024, 1, 'kd0000010@st.kobedenshi.ac.jp', 'password_10'),
        ('name11', 4, 2024, 0, 'kd0000011@st.kobedenshi.ac.jp', 'password_11'),
        ('name12', 2, 2024, 1, 'kd0000012@st.kobedenshi.ac.jp', 'password_12'),
        ('name13', 3, 2025, 0, 'kd0000013@st.kobedenshi.ac.jp', 'password_13'),
        ('name14', 2, 2025, 0, 'kd0000014@st.kobedenshi.ac.jp', 'password_14'),
        ('name15', 1, 2026, 1, 'kd0000015@st.kobedenshi.ac.jp', 'password_15');

-- 記事
INSERT INTO article_list(user_id, title, sentence, creation_date)
VALUES  (7, 'title23', 'sentence183', '2021-02-04 10:25:07'),
        (10, 'title43', 'sentence13', '2023-10-03 15:25:07'),
        (2, 'title12', 'sentence93', '2022-11-04 23:25:07'),
        (4, 'title9', 'sentence21', '2027-08-04 15:25:07'),
        (8, 'title16', 'sentence76', '2028-07-04 15:25:07'),
        (2, 'title89', 'sentence1934', '2022-10-04 06:24:39'),
        (1, 'title17', 'sentence3', '2023-02-04 13:25:07');

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

-- Verified_SQL(ユーザー名非対応)
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

-- Verified_SQL（ユーザー名も取得可）
SELECT
    name,
    title,
    sentence,
    like_count,
    creation_date
FROM
    article_list
INNER JOIN
    current_users
ON
    article_list.user_id = current_users.user_id
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

-- Verified_SQL（ユーザー名も取得可）質問版
SELECT
    name,
    title,
    sentence,
    like_count,
    creation_date
FROM
    question_list
INNER JOIN
    current_users
ON
    question_list.user_id = current_users.user_id
WHERE
    question_id IN (
        SELECT
            question_id
        FROM
            tags
        INNER JOIN
            question_list_tags
        ON
            tags.tags_id = question_list_tags.tags_id
        WHERE
            tags = ?（ここにタグ入れる。）
    )
;