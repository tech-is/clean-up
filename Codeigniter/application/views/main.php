<style>
.page {
    background: url(./img/icon_page.png) no-repeat 50%;
}
</style>

<div id="contents">

<table style="margin:0;">
  <tr>
    <td class="cover" style="width:70%;">
        <button type="button" class="btn btn-secondary m-1 p-1 all-reset" style="float:left;">全展開</button>
        <button type="button" class="btn btn-secondary m-1 p-1 all-set" style="float:left;">全収縮</button>
    </td>
    <td class="cover">
        <button type="button" class="btn btn-primary mt-1 p-1 addPlace">場所の追加</button>
    <td class="cover">
        <button type="button" class="btn btn-danger mt-1 p-1 check-del">場所の削除</button>
    </td>
  </tr>
</table>

<table id="cleanTab">
    <thead>
  <tr>
    <th style="width:5%;">○</th>
    <th style="width:10%;">管理番号</th>
    <th style="width:55%;">場所</th>
    <th style="width:15%">更新日</th>
    <th style="width:15%">情報</th>
  </tr>

<?php
$i = 0;
$y = 0;

For($i=0;$i<count($cleanup);$i++) { ?>
    <tbody class="place-<?= $i + 1 ?>" data-value="<?= $i +1 ?>">
    <tr class="bg-ffe">
      <td class="page" data-toggle="collapse" data-target="#accordion<?= $i + 1 ?>"></td>
      <td><font color=#090><?= str_pad($i + 1,3,0,STR_PAD_LEFT); ?></font></td>
      <td><input type="text" class="table_text bg-ffe" value="<?= $cleanup[$i]['name']; ?>"></td>
      <td><font color=#f00><?= $cleanup[$i]["info"]; ?></font></td>
      <td>
        <button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;" data-value="<?= $i + 1 ?>">＋</button>
      </td>
    </tr>

  <?php For($y=0;$y < count($cleanup[$i]['items']);$y++) { ?>
    <tr id="accordion<?= $i + 1 ?>" class="collapse show">
      <td colspan="1">
                    <p><a></a></p>
      </td>
      <td colspan="1">
                    <a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a>
      </td>
      <td colspan="1">
                    <input type="text" class="table_text" style="color:#f00;" value="<?= $cleanup[$i]['items'][$y]['item_name'] ?>">
      </td>
      <td colspan="1">
                    <font color=#f00><?= substr($cleanup[$i]['items'][$y]['created_at'],0,10) ?></font>
      </td>
      <td colspan="1">
                    <a><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
<?php } ?>

</tbody>

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
$(document).on("click", ".check-del", function () {
      $(".addRow").each(function() {
        $(this).html('ー');
        $(this).removeClass();
        $(this).addClass("btn btn-danger rounded-circle p-0 delRow");
      });

    $(this).removeClass();
    $(this).addClass("btn btn-primary mt-1 p-1 check-add");
    $(this).text('itemの追加');
    });

    $(document).on("click", ".check-add", function () {
      $(".delRow").each(function() {
        $(this).html('＋');
        $(this).removeClass();
        $(this).addClass("btn btn-primary rounded-circle p-0 addRow");
      });

    $(this).removeClass();
    $(this).addClass("btn btn-danger mt-1 p-1 check-del");
    $(this).text('場所の削除');
});
</script>