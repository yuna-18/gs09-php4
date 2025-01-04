<?php
require_once('../includes/_funcs.php');
session_start();

// var_dump($_SESSION);
$name = $_SESSION['name'];
$furigana = $_SESSION['furigana'];
$email = $_SESSION['email'];
$categories_str = isset($_SESSION['categories']) && is_array($_SESSION['categories'])
  ? implode(', ', $_SESSION['categories'])
  : '';
$subscribeMail = $_SESSION['subscribe_mail'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了</title>
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="complete">
  <main class="form__wrapper">
    <div class="form__container">
      <div class="form__contents">
        <?php
        $pdo = connectDb();
        $stmt = $pdo->prepare("INSERT INTO userdata_table(name, furigana, email, music_category, subscribe_mail, date) VALUES(:name, :furigana, :email, :music_category, :subscribe_mail, now())");
        if (!$stmt) {
          exit('Database connection failed');
        }

        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':furigana', $furigana, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':music_category', $categories_str, PDO::PARAM_STR);
        $stmt->bindValue(':subscribe_mail', $subscribeMail, PDO::PARAM_INT);

        $status = $stmt->execute();
        if ($status == false) {
          $error = $stmt->errorInfo();
          session_destroy();
          echo `<div class="notation">
            <p>登録に失敗しました</p>
          </div>`;
          exit('sqlError:' . $error[2]);
        } else {
          // データベースに登録した内容を取得
          $lastInsertId = $pdo->lastInsertId();
          // 挿入したデータを取得
          $stmt = $pdo->prepare("SELECT * FROM userdata_table WHERE id = :id");
          $stmt->bindValue(':id', $lastInsertId, PDO::PARAM_INT);
          $stmt->execute();
          if ($status == false) {
            //execute（SQL実行時にエラーがある場合）
            $error = $stmt->errorInfo();
            exit("ErrorQuery:" . $error[2]);
          } else {
            // データを取得して表示
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$userData) {
              exit('データの取得に失敗しました。');
            } else { ?>
              <div class="notation">
                <p>以下の内容で登録しました。</p>
              </div>
              <div class="form__outer">
                <p class="register__label">氏名</p>
                <p class="register__content"><?= $userData['name'] ?></p>
              </div>
              <div class="form__outer">
                <p class="register__label">フリガナ</p>
                <p class="register__content"><?= $userData['furigana'] ?></p>
              </div>
              <div class="form__outer">
                <p class="register__label">メール</p>
                <p class="register__content"><?= $userData['email'] ?></p>
              </div>
              <div class="form__outer">
                <p class="register__label">好きな音楽のカテゴリ</p>
                <p class="register__content"><?= $userData['music_category'] ?></p>
              </div>
              <div class="form__outer">
                <p class="register__label">メールで演奏会の通知を受け取る</p>
                <p class="register__content">
                  <?php
                  if ($userData['subscribe_mail'] === 1) {
                    echo "受け取る";
                  } else {
                    echo "受け取らない";
                  }
                  ?>
                </p>
              </div>
            <?php } ?>
          <?php } ?>
        <?php
          session_destroy();
        } ?>
      </div>
    </div>
    <a href="./index.php" class="totop-btn btn">TOPへ戻る</a>
  </main>
</body>

</html>