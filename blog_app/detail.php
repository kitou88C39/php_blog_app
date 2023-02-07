<?php

//②一覧画面からブログのidを送る
$id = $_GET['id'];

// ③idをもとにデータベースから記事を取得
Function dbConnect()
{
  $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
  $user = 'blog_user';
  $pass = 'aaaaa';

  try {
    $dbh = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
  } catch (PDOException $e) {
    echo "接続失敗" . $e->getMessage();
    exit();
  };
  return $dbh;
}
$dbh = dbConnect();

//SQL準備
$stmt = $dbh->prepare('SELECT * FROM blog where id = :id');
$stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
//SQL準備
$stmt->execute();
//SQL準備
$result = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($result);
?>