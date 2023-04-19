<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー登録</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id=main>
    
    <?php
        require_once __DIR__.'/util.php';
        
        $ident=$_POST['input_id'];   //ユーザーID
        $pass=$_POST['input_pass'];  //パスワード
        $name=$_POST['input_name'];  //ユーザーネーム
        $mail=$_POST['input_mail']; //メールアドレス
        $grade=$_POST['input_grade']; //学年
        $gender=$_POST['input_gender']; //性別
        $gradyear=$_POST['input_gradyear']; //卒業年度


        $error_code=0;

        if(empty($ident)||empty($pass)||empty($name)||empty($mail)
            ||empty($grade)||empty($gender)||empty($gradyear)){
            //未入力項目あり
            $error_code=100;
        }else{
            try{
                //ユーザーIDをキーにデータベースから抽出
                $sql="select * from password where ident = ?";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([$ident]);
                $result=$stmt->fetch();

                if(empty($result['ident'])){
                    //データベースにユーザー情報を登録
                    $sql="insert into password (ident,pass,name,mail,grade,gender,gradyear) values(?,?,?,?,?,?,?)";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute([$ident,$pass,$name,$mail,$grade,$gender,$gradyear]);
                }else{
                    //ユーザー情報登録済
                    $error_code=200;
                }
            }catch(Exception $e){
                //データベースエラー
                $error_code=900;
            }
            $pdo=null;
        }

        //エラーメッセージ
        if($error_code==0){
            echo "<h2>ユーザー登録が完了しました</h2>";
            echo "<hr><br>";
            echo "<table id='regiTable'>";
            echo "<tr><th>ユーザーID</th><td>".h($ident)."</td></tr>";
            echo "<tr><th>パスワード</th><td>".h($pass)."</td></tr>";
            echo "<tr><th>ユーザーネーム</th><td>".h($name)."</td></tr>";
            echo "<tr><th>メールアドレス</th><td>".h($mail)."</td></tr>";
            echo "<tr><th>学年</th><td>".h($grade)."</td></tr>";
            echo "<tr><th>性別</th><td>".h($gender)."</td></tr>";
            echo "<tr><th>卒業年度</th><td>".h($gradyear)."</td></tr>";
            echo "</table><br>";
            echo "<a href='login.html'>ログインページ</a>";
        }else if($error_code==100){
            echo "<h2>未入力項目があります</h2>";
            echo "<hr><br>";
            echo "すべての項目を入力してください<br><br>";
            echo "<a href='register.html'>新規ユーザー登録へ戻る</a>";
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