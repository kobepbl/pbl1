<?php
    require_once __DIR__ . '/../header.php';
    require_once __DIR__ . '/../util.php';
    // Postクラス、Userクラス
    require_once __DIR__ . '/../classes/post.php';
    require_once __DIR__ . '/../classes/user_login.php';
    
    $user_show_id=$_GET['user_id'];
    $post = new Post();
    $userdetails=new User();
    
    
    // ユーザー情報、投稿、質問の抽出
    $userdetail=$userdetails->detailsUser($user_show_id);
    $userarticles = $post->userArticles($user_show_id);
    $userquestions = $post->userQuestions($user_show_id);

     // 性別の文字化
     if($userdetail['gender']==0){
         $user_show_gender="男性";
     }elseif($userdetail['gender']==1){
         $user_show_gender="女性";
     }

     $userdetail['grade'].="年生";

?>

<!-- ユーザー情報 -->
<table border="1" bordercolor="" align="left">
    <tr><th>名前</th><td><?=$userdetail['name']?></td></tr>
    <tr><th>メールアドレス　</th><td><?=$userdetail['mail']?></td></tr>
    <tr><th>学年</th><td><?=$userdetail['grade']?></td></tr>
    <tr><th>性別</th><td><?=$user_show_gender?></td></tr>
    <tr><th>卒業年度</th><td><?=$userdetail['graduation_year']?></td></tr>
</table>

<!-- 投稿記事 -->
<main>
  <div class="index-style">
    <article class="article-style">
      <h1>投稿</h1>
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
      ?>
    </article>
    <!-- 質問記事 -->
    <article class="article-style">
      <h1>質問</h1>
      <?php
      foreach ($userquestions  as  $userquestion) {
      ?>
        <a href="question/question_show.php?question_id=<?= $userquestion['question_id'] ?>">
          <article class="article-one">
            <h2 class="article-title"><object><a href="question/question_show.php?question_id=<?= $userquestion['question_id'] ?>"><?= $userquestion['title'] ?></a></object></h2>
            <p class="article-date"><?= date('Y年m月d日', strtotime($userquestion['question_date'])) ?></p>
          </article>
        </a>
      <?php
      }
      ?>
    </article>
  </div>
</main>

<?php
    require_once __DIR__.'/../footer.php';
?>
