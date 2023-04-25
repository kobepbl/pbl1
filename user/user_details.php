<?php
    session_start();

    $name=$_SESSION['name'];
    $mail=$_SESSION['mail'];
    $grade=$_SESSION['grade'];
    $gender=$_SESSION['gender'];
    $graduation_year=$_SESSION['graduation_year'];

    require_once __DIR__.'/../header.php';

    // echo "名前：".$name.'<br>';
    // echo "メールアドレス：".$name.'<br>';
    // echo "名前：".$name.'<br>';
    // echo "名前：".$name.'<br>';
    // echo "名前：".$name.'<br>';
    if($gender==0){
        $gender_details="男性";
    }elseif($gender==1){
        $gender_details="女性";
    }

    $grade_details=$grade."年生";
?>
<table>
    <tr><td>名前</td><td><?=$name?></td></tr>
    <tr><td>メールアドレス</td><td><?=$mail?></td></tr>
    <tr><td>学年</td><td><?=$grade_details?></td></tr>
    <tr><td>性別</td><td><?=$gender_details?></td></tr>
    <tr><td>卒業年度</td><td><?=$graduation_year?></td></tr>
</table>
<?php
    require_once __DIR__.'/../footer.php';
?>
