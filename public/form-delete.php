<?php
require_once('../includes/_funcs.php');

$id = $_GET['id'];

$pdo = connectDb();
$stmt = $pdo->prepare("DELETE FROM userdata_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();
if ($status === false) {
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
} else {
  header('Location: mypage.php');
  exit();
}

