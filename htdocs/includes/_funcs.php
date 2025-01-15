<?php
require_once __DIR__ . '/../config/db.php';
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function htmlSpChar($stg)
{
  return htmlspecialchars($stg, ENT_QUOTES);
}

//DB接続
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

//SQLエラー
function sql_error($stmt)
{
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit('SQLError:' . $error[2]);
}

// ハッシュ化
function to_hash($pw)
{
  return password_hash($pw, PASSWORD_DEFAULT);
}

//リダイレクト
function redirect($file_name)
{
  header('Location: ' . $file_name);
  exit();
}

// ログインチェック処理
function loginCheck()
{
  if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    exit('LOGIN ERROR');
  }

  session_regenerate_id(true);
  $_SESSION['chk_ssid'] = session_id();
}
