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
<head>
<link rel="stylesheet" href="<?= $userpage_css ?>">
</head>

<!-- ユーザー情報 -->
<div class = "profile" align="center">
 <h3>プロフィール</h3>
 <div>
   <dl class="inline">
      <dt>名前</dt>
          <dd><?=$userdetail['name']?></dd>
      <dt>メールアドレス</dt>
          <dd><td><?=$userdetail['mail']?></dd>
      <dt>学年</dt>
          <dd><?=$userdetail['grade']?></dd>
      <dt>性別</dt>
       <dd><?=$user_show_gender?></dd>
      <dt>卒業年度</dt>
       <dd><?=$userdetail['graduation_year']?></dd>
    </dl>
  </div>
</div>

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
