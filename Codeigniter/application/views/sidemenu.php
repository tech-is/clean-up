
<!-- サイドバー -->
<aside id="sub">
  <h1>場所情報</h1>
        <!-- 折り畳み要素 -->
        <details open><summary>場所別</summary>
        <font color=#090>
        <ul class="side_bar">
            <p><a class="place-All" data-place="all">全ての場所</a></p>
            <?php
            for($i=0;$i < count($cleanup);$i++) { ?>
                <p><a id="placelist-<?= $cleanup[$i]["id"] ?>" class="place-S" data-place="<?= $cleanup[$i]["id"] ?>"><?= $cleanup[$i]["name"] ?></a></p>
            <?php } ?>
	</ul>
	</font>
        </details>
	
  <h1>各種設定</h1>
  <ul class="setting">
    <li>ユーザー情報</li>
    <li><a href="welcome/logout">ログアウト</a></li>
  </ul>
</aside>



<script>

// サイドバー：場所情報<全ての場所>
$(document).on("click", ".place-All", function () {
      $('tbody').removeClass('show-none');
      $('tr').addClass('show');
});

// サイドバー：場所情報<部屋検索用>
$(document).on("click", ".place-S", function () {
      $('tbody').addClass('show-none');

      var PSbody = '.place-' + $(this).data('place');
      $(PSbody).toggleClass('show-none');
      $('tr').addClass('show');
});

// 場所の追加
$(document).on("click", ".addPlace", function () {

    if ($('tbody:last').data('value') === undefined) {
        var tech = "1";
    } else {
        var tech = $('tbody:last').data('value') + 1;
    }

    var html = '<tbody class="place-' + tech + '" data-value="' + tech + '"><tr class="bg-ffe"><td class="page" data-toggle="collapse" data-target="#accordion' + tech + '"></td><td>00' + tech + '</td><td><input type="text" class="place_text table_text bg-ffe" data-placeid="'+tech+'" value="テスト用' + tech + '"></td><td>2021-03-07</td><td><button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;"  data-value="' + tech + '">＋</button></td>'
    $('#cleanTab').append(html);
    var html = '<p><a id="placelist-' + tech + '" class="place-S" data-place="' + tech + '">*place[name]*' + tech + '</a></p>'
    $('.side_bar').append(html);

    $(".delRow").each(function() {
        $(this).html('＋');
        $(this).removeClass();
        $(this).addClass("btn btn-primary rounded-circle p-0 addRow");
    });
});


// 場所削除ボタンをクリックした時の処理
$(document).on('click', '.delRow', function() {
      Swal.fire({
        title: '削除しても宜しいでしょうか？',
        html: '<span style="color:red;">元に戻す事は出来ません。</span>',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
          Swal.fire({
            text: "削除されました",
            type:"success"
        });
          $(this).parents('tbody').remove();
          var dellist = '#placelist-' + $(this).data('value');
          $(dellist).remove();

    }
  });
});


// 全て展開
$(document).on("click", ".all-reset", function () {
      $('tr').removeClass('show');
      $('tr').addClass('show');
});

// 全て縮小
$(document).on("click", ".all-set", function () {
      $('tr').removeClass('show');
});

</script>


<style>
      .show-none {
        display: none;
    }
</style>
