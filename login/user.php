<?php
    require_once __DIR__.'/util.php';

    class User extends DbData{
        public function authUser($id,$password){
            $sql="select*from users where id=? and password=?";
            $stmt=$this->query($sql,[$id,$password]);
            return $stmt->fetch();
        }


        public function register($id,$name,$mail,$grade,$gender,$graduation_year,$password){
            $sql="select * from users where id=?";
            $stmt=$this->query($sql,[$id]);
            $result=$stmt->fetch();

            if($result){
                return 'この'.$id.'は既に登録されています。';
            }
            $sql="insert into users(id,name,mail,grade,gender,graduation_year,password)value(?,?,?,?,?,?,?)";
            $result=$this->exec($sql,[$id,$name,$mail,$grade,$gender,$graduation_year,$password]);

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
