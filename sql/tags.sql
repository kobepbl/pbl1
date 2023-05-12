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
    FOREIGN KEY (user_id) REFERENCES current_users(user_id)

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

/* タグ ⇒ 記事を検索 */

-- タグidの場合
SELECT
    title,
    sentence,
    like_count,
    creation_date,
FROM
    article_list
INNER JOIN
    article_list_tags
ON
    article_list.article.id = article_list_tags.article_id
WHERE
    article_list_tags.tags_id = ?（ここに保持してるid）
ORDER BY
    条件（最新 or いいね数が妥当？）

-- タグの場合
SELECT
    title,
    sentence,
    like_count,
    creation_date,
FROM
    article_list
INNER JOIN
    article_list_tags
ON
    article_list.article.id = article_list_tags.article_id
INNER JOIN
    tags
ON
    article_list.article.id = tags.tags_id
WHERE
    tags.tags = ?（ここに保持してるタグ）
ORDER BY
    条件（最新 or いいね数が妥当？）