<?php
//①require_onceを使ってみよう
require_once('dbc.php');
//②namespaceを設定しよう
//③useを使おう

$result = getBlog($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BLOG詳細</title>
</head>
<body>
<!-- ④詳細ページに表示する -->
<h2>BLOG詳細</h2>
<h3>TITLE:<?php echo $result['title'] ?></h3>
<p>投稿日時：<?php echo $result['post_at'] ?></p>
<p>カテゴリ：<?php echo setCategoryName($result['category']) ?></p>
    <hr>
      <p>本文：<?php echo $result['content'] ?></p>
</body>
</html>