<?php
require_once('dbc.php');
//取得したデータを表示
$blogData = getAllBlog();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BLOG一覧</title>
</head>
<body>
<h2>BLOG一覧</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Title</th>
      <th>Category</th>
    </tr>
    <?php foreach($blogData as $column): ?>
    <tr>
      <td><?php echo $column['id'] ?></td>
      <td><?php echo $column['title'] ?></td>
      <td><?php echo setCategoryName($column['category']) ?></td>
      <!-- ①一覧画面からブログのidを送る GETリクエストでidをURLにつけて送る -->
      <td><a href="/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>