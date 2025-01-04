<?php
require_once('../config/config.php');
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function htmlSpChar($stg)
{
  return htmlspecialchars($stg, ENT_QUOTES);
}

//1.  DB接続します
function connectDb()
{
  $host = DB_HOST;
  $dbname = DB_NAME;
  $user = DB_USER;
  $password = DB_PASS;
  $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

  try {
    $pdo = new PDO($dsn, $user, $password);
    return $pdo;
  } catch (PDOException $e) {
    echo '<pre>';
    print_r($e->getMessage()); // デバッグ用に出力
    echo '</pre>';
    exit('DBConnectError' . $e->getMessage());
  }
}
