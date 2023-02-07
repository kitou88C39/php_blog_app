<?php
//関数一つに一つの機能のみを持たせる
//1.データベースを接続
//2.データを取得する
//3.カテゴリー名を表示

//1.データベースを接続
//引数：無
//返り値：接続結果を返す

function dbConnect()
{
  $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
  $user = 'blog_user';
  $pass = 'aaaaa';

  try {
    $dbh = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
  } catch (PDOException $e) {
    echo "接続失敗" . $e->getMessage();
    exit();
  };
  return $dbh;
}
//2.データを取得する
//引数：無
//返り値：取得したデータ
function getAllBlog(){
  $dbh = dbConnect();
//①SQLの準備
  $sql = 'SELECT * FROM blog';
  //②SQLの実行
  $stmt = $dbh->query($sql);
  //③SQLの結果を受け取る
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  return $result;
  $dbh = null;
}
//取得したデータを表示
$blogData = getAllBlog();

//3.カテゴリー名を表示
//引数：数字
//返り値：カテゴリーの文字列
function setCategoryName($category){
  if ($category === '1'){
    return 'ブログ';
  } elseif ($category === '2') {
    return '日常';
  } else {
    return 'その他';
  }
}
?>



