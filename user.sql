-- CREATE DATABASE IF NOT EXISTS user_data;
-- 性別　0男　1女 2その他（デフォルトは「その他」）

CREATE TABLE current_users(
    user_id int AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    grade tinyint NOT NULL,
    graduation_year smallint NOT NULL,
    gender tinyint DEFAULT 2,
    mail VARCHAR(30) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    INDEX current_users_index(
        id,
        name,
        grade,
        mail
    )
);

CREATE TABLE graduate_users(
    user_id int AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    gender tinyint NOT NULL DEFAULT 2,
    mail VARCHAR(30) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    INDEX graduate_users_index(
        id,
        name,
        mail
    )
);

-- 在校性登録SQL
INSERT INTO current_users (name, grade, graduation_year, gender, mail, password)
VALUES (
    ここPHP
);


-- 卒業生登録SQL（在校生リストからの削除処理も込み）
INSERT INTO graduate_users(name, gender, mail, password)
SELECT
    name,
    gender,
    mail,
    password
FROM
    current_users
WHERE
    graduation_year - SUBSTR(CURDATE(), 1, 4) < 0
;

DELETE FROM
    current_users
WHERE
    graduation_year - SUBSTR(CURDATE(), 1, 4) < 0
;


-- 在校生・卒業生パスワード更新SQL
UPDATE
    current_users
SET
    password = パスワード（ここPHP）
WHERE
    mail = メール（ここPHP）
;