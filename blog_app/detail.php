<?php

//②一覧画面からブログのidを送る
$id = $_GET['id'];

if(empty($id)){
    exit('idが不正です。');
}

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
if(empty($result)){
    exit('ブログがありません。');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BLOG詳細</title>
</head>
<body>
<h2>BLOG詳細</h2>
<h3>TITLE:<?php echo $result['title'] ?></h3>
<p>投稿日時：<?php echo $result['post_at'] ?></p>
<p>カテゴリ：<?php echo $result['category'] ?></p>
    <hr>
      <p>本文：<?php echo $result['content'] ?></p>
</body>
</html>