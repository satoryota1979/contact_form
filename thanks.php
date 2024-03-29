<?php

// このページが表示された時の送信方法(GET or POST)の確認
// GET送信のばいいは、入力画面に遷移する
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Location: index.html');
}

// 1.functions.phpを読み込む
// 2.$_POSTから送信された値を取得（エスケープ処理も）
// 3.値を画面に表示する

// functions.phpを読み込む
require_once('functions.php');
// dbconnect.phpを読み込む
require_once('dbconnect.php');

$usernameResult = h($_POST['username']);
$emailResult = h($_POST['email']);
$contentResult = h($_POST['content']);

// 受け取ったデータを元に、データベースに登録
// SQLの準備
$stmt = $dbh->prepare('INSERT INTO surveys(username, email, content, created_at) VALUES(?,?,?, now())');

// SQLを実行
// ?の部分に当たる値を配列で渡す
$stmt->execute([$usernameResult, $emailResult, $contentResult]);

// ?: SQLインジェクションの対策
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>送信完了</title>
</head>
<body>
<div class="border col-12">
    <h1>お問い合わせありがとうございました</h1>
    <div class="col-12 mb-5 border">
        <p>名前：<?php echo $usernameResult; ?></p>
        <p>メールアドレス：<?php echo $emailResult; ?></p>
        <p>内容：<?php echo $contentResult; ?></p>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </div>
</div>
</body>
</html>