<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/clip.css" type="text/css" />
</head>
<body>
    <h1>ログインフォーム</h1>
    <form action="index"　method="post">
        <div class="form">
            <input type="text" name = "name" placeholder="IDまたはメールアドレス">
        </div>

        <div class="form">
            <input type="password" name = "password" placeholder="password">
        </div>
        
        <div class="form">
                <input type="submit" class="btn" value="ログイン">
                <button type="button" class="btn" onclick="location.href='register'">会員登録</button>
        </div>

        <div class="link">
            <a href="forget_password">パスワードを忘れた方はこちらへ</a><br><br>
        </div>
    </form>
</body>
</html>

