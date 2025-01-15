<?php
$hash_id = $_GET['id'];
require_once __DIR__ . '/../includes/_funcs.php';
$pdo = connectDb();
$stmt = $pdo->prepare("SELECT * FROM userdata_table WHERE id = :id");
$stmt->bindValue(':id', $hash_id, PDO::PARAM_STR);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPage-ユーザー情報-</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body id="userdata">
  <main class="mypage__wrapper form__wrapper">
    <div class="mypage__container form__container">
      <div class="menu__content">
        <ul class="menu__list">
          <li class="menu__item">
            <?= '<a href="./index.php?id=' . $hash_id . '" class="">マイページ</a>' ?>
          </li>
          <li class="menu__item">
            <?= '<a href="../home.php?id=' . $hash_id . '" class="">ホーム</a>' ?>
          </li>
        </ul>
      </div>
      <?php
      if (!$stmt) {
        exit('Database connection failed');
      } else {
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
      }
      ?>
      <div class="mypage__content form__content">
        <div class="notation">
          <p>登録情報</p>
        </div>
        <div class="form__outer">
          <p class="register__label">氏名</p>
          <p class="register__content"><?= $userData['name']; ?></p>
        </div>
        <div class="form__outer">
          <p class="register__label">フリガナ</p>
          <p class="register__content"><?= $userData['furigana']; ?></p>
        </div>
        <div class="form__outer">
          <p class="register__label">メール</p>
          <p class="register__content"><?= $userData['email']; ?></p>
        </div>
        <div class="form__outer">
          <p class="register__label">パスワード<span style="font-size: 10px;">※セキュリティ保護のため伏字にしています</span></p>
          <p class="register__content">********</p>
        </div>
        <div class="form__outer">
          <p class="register__label">好きな音楽のカテゴリ</p>
          <?php
          if (!empty($userData['categories'])) {
            echo '<ul class="register__content--list">';
            foreach ($userData['categories'] as $category) {
              echo '<li class="register__content">' . $category . '</li>';
            }
            echo '</ul>';
          } else {
            echo '<p class="register__content">選択されたカテゴリはありません。</p>';
          }
          ?>
        </div>
        <div class="form__outer">
          <p class="register__label">メールで演奏会の通知を受け取る</p>
          <p class="register__content">
            <?php
            if ($subscribeMail === 1) {
              echo "受け取る";
            } else {
              echo "受け取らない";
            }
            ?>
          </p>
        </div>
      </div>
    </div>
    <?= '<a href="./user.php?id=' . $hash_id . '" class="btn">編集する</a>' ?>
  </main>
</body>

</html>