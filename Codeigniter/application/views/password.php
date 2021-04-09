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
    <form id="password">
        <tbody>
            <tr>
                <th>メールアドレス</th>
                <th><input type="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></th>
            </tr>
        </tbody>
</div>
        <div class="button">
            <button type="submit" class="btn">再発行</button>
            <button type="button" class="btn" onclick="history.back()">戻る</button>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const base_url = '<?= base_url() ?>';
        $("#password").submit(async function(e) {
            e.preventDefault();
            try {
                await axios.post(base_url + 'User/password', {
                    mail: $('input[name=mail]').val(),
                });
                location.href = base_url;
            } catch(error) {
                alert(error.response.data.message);
            }
        });
    </script>
</body>
</html>