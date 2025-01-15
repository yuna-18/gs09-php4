<?php
require_once __DIR__ . '/../includes/_funcs.php';
$hash_id = $_GET['id'];
// $pdo = connectDb();
// $stmt = $pdo->prepare("SELECT * FROM userdata_table");
// $stmt->execute();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPage</title>
  <link rel="stylesheet" href="../assets/css/reset.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body id="mypage">
  <main class="mypage__wrapper">
    <div class="mypage__container">
      <div class="menu__content">
        <ul class="menu__list">
          <li class="menu__item">
            <?= '<a href="../../home.php?id=' . $hash_id . '" class="">ホーム</a>' ?>
          </li>
          <li class="menu__item">
            <?= '<a href="./userdata.php?id=' . $hash_id . '" class="">登録情報</a>' ?>
          </li>
        </ul>
      </div>
      <div class="mypage__content">
      </div>
    </div>
    </div>
  </main>
</body>

</html>