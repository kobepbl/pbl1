<?php
    // Postクラスを利用する
    require_once __DIR__ . '/../classes/post.php';
    require_once __DIR__ . '/../classes/user_login.php';
    require_once __DIR__ . '/../util.php';
    require_once __DIR__ . '/../header.php';
    $details_userid=$_GET['user_id'];
    $post = new Post();
    $userdetails=new User();
    
    
    // すべての記事を抽出
    $userarticles = $post->userArticles($details_userid);
    $userdetail=$userdetails->detailsUser($details_userid);

    echo $userdetail;

//     $name=$_SESSION['name'];
//     $mail=$_SESSION['mail'];
//     $grade=$_SESSION['grade'];
//     $gender=$_SESSION['gender'];
//     $graduation_year=$_SESSION['graduation_year'];
//     $password=$_SESSION['password'];
//     // パスワードを*で伏せて表示
//     $password_details='';
//     while(mb_strlen($password_details) <= mb_strlen($password)){
//         $password_details.='*';
//     }

//     // 性別の文字化
//     if($gender==0){
//         $gender_details="男性";
//     }elseif($gender==1){
//         $gender_details="女性";
//     }

//     $grade_details=$grade."年生";

//     $_SESSION['password_details']=$password_details;
// ?>

<!-- // <table border="1" bordercolor="" align="left">
//     <tr><th>名前</th><td><?=$name?></td></tr>
//     <tr><th>メールアドレス　</th><td><?=$mail?></td></tr>
//     <tr><th>学年</th><td><?=$grade_details?></td></tr>
//     <tr><th>性別</th><td><?=$gender_details?></td></tr>
//     <tr><th>卒業年度</th><td><?=$graduation_year?></td></tr>
//     <tr><th>パスワード</th><td><?= $password_details ?></td> </tr>    
// </table>
// <!-- 修正ボタン -->
<!-- // <br clear="all">
// <a href="../login/update.php">修正</a> --> -->

<!-- 投稿記事 -->
<main>
  <div class="index-style">
    <article class="article-style">
      <h1>最近の投稿</h1>
      <?php
        foreach ($userarticles as $userarticle) {
      ?>
        <a href="article/article_show.php?article_id=<?= $userarticle['article_id'] ?>">
          <article class="article-one">
            <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?=$userarticle['article_id']?>"><?= $userarticle['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($userarticle['creation_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      // require_once __DIR__ . '/../paging/paging.php';
      ?>
    </article>
  </div>
</main>

<?php
    require_once __DIR__.'/../footer.php';
?>
