<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
</head>
<body>
    <h1>ログインフォーム</h1>
    <form action="index.php/welcome/ok"　method="post">
        <label for="name">ユーザー名またはメールアドレス</label><br>
        <input type="text" name = "name"><br>
        <label for="password">パスワード</label><br>
        <input type="password" name = "password"><br>
        <input type="submit" value="ログイン"><br>
        <a href="index.php/welcome/forget_password">パスワードを忘れた方はこちらへ</a>
    </form>
</body>
</html>