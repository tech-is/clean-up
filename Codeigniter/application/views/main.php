<style>

.bg-ffe {
background-color  : #ffe;
}
.page {
    background: url(./img/icon_page.png) no-repeat 50%;
}


</style>


<div id="contents">

  <table>
    <thead>
  <tr>
    <th style="width:5%;">○</th>
    <th style="width:10%;">管理番号</th>
    <th style="width:45%;">場所</th>
    <th style="width:15%">更新日</th>
    <th style="width:10%">情報</th>
  </tr>
<tbody class="place-1">
  <tr class="bg-ffe">
    <td class="page" data-toggle="collapse" data-target="#accordion1"></td>
    <td><font color=#090>*place[id]*</font></td>
    <td><input type="text" class="table_text bg-ffe" value="*place[name]*"></td>
    <td><font color=#f00>*item[created_at]*</font></td>
    <td>
      <button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;" data-value="1">＋</button>
      <!-- <button type="button" class="btn btn-danger rounded-circle p-0 delRow" style="width:2rem;height:2rem;" data-value="1">ー</button> -->
    </td>
  </tr>
  <!-- アイテム情報の表示 繰り返し用 -->
    <tr id="accordion1" class="collapse show">
      <td colspan="1">
                    <p><a></a></p>
      </td>
      <td colspan="1">
                    <a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a>
      </td>
      <td colspan="1">
                    <input type="text" class="table_text" style="color:#f00;" value="*item[item_name]*①">
      </td>
      <td colspan="1">
                    <font color=#f00>*item[created_at]*</font>
      </td>
      <td colspan="1">
                    <a><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></a>
      </td>
    </tr>

<!-- 繰り返しサンプル用 -->
    <tr id="accordion1" class="collapse show">
      <td colspan="1"><p><a></a></p></td>
      <td colspan="1"><a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a></td>
      <td colspan="1"><input type="text" class="table_text" style="color:#f00;" value=*item[item_name]*②></td>
      <td colspan="1"><font color=#f00>*item[created_at]*</font></td>
      <td colspan="1"><a><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></a></td></tr>
    <tr id="accordion1" class="collapse show">
      <td colspan="1"><p><a></a></p></td>
      <td colspan="1"><a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a></td>
      <td colspan="1"><input type="text" class="table_text" style="color:#f00;" value=*item[item_name]*③></td>
      <td colspan="1"><font color=#f00>*item[created_at]*</font></td>
      <td colspan="1"><a><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></a></td></tr>
</tbody>

<!-- 繰り返しサンプル用2 -->
<tbody class="place-2">
<tr class="bg-ffe">
    <td class="page" data-toggle="collapse" data-target="#accordion2"></td>
    <td>0002</td><td><input type="text" class="table_text bg-ffe" value="テスト用2"></td><td>2021/01/21</td>
    <td><button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;" data-value="2">＋</button></td>
</tr>
<tr id="accordion2" class="collapse show">
      <td colspan="1"><p><a></a></p></td>
      <td colspan="1"><a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a></td>
      <td colspan="1"><input type="text" class="table_text" style="color:#f00;" value=*item[item_name]*②></td>
      <td colspan="1"><font color=#f00>*item[created_at]*</font></td>
      <td colspan="1"><a><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></a></td></tr>
<tr id="accordion2" class="collapse show">
      <td colspan="1"><p><a></a></p></td>
      <td colspan="1"><a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a></td>
      <td colspan="1"><input type="text" class="table_text" style="color:#f00;" value=*item[item_name]*③></td>
      <td colspan="1"><font color=#f00>*item[created_at]*</font></td>
      <td colspan="1"><a><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></a></td></tr>
</tbody>


<?php
  for($i = 3; $i <= 3; $i++) { ?>
      <tbody class="place-<?= $i ?>" data-value="<?= $i ?>">
      <tr class="bg-ffe">
      <td class="page" data-toggle="collapse" data-target="#accordion<?= $i ?>"></td>
      <td>000<?= $i ?></td><td><input type="text" class="table_text bg-ffe" value="テスト用<?= $i ?>"></td><td>2021/03/0<?= $i ?></td>
      <td><button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;"  data-value="<?= $i ?>">＋</button></td>
      <tr id="accordion<?= $i ?>" class="collapse show"><td colspan="1"><p></p></td><td colspan="1"><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></td><td colspan="1"><input type="text" class="table_text" style="color:#f00;" value="新しいアイテム"></td><td colspan="1"><font color=#f00>*item[created_at]*</font></td><td colspan="1"><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></td></tr></tbody>
<?php }
?>

</table>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </div>

<script>

  // メイン画面のテーブル追加ボタンをクリックした時の処理
    $(document).on('click', '.addRow', function() {
        var tech = 'accordion' + $(this).data('value');
        var html = 
      '<tr id="' + tech + '" class="collapse show"><td colspan="1"><p></p></td><td colspan="1"><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></td><td colspan="1"><input type="text" class="table_text" style="color:#f00;" value="新しいアイテム"></td><td colspan="1"><font color=#f00>*item[created_at]*</font></td><td colspan="1"><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></td><tr>';
        $(this).parents('tbody').append(html);
    });

// メイン画面のテーブル削除ボタンをクリックした時の処理
    $(document).on('click', '.remove', function() {
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
          $(this).parents('tr').remove();
    }
  });
});
</script>

<script>
// 保管中と持出中のボタンを切替する処理
    $(document).on("click", ".check-1", function () {
      if ($(this).data("status") == "0") {
              this.innerHTML = "持出中";
              $(this).removeClass();
              $(this).addClass("btn btn-warning mt-1 p-0 w-75 check-1");
              $(this).data("status", "1");
      } else if($(this).data("status") == "1") {
              this.innerHTML = "保管中";
              $(this).removeClass();
              $(this).addClass("btn btn-info mt-1 p-0 w-75 check-1");
              $(this).data("status", "0");
      };
});
</script>

<script>
// 場所を追加するボタンと削除するボタンを切替する処理
    $(document).on("click", ".check-5", function () {
      $(".addRow").each(function() {
        $(this).html('ー');
        $(this).removeClass();
        $(this).addClass("btn btn-danger rounded-circle p-0 delRow");
      });

    $(this).removeClass();
    $(this).addClass("check-6");

    });

    $(document).on("click", ".check-6", function () {
      $(".delRow").each(function() {
        $(this).html('＋');
        $(this).removeClass();
        $(this).addClass("btn btn-primary rounded-circle p-0 addRow");
      });

    $(this).removeClass();
    $(this).addClass("check-5");

    });
</script>