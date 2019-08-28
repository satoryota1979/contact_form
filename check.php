<?php
// スーパーグローバル変数(PHPが元々用意している変数)

// 送信されてきた値の取得
$username = $_POST['username'];
$email = $_POST['email'];
$content = $_POST['content'];

// ユーザー名が空かチェック
if ($username == '') {
    $usernameResult ='ユーザー名が入力されていません。';
} else {
    $usernameResult = $username;
}
if ($email == '') {
    $emailResult ='emailが入力されていません。';
} else {
    $emailResult = $email;
}
if ($content == '') {
    $contentResult ='内容が入力されていません。';
} else {
    $contentResult = $content;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>

    <p>名前：<?php echo $usernameResult; ?></p>
    <p>メールアドレス：<?php echo $emailResult; ?></p>
    <p>内容：<?php echo $contentResult; ?></p>

    <form action="index.html">
        <button>戻る</button>
        <input type="submit" value="OK">
    </form>

</body>
</html>