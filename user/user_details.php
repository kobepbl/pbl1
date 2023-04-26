<?php
    // Postクラスを利用する
    require_once __DIR__ . '/../classes/post.php';
    $post = new Post();
    // すべての記事を抽出
    $articles = $post->getArticles();
    session_start();

    $name=$_SESSION['name'];
    $mail=$_SESSION['mail'];
    $grade=$_SESSION['grade'];
    $gender=$_SESSION['gender'];
    $graduation_year=$_SESSION['graduation_year'];
    $password=$_SESSION['password'];

    require_once __DIR__ . '/../paging/paging_controller.php';
    require_once __DIR__.'/../header.php';

    $password_details='';
    while(mb_strlen($password_details)<mb_strlen($password)){
        $password_details.='*';
    }

    if($gender==0){
        $gender_details="男性";
    }elseif($gender==1){
        $gender_details="女性";
    }

    $grade_details=$grade."年生";

    $_SESSION[$password_details]=$password_details;
?>

<table border="1" bordercolor="" align="left">
    <tr><th>名前</th><td><?=$name?></td></tr>
    <tr><th>メールアドレス　</th><td><?=$mail?></td></tr>
    <tr><th>学年</th><td><?=$grade_details?></td></tr>
    <tr><th>性別</th><td><?=$gender_details?></td></tr>
    <tr><th>卒業年度</th><td><?=$graduation_year?></td></tr>
    <tr><th>パスワード</th><td><?= $password_details ?></td> </tr>    
</table>
<!-- 修正ボタン -->
<br clear="all">
<a href="../login/update.php">修正</a>

<main>
  <div class="index-style">
    <article class="article-style">
      <h1>最近の投稿</h1>
      <?php
      foreach ($article_data  as  $article) {
      ?>
        <a href="article/article_show.php?article_id=<?= $article['article_id'] ?>">
          <article class="article-one">
            <p class="article-user"><object><a href="user/user_show?user_id=<?= $article['user_id'] ?>"><?= $article['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?= $article['article_id'] ?>"><?= $article['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($article['creation_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      require_once __DIR__ . '/../paging/paging.php';
      ?>
    </article>
  </div>
</main>

<?php
    require_once __DIR__.'/../footer.php';
?>
