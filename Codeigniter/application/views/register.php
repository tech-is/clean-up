<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/clip.css" type="text/css" />
</head>
<body>
    <h1>会員登録フォーム</h1>
    <form action="" nethod="post">

        <div class="register">
            <input type="text" name="username" placeholder="ユーザーネーム">
        </div>

        <div class="register">
            <input type="text" name="mail" placeholder="メールアドレス">
        </div>

        <div class="register">
            <input type="password" name="password" class="password" placeholder="パスワード">
        </div>

        <div class="register">
            <input type="password" name="password" placeholder="確認用パスワード">
        </div>

        <input type="submit" class="btn" value="登録">
        <button type="button" class="btn" onclick="history.back()">戻る</button>
    </form>
</body>
</html>