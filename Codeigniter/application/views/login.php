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
        <div class="form">
            <label for="name">ユーザー名またはメールアドレス</label><br>
            <input type="text" name = "name">
        </div>

        <div class="form">
            <label for="password">パスワード</label><br>
            <input type="password" name = "password">
        </div>
        
        <div class="form">
            <input type="submit" value="ログイン">
        </div>
        <a href="index.php/welcome/forget_password">パスワードを忘れた方はこちらへ</a><br>
        <a href="index.php/welcome/register">会員登録がまだの方はこちらへ</a>
    </form>
</body>
</html>

