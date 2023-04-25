<?php
// 送られてきたidを受け取る
$question_id = $_GET['question_id'];

// Postオブジェクトを生成する
require_once __DIR__ . '/../classes/post.php';
$post = new Post();

// 選択された質問を取り出す
$question = $post->getQuestion($question_id);

// 選択された質問のコメントを抽出
$question_comments = $post->getQuestioncomments($question_id);

require_once __DIR__ . '/../header.php'
?>

<main>
  <div class="article-show">
    <p class="article-show-user"><a href="user/user_show?user_id=<?= $question['user_id'] ?>"><?= $question['name'] ?></a></p>
    <p class="article-show-date">投稿日 <?= date('Y年m月d日', strtotime($question['question_date'])) ?></p>
    <h1 class="article-show-title"><?= $question['title'] ?></h1>
    <p class="article-text"><?= $question['question'] ?></p>
  </div>

  <div class="anser">
  <h1>回答</h1>
  </div>
    <?php
    foreach ($question_comments  as  $question_comment) {
    ?>
    <div class="anser-show">
      <p class="comment-user"><a href="user/user_show?user_id=<?= $question_comment['user_id'] ?>"><?= $question_comment['name'] ?></a></p>
      <p class="article-show-date">投稿日 <?= date('Y年m月d日', strtotime($question_comment['posted_date'])) ?></p>
      <p class="comment-border"><?= $question_comment['comment'] ?></p>
    </div>
    <?php
    }
    ?>
</main>
<?php
require_once __DIR__ . '/../footer.php'
?>