<?php
require_once __DIR__ . '/../includes/_funcs.php';
$email = htmlSpChar($_POST['email']);
$pw = htmlSpChar($_POST['pw']);

session_start();
$pdo = connectDb();
$stmt = $pdo->prepare("SELECT * FROM userdata_table WHERE email=:email");
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$status=$stmt->execute();

if($status === false){
  sql_error($stmt);
}
$val = $stmt->fetch();

if( $val['id'] != '' && password_verify($pw, $val['pw'])){
  //Login成功時 該当レコードがあればSESSIONに値を代入
  $_SESSION['chk_ssid'] = session_id();
  header('Location: ../home.php');
}else{
  //Login失敗時(Logout経由)
  header('Location: login.php');
}

exit();
?>