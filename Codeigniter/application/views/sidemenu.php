
<!-- サイドバー -->
<aside id="sub">
  <h1>場所情報</h1>
        <!-- 折り畳み要素 -->
        <details open><summary>場所別</summary>
        <font color=#090>
        <ul class="side_bar">
            <p><a class="place-All" data-place="all">全ての場所</a></p>     
            <p><a id="placelist-1" class="place-S" data-place="1">*place[name]*1</a></p>
            <p><a id="placelist-2" class="place-S" data-place="2">*place[name]*2</a></p>
            <p><a id="placelist-3" class="place-S" data-place="3">*place[name]*3</a></p>
        </details>
        </font>
        </ul>

  <h1>各種設定</h1>
  <ul class="setting">
    <li class="addPlace">⭕️場所の追加</li>
    <li class="check-del">⭕️場所の削除</li>
    <li class="all-reset">⭕️全て展開</li>
    <li class="all-set">⭕️全て縮小</li>
    <li></li>
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

// サイドバー：場所の追加
$('.addPlace').click(function(){

        if ($('tbody:last').data('value') === undefined) {
            var tech = "1";
        } else {
            var tech = $('tbody:last').data('value') + 1;
        }
        var html = '<tbody class="place-' + tech + '" data-value="' + tech + '"><tr class="bg-ffe"><td class="page" data-toggle="collapse" data-target="#accordion' + tech + '"></td><td>000' + tech + '</td><td><input type="text" class="table_text bg-ffe" value="テスト用' + tech + '"></td><td>2021/03/07</td><td><button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;"  data-value="' + tech + '">＋</button></td>'
        $('table').append(html);
        var html = '<p><a id="placelist-' + tech + '" class="place-S" data-place="' + tech + '">*place[name]*' + tech + '</a></p>'
        $('.side_bar').append(html);

        $(".delRow").each(function() {
            $(this).html('＋');
            $(this).removeClass();
            $(this).addClass("btn btn-primary rounded-circle p-0 addRow");
        });
});

// 場所を追加するボタンと削除するボタンを切替する処理
$(document).on("click", ".check-del", function () {
      $(".addRow").each(function() {
        $(this).html('ー');
        $(this).removeClass();
        $(this).addClass("btn btn-danger rounded-circle p-0 delRow");
      });

    $(this).removeClass();
    $(this).addClass("check-add");

    });

    $(document).on("click", ".check-add", function () {
      $(".delRow").each(function() {
        $(this).html('＋');
        $(this).removeClass();
        $(this).addClass("btn btn-primary rounded-circle p-0 addRow");
      });

    $(this).removeClass();
    $(this).addClass("check-del");

    });


// サイドバー：場所削除ボタンをクリックした時の処理
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


// サイドバー：全て展開
$(document).on("click", ".all-reset", function () {
      $('tr').removeClass('show');
      $('tr').addClass('show');
});

// サイドバー：全て縮小
$(document).on("click", ".all-set", function () {
      $('tr').removeClass('show');
});

</script>


<style>
      .show-none {
        display: none;
    }
</style>
