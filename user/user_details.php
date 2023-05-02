<?php
session_start();
// Postクラスを利用する
require_once __DIR__ . '/../classes/post.php';
$post = new Post();
$user_show_id = $_SESSION['user_id'];
// すべての記事を抽出
$userarticles = $post->userArticles($user_show_id);
$userquestions = $post->userQuestions($user_show_id);

$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$grade = $_SESSION['grade'];
$gender = $_SESSION['gender'];
$graduation_year = $_SESSION['graduation_year'];
$password = $_SESSION['password'];
require_once __DIR__ . '/../header.php';
// パスワードを*で伏せて表示
$password_details = '';
while (mb_strlen($password_details) <= mb_strlen($password)) {
  $password_details .= '*';
}
// 性別の文字化
if ($gender == 0) {
  $gender_details = "男性";
} elseif ($gender == 1) {
  $gender_details = "女性";
}
$grade_details = $grade . "年生";
$_SESSION['password_details'] = $password_details;
?>

<head>
  <link rel="stylesheet" href="<?= $userpage_css ?>">
</head>
<div class="profile" align="center">
  <h3>プロフィール</h3>
  <div>
    <dl class="inline">
      <dt>名前</dt>
      <dd><?= $name ?></dd>
      <dt>メールアドレス</dt>
      <dd>
        <td><?= $mail ?>
      </dd>
      <dt>学年</dt>
      <dd><?= $grade_details ?></dd>
      <dt>性別</dt>
      <dd><?= $gender_details ?></dd>
      <dt>卒業年度</dt>
      <dd><?= $graduation_year ?></dd>
    </dl>
    <p><a href="../login/update.php">変更</a></p>
  </div>
</div>

<!-- 投稿記事 -->
<main>
  <div class="index-style">
    <article class="article-style">
      <h1>投稿</h1>
      <?php
      foreach ($userarticles  as  $userarticle) {
      ?>
        <a href=<?= $article_show_php ?>?article_id=<?= $userarticle['article_id'] ?>>
          <article class="article-one">
            <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $userarticle['user_id'] ?>><?= $userarticle['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href=<?= $article_show_php ?>?article_id=<?= $userarticle['article_id'] ?>><?= $userarticle['title'] ?></a></object></h2>
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
        <a href=<?= $question_show_php ?>?question_id=<?= $userquestion['question_id'] ?>>
          <article class="question-one">
            <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $userquestion['user_id'] ?>><?= $userquestion['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href=<?= $question_show_php ?>?question_id=<?= $userquestion['question_id'] ?>><?= $userquestion['title'] ?></a></object></h2>
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
require_once __DIR__ . '/../footer.php';
?>