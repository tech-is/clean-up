<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>会員登録フォーム</title>
</head>
<body>
    <h1>会員登録フォーム</h1>
        <div class="element_wrap">
            <label>名前</label>
            <input type="text" name="your_name">
        </div>
        <div class="element_wrap">
            <label>カナ</label>
            <input type="text" name="your_kana">
        </div>
        <div class="element_wrap">
            <label>電話</label>
            <input type="tel" name="phone">
        </div>
        <div class="element_wrap">
            <label>メールアドレス</label>
            <input type="text" name="email">
        </div>
        <div class="element_wrap">
            <label>生まれ年</label>
            <select name="year">
                <?php $year = date("Y");
                for($i=1900; $i<=$year; $i++):?>
                <option value="<?= $i;?>"><?=$i;?></option>
                <?php endfor;?>
            </select>
        </div>
        <div class="element_wrap">
                    <label>性別</label>
                    <label for="r_male"><input id="r_male" type ="radio" name = "gender" value = "0" checked="checked">男性</label>
                    <label for="r_female"><input id="r_female" type ="radio" name = "gender" value = "1">女性</label>
        </div>
        <div class="element_wrap">
            <label>メールマガジン送付</label>
            <input type="checkbox" name = "magagine" value ="1">
        </div>
        <input type="submit" name ="btn_confirm" value="登録">
</body>
</html>