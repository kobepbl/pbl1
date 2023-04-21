<?php 

require_once __DIR__ . '/dbdata.php';
class Article extends DbData{

    public function Insertarticle($user_id,$title,$sentence,$creation_date){
        
        /*$sql = "select max(article_id) from article_list";
        $stmt = $this->query($sql);
        $article_id = $stmt->fetch();// 抽出したデータを取り出す 
        $article_id =$article_id+1;
        */
        $sql = "insert into article_list(user_id,title,sentence,creation_date) values(?, ?, ?, ?)";
        $result = $this->exec($sql,[$user_id,$title,$sentence,$creation_date]);
        
        if($result){
            return ''; // ここも空文字を返すので「''」はシングルクォーテーションが２つ
        } else {
            // 何らかの原因で失敗した場合 
            return '記事登録できませんでした。管理者にお問い合わせください。';
        }
    }
    /*
    public function updateUser($userId, $userName, $kana, $zip, $address, $tel, $password, $tempId){
        $sql = "update users set userId=?, userName=?, kana=?, zip=?, address=? ,tel=? ,password=? where userId = ?";
        $result = $this->exec($sql, [$userId, $userName, $kana, $zip, $address, $tel, $password, $tempId]);
        if( $result ){
            // 更新に成功したが、Cart内に仮のユーザーIDの商品が入っていた場合、新しいユーザーIDに置き換える
            // また、過去の注文履歴のユーザーIDも新しいユーザーIDに置き換える 
            if($userId !== $tempId){
                $this->changeCartUserId($tempId, $userId); 
                $this->changeOrderHistoryUserId($tempId, $userId);
            } 
            return '';
        } else { 
            return 'ユーザー情報の更新ができませんでした。管理者にお問い合わせください。'; 
        }
    }*/
    /*
     public function changeOrderHistoryUserId($tempId, $userId){
        require_once __DIR__ . '/../classes/order.php';
        $order = new Order( );
        $order->changeUserId($tempId, $userId);
    }
    */
}