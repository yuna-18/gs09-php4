<?php
require_once('../includes/_funcs.php');
$pdo = connectDb();
$stmt = $pdo->prepare("SELECT * FROM userdata_table");
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPage</title>
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="mypage">
  <main class="mypage__wrapper">
    <div class="mypage__container">
    <?php
      if (!$stmt) {
        exit('Database connection failed');
      } else {
        while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $content .= '<div class="mypage__outer">';
          $content .= '<a href="./form-edit.php?id=' . $userData['id'] . '">ID：' . htmlSpChar($userData['id']) . '　';
          $content .= '氏名：' . htmlSpChar($userData['name']) . '　';
          $content .= '音楽カテゴリ：' . htmlSpChar($userData['music_category']) . '　';
          $content .= 'メルマガ：' . ($userData['subscribe_mail'] === 1 ? '受信する' : '受信しない') . '</p>';
          $content .= '</a>';
          $content .= '<a href="./form-delete.php?id=' . $userData['id'] . '">削除</a>';
          $content .= '</div>';
        }
      }
    ?>
      <div class="mypage__contents">
        <div class="notation">
          <p>登録情報</p>
        </div>
        <div class="mypage__content"><?= $content ?></div>
      </div>
      <a href="./index.php" class="totop-btn btn">TOPへ戻る</a>
    </div>
  </main>
</body>

</html>