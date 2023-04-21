<!-- 新規登録 -->
<?php
    require_once __DIR__ . '/../index/header.php';
    // require_once __DIR__ . '/util.php';
?>
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

        $id=$_POST['input_id'];   //ユーザーID
        $password=$_POST['input_password'];  //パスワード
        $name=$_POST['input_name'];  //ユーザーネーム
        $mail=$_POST['input_mail']; //メールアドレス
        $grade=$_POST['input_grade']; //学年
        $gender=$_POST['input_gender']; //性別
        $graduation_year=$_POST['input_graduation_year']; //卒業年度


        $error_code=0;

        if(empty($id)||empty($password)||empty($name)||empty($mail)
            ||empty($grade)||empty($gender)||empty($graduation_year)){
            //未入力項目あり
            $error_code=100;
        }else{
            try{
                //ユーザーIDをキーにデータベースから抽出
                $sql="select * from password where id = ?";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([$id]);
                $result=$stmt->fetch();

                if(empty($result['id'])){
                    //データベースにユーザー情報を登録
                    $sql="insert into password (id,password,name,mail,grade,gender,graduation_year) values(?,?,?,?,?,?,?)";
                    $stmt=$pdo->prepare($sql);
                    $stmt->execute([$id,$password,$name,$mail,$grade,$gender,$graduation_year]);
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
            echo "<tr><th>ユーザーID</th><td>".h($id)."</td></tr>";
            echo "<tr><th>パスワード</th><td>".h($password)."</td></tr>";
            echo "<tr><th>ユーザーネーム</th><td>".h($name)."</td></tr>";
            echo "<tr><th>メールアドレス</th><td>".h($mail)."</td></tr>";
            echo "<tr><th>学年</th><td>".h($grade)."</td></tr>";
            echo "<tr><th>性別</th><td>".h($gender)."</td></tr>";
            echo "<tr><th>卒業年度</th><td>".h($graduationyear)."</td></tr>";
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
    <?php
        require_once __DIR__.'/../index/footer.php';
    ?>
</body>
</html>