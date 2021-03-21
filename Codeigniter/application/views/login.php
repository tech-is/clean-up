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
    <form id="loginForm">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const base_url = '<?= base_url() ?>';
        $("#loginForm").submit(async function(e) {
            e.preventDefault();
            try {
                await axios.post(base_url + 'User/login', {
                    name: $('input[name=name]').val(),
                    password: $('input[name=password]').val()
                });
                location.href = base_url;
            } catch(error) {
                alert(error.response.data.message);
            }
        });
    </script>
</body>
</html>

