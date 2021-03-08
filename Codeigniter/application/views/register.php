<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録フォーム</h1>
    <form action="" nethod="post">
        <div class="register">
            <label>名前</label>
            <input type="text" name="your_name">
        </div>

        <div class="register">
            <label>カナ</label>
            <input type="text" name="kana">
        </div>

        <div class="register">
            <label>生年月日</label>
            <input type="date">
        </div>

        <div class="register">
            <label>メールアドレス</label>
            <input type="text" name="mail">
        </div>

        <div class="register">
            <label>パスワード</label>
            <input type="password" name="password">
        </div>

        <div class="register">
            <label>確認用パスワード</label>
            <input type="password" name="password">
        </div>

        <input type="submit" value="登録">
        <button type="button" onclick="history.back()">戻る</button>
    </form>
</body>
</html>

<style>
register{
    text-align: center;
}
</style>