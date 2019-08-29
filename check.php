<?php

// functions.php を読み込んで、定義した関数を使えるようにする
require_once('functions.php');

// スーパーグローバル変数(PHPが元々用意している変数)

// 送信されてきた値の取得
// XSS（クロスサイトスクリプティング）の対策をする

// エスケープ処理:htmlspecialchars
// htmlspecialchars(対象の文字,オプション,文字コード)
$username = h($_POST['username']);
$email = h($_POST['email']);
$content = h($_POST['content']);


// 入力無しエラー判定用、エラーの場合１
$usernameError = 0;
$emailError = 0;
$contentError = 0;

// ユーザー名が空かチェック
if ($username == '') {
    $usernameResult ='ユーザー名が入力されていません。';
    $usernameError = 1;
} else {
    $usernameResult = $username;
    $usernameError = 0;
}
if ($email == '') {
    $emailResult ='emailが入力されていません。';
    $emailError = 1;
} else {
    $emailResult = $email;
    $emailError = 0;
}
if ($content == '') {
    $contentResult ='内容が入力されていません。';
    $contentError = 1;
} else {
    $contentResult = $content;
    $contentError = 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>入力内容確認</title>
</head>
<body>
<div class="border col-12">
    <h1>入力内容確認</h1>
    <div class="col-12 mb-5 border">
        <p>名前：<?php echo $usernameResult; ?></p>
        <p>メールアドレス：<?php echo $emailResult; ?></p>
        <p>内容：<?php echo $contentResult; ?></p>

        <form action="thanks.php" method="POST">
            <input type="hidden" name="username" value="<?php echo $usernameResult; ?>">
            <input type="hidden" name="email" value="<?php echo $emailResult; ?>">
            <input type="hidden" name="content" value="<?php echo $contentResult; ?>">
            <button type="button" onclick="history.back();">戻る</button>
            <input type="submit" value="OK">
        </form>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<?php
    if ($usernameError == 1) {
        echo '<div>';
        echo '<form action="check.php" method="post">';
        echo '<input id="name" type="text" background="red" name="username">';
        echo '</form>';
        echo '</div>';
    } 
    ?>
</body>
</html>