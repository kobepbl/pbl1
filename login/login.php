<!-- ログイン -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ホーム画面</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id=main>
    
    <?php
        require_once __DIR__.'/util.php';
        
        $ident=$_POST['login_id'];
        $pass=$_POST['login_password'];
        $name="";

        $error_code=0;

        if(empty($id)||empty($password)){
            //未入力項目あり
            $error_code=100;
        }else{
            try{
                //ユーザーIDをキーにデータベースから抽出
                $sql="select * from password where id = ? and password=?";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([$id,$password]);
                $result=$stmt->fetch();

                if(empty($result['id'])){
                    //ユーザーID、パスワードの不一致
                    $error_code=200;
                }else{
                    $name=$result['name'];
                }
            }catch(Exception $e){
                //データベースエラー
                $error_code=900;
            }
            $pdo=null;
        }

        //エラーメッセージ
        if($error_code==0){
            echo "<h2>ようこそ</h2>";
            echo "<hr><br>";
            echo "こんにちは、".h($name)."さん<br><br>";
            echo "<a href='login.html'>ログインページ</a>";
        }else if($error_code==100){
            echo "<h2>未入力項目があります</h2>";
            echo "<hr><br>";
            echo "ユーザーID、パスワードを入力してください<br><br>";
            echo "<a href='login.html'>ログインページ</a>";
        }else if($error_code==200){
            echo "<h2>ユーザーID、パスワードが違います</h2>";
            echo "<hr><br>";
            echo "ユーザーID、パスワードを確認してください<br>";
            echo "<a href='login.html'>ログインページ</a>";
        }else if($error_code==900){
            echo "<h2>データベースエラー</h2>";
            echo "<hr><br>";
            echo "データベースでエラーが発生しました<br>";
            echo "管理者に連絡してください<br>";
            echo "<a href='login.html'>ログインページ</a>";
        }
    ?>
    <br><br>
    <hr>
    </div>
</body>
</html>