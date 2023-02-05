<?php
$dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
$user = 'blog_user';
$pass = 'aaaaa';

try {
  $dbh = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ]);
  //echo "接続成功";
  //①SQLの準備
  $sql = 'SELECT * FROM blog';
  //②SQLの実行
  $stmt = $dbh->query($sql);
  //③SQLの結果を受け取る
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  // var_dump($result);
  $dbh = null;
} catch(PDOException $e) {
  echo "接続失敗".$e->getMessage();
  exit();
};

// var_dump($dbh);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BLOG一覧</title>
</head>
<body>
  <table>
    <tr>
      <th>No</th>
      <th>Title</th>
      <th>Category</th>
    </tr>
    <?php foreach($result as $column): ?>
    <tr>
      <th><?php echo $column['id'] ?></th>
      <th><?php echo $column['title'] ?></th>
      <th><?php echo $column['category'] ?></th>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>


