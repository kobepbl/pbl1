<?php
    require_once __DIR__.'/util.php';

    class User extends DbData{
        public function authUser($id,$password){
            $sql="select*from current_users where id=? and password=?";
            $stmt=$this->query($sql,[$id,$password]);
            return $stmt->fetch();
        }


        public function register($name,$mail,$grade,$gender,$graduation_year,$password){
            $sql="select * from current_users where mail=?";
            $stmt=$this->query($sql,[$mail]);
            $result=$stmt->fetch();

            if($result){
                return 'この'.$mail.'は既に登録されています。';
            }
            $sql="insert into current_users(name,mail,grade,gender,graduation_year,password)value(?,?,?,?,?,?)";
            $result=$this->exec($sql,[$name,$mail,$grade,$gender,$graduation_year,$password]);

        }

        // 登録情報の変更
        // public function updateUser($id,$name,$mail,$grade,$gender,$tel,$graduation_year,$password){
            // $sql="update users set id=?,name=?,=?,=?,address=?,tel=?,password=? where userId=?";
            // $result=$this->exec($sql,[$userId,$userName,$kana,$zip,$address,$tel,$password,$tempId]);

            // if($result){
                // if($userId!=$tempId){
                    // $this->changeCartUserId($tempId,$userId);
                    // $this->changeOrderHistoryUserId($tempId,$userId);
                // }
                // return '';
            // }else{
                // return 'ユーザー情報の更新ができませんでした。管理者にお問い合わせください。';
            // }
        // }
    }
