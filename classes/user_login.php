<?php
require_once __DIR__ . '/dbdata.php';

class User extends DbData
{
    public function authUser($mail, $password)
    {
        $sql = "select*from current_users where mail=? and password=?";
        $stmt = $this->query($sql, [$mail, $password]);
        return $stmt->fetch();
    }

    public function register($name, $mail, $grade, $gender, $graduation_year, $password)
    {
        $sql = "select * from current_users where mail=?";
        $stmt = $this->query($sql, [$mail]);
        $result = $stmt->fetchAll();

        if ($result) {
            return 'この' . $mail . 'は既に登録されています。';
        }
        $sql = "insert into current_users(name,mail,grade,gender,graduation_year,password)values(?,?,?,?,?,?)";
        $result = $this->exec($sql, [$name, $mail, $grade, $gender, $graduation_year, $password]);

        if ($result) {
            return '';
        } else {
            return '新規登録できませんでした。管理者にお問い合わせください。';
        }
    }

    public function updateuser($name, $mail, $grade, $gender, $graduation_year, $password)
    {
        $sql = "update current_users(name,mail,grade,gender,graduation_year,password)value(?,?,?,?,?,?)";
        $result = $this->exec($sql, [$name, $mail, $grade, $gender, $graduation_year, $password]);

        if ($result) {
            return '';
        } else {
            return '更新できませんでした。管理者にお問い合わせください。';
        }
    }
}
