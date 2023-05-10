<?php
require_once __DIR__ . '/dbdata.php';

class User extends DbData
{
    public function authUser($mail, $password)
    {
        $sql = "select * from current_users where mail=? and password=?";
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

    public function updateUser($newpassword,$mail)
    {
        $sql = "update current_users set password=? where mail=?";
        $result = $this->exec($sql, [ $newpassword,$mail]);
        if($result){
            return'';
        }else{
            return'更新できませんでした。管理者にお問い合わせください。';
        }
    }

    public function authPassword($password,$userid)
    {
        $sql = "select password from current_users where password=? and user_id=?";
        $stmt = $this->query($sql, [$password,$userid]);
        $result=$stmt->fetch();

        if($result){
            return '';
        }else{
            return 'パスワードが違います。';
        }
    }


    public function detailsUser($user_show_id)
    {
        $sql = "select * from current_users where user_id=?";
        $userdetail = $this->query($sql, [$user_show_id]);
        return $userdetail->fetch();
    }
}
