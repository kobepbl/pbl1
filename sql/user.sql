-- CREATE DATABASE IF NOT EXISTS user_data;
-- 性別　0男　1女 2その他（デフォルトは「その他」）

CREATE TABLE current_users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    grade TINYINT NOT NULL,
    graduation_year SMALLINT NOT NULL,
    gender TINYINT DEFAULT 2,
    mail VARCHAR(50) UNIQUE NOT NULL,
    icon VARCHAR(25),
    password VARCHAR(40) NOT NULL,
    INDEX current_users_index(
        user_id,
        name,
        grade,
        graduation_year,
        mail,
        icon
    )
);
-- icon追加
ALTER TABLE Document ADD icon VARCHAR(25);

-- sign_up(gender != 2)
INSERT INTO current_users(name, grade, graduation_year, gender, mail, password)
VALUES  ();

-- sign_up(gender == 2)
INSERT INTO current_users(name, grade, graduation_year, mail, password)
VALUES  ();

-- password update
UPDATE
    current_users
SET
    password = $_POST['password']
WHERE
    user_id = ログイン中のユーザID
;