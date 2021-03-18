<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/clip.css" type="text/css" />
</head>
<body>
<div class="password-reissue">
    <h1>パスワード再発行</h1>
    <div class="reissue">
        <tbody>
            <tr>
                <th>メールアドレス</th>
                <th><input type="mail" name="mail"></th>
            </tr>
        </tbody>
    </div>
    <div class="button">
        <button type="button" class="re">再発行する</button>
        <button type="button" class="back" onclick="history.back()">戻る</button>
    </div>
</div>
</body>
</html>