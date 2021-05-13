<style>
.page {
    background: url(./img/icon_page.png) no-repeat 50%;
}
</style>

<div id="contents">

<table>
<thead>
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
</thead>
</table>

<table id="cleanTab">
    <thead>
  <tr>
    <th style="width:5%;">○</th>
    <th style="width:10%;">管理番号</th>
    <th style="width:55%;">場所</th>
    <th style="width:15%">登録日</th>
    <th style="width:15%">情報</th>
  </tr>

<?php
$i = 0;
$y = 0;

For($i=0;$i<count($cleanup);$i++) { ?>
    <tbody class="place-<?= $cleanup[$i]["id"] ?>" data-head="<?= $i + 1 ?>">
    <tr class="bg-ffe">
      <td class="page" data-toggle="collapse" data-target="#accordion<?= $cleanup[$i]["id"] ?>"></td>
      <td><font color=#090><?= str_pad($i + 1,3,0,STR_PAD_LEFT); ?></font></td>
      <td><input type="text" class="place_text table_text bg-ffe" data-placeid=<?= $cleanup[$i]["id"] ?> value="<?= $cleanup[$i]['name']; ?>"></td>
      <td>
      <input type="text" class="info_text table_text bg-ffe" data-infoid=<?= $cleanup[$i]["id"] ?> value="<?= $cleanup[$i]["info"]; ?>">
      <td>
        <button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;" data-value="<?= $cleanup[$i]["id"] ?>">＋</button>
      </td>
    </tr>

  <?php For($y=0;$y < count($cleanup[$i]['items']);$y++) { ?>
    <tr id="accordion<?= $cleanup[$i]["id"] ?>" class="collapse show">
      <td>
      </td>
      <td>
          <a><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></a>
      </td>
      <td>
          <input type="text" class="item_text table_text" style="color:#000;" data-itemid=<?= $cleanup[$i]['items'][$y]['id'] ?> value="<?= $cleanup[$i]['items'][$y]['item_name'] ?>">
      </td>
      <td>
          <font color=#000><?= substr($cleanup[$i]['items'][$y]['created_at'],0,10) ?></font>
      </td>
      <td>
          <a><button type="button" class="btn btn-secondary p-0 w-50 remove" data-itemDEL=<?= $cleanup[$i]['items'][$y]['id'] ?>>削除</button></a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
<?php } ?>

</tbody>

</table>

<br><br><br><br>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

// メイン画面のアイテム追加ボタンをクリックした時の処理
    $(document).on('click', '.addRow', async function() {
        var base_url = '<?= base_url() ?>';

        var data = ""

        var tech = 'accordion' + $(this).data('value');

        var now = new Date();
        var y = now.getFullYear();
        var m = ("0" + (now.getMonth() + 1)).slice(-2);
        var d = ("0" + now.getDate()).slice(-2);

        var item_name = "new-item"

        date = y + '-' + m + '-' + d;

        var html = 
      '<tr id="' + tech + '" class="collapse show"><td></td><td><button type="button" class="btn btn-info mt-1 p-0 w-75 check-1" data-status="0">保管中</button></td><td><input type="text" id="item_idset" class="table_text item_text" style="color:#f00;" value="new-item"></td><td><font color=#f00>'+ date +'</font></td><td><button type="button" id="item_delset" class="btn btn-secondary p-0 w-50 remove">削除</button></td><tr>';
        $(this).parents('tbody').append(html);

        try {
          await axios.post(base_url + "Item/post", {
                    place_id: $(this).data('value'),
                    item_name: item_name
              })
                .then(function(response) {
                  $(document).ready(function(){
                      $("#item_idset").attr('data-itemid', response.data.id); 
                      document.getElementById("item_idset").removeAttribute("id");

                      $("#item_delset").attr('data-itemdel', response.data.id); 
                      document.getElementById("item_delset").removeAttribute("id");
                  });
                })
                
        } catch(error) {
                  alert(error);
        }

    });

// 場所の削除ボタンをクリックした時の処理
$(document).on('click', '.delRow', function() {

checkdata = "";
del_placeList = $(this);

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

        var place_id = $(this).data('value');
        var base_url = '<?= base_url() ?>';

        try {
          axios.post(base_url + "Place/delete", {
                    id: place_id,
              })
                .then(function(response) {
                      $(document).ready(function(){

                      if (response.data.place_check == "FALSE") {
                          Swal.fire({
                              title: '削除する事が出来ません',
                              html: '<span style="color:red;">アイテムの項目が残っています。</span>',
                              type: 'error',
                              confirmButtonColor: '#3085d6',
                          })
                      } else {
                          del_placeList.parents('tbody').remove();
                          var dellist = '#placelist-' + del_placeList.data('value');
                          $(dellist).remove();

                          Swal.fire({
                              text: "削除されました",
                              type:"success"
                          });
                      }
                      
                      });
                })
        } catch(error) {
                  alert(error);
        }

      } 
  });
});



// メイン画面のアイテム削除ボタンをクリックした時の処理
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
      $(this).parents('tr').remove();

      var id = $(this).data('itemdel');
      var base_url = '<?= base_url() ?>';


      try {
          axios.post(base_url + "Item/delete", {
                    id: id,
              })
                .then(function(response) {
                  $(document).ready(function(){
                        Swal.fire({
                          text: "削除されました",
                          type:"success"
                        });
                  });
                })    
        } catch(error) {
                  alert(error);
        }

    }
  });
});


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

// メイン画面のitemテキストを変更した時の処理
$(document).on('change', '.item_text', function(){
        var id = $(this).data('itemid');
        var item_name = $(this).val();
        var base_url = '<?= base_url() ?>';

        try {
          axios.post(base_url + "Item/put", {
                    id: id,
                    item_name: item_name
              })
                .then(function(response) {
                      $(document).ready(function(){

                      });
                })
      } catch(error) {
                  alert(error);
      }

});

// メイン画面のplaceテキストを変更した時の処理
$(document).on('change', '.place_text', function(){
      var base_url = '<?= base_url() ?>';
      var id = $(this).data('placeid');
      var name = $(this).val();

      try {
          axios.post(base_url + "Place/put", {
                    id: id,
                    name: name
              })
                .then(function(response) {
                      $(document).ready(function(){
                          $('#placelist-'+id).text(name);                  
                      });
                })
      } catch(error) {
                  alert(error);
      }
});

    
// メイン画面のinfoテキストを変更した時の処理
$(document).on('change', '.info_text', function(){
      var base_url = '<?= base_url() ?>';

      var id = $(this).data('infoid');
      var info = $(this).val();

      try {
          axios.post(base_url + "Place/info", {
                    id: id,
                    info: info
              })
                .then(function(response) {
                      $(document).ready(function(){

                      });
                })
      } catch(error) {
                  alert(error);
      }
  });

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