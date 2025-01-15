<?php
$hash_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホーム画面</title>
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <main class="top__wrapper">
    <nav class="menu__content">
      <ul class="menu__list">
        <li class="menu__item">
          Welcome
        </li>
        <li class="menu__item">
          <?= '<a href="./mypage/index.php?id=' . $hash_id . '" class="mypage">マイページ</a>' ?>
        </li>
        <li class="menu__item">
          <a href="./auth/logout.php">ログアウト</a>
        </li>
      </ul>
    </nav>
  </main>
</body>

</html>