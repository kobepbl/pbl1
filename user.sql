-- CREATE DATABASE IF NOT EXISTS user_data;
-- 性別　0男　1女 2その他（デフォルトは「その他」）

CREATE TABLE current_users(
    user_id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    grade tinyint NOT NULL,
    graduation_year smallint NOT NULL,
    gender tinyint DEFAULT 2,
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