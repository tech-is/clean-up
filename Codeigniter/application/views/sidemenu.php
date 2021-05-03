
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

    if ($('tbody:last').data('head') === undefined) {
        var tech = "1";
    } else {
        var tech = $('tbody:last').data('head') + 1;
    }

    $(".delRow").each(function() {
        $(this).html('＋');
        $(this).removeClass();
        $(this).addClass("btn btn-primary rounded-circle p-0 addRow")
    });

        $(".check-add").text('場所の削除');
        $(".check-add").addClass("btn btn-danger mt-1 p-1 check-del");
        $(".check-add").removeClass("btn-primary check-add");


    var user_id = <?php echo json_encode($_SESSION['id']); ?>;

    $.ajax({
        type: "POST",
        url: "add_place.php",
        data:{ "user_id" : user_id},
        dataType : "json"
      })

      .done(function(data){
        // 表示を書き換える場合
        $("#return").html('<p>'+data.DB_check+'</p>');

        var html = '<tbody id="tbody_dataSet"><tr class="bg-ffe"><td class="page" data-toggle="collapse" data-target="#accordion' + data.DB_check + '"></td><td><font color=#090>' + (('000' +tech).slice(-3)) + '</font></td><td><input type="text" class="place_text table_text bg-ffe" id="place_nameSet" value="new-place"></td><td><input type="text" class="info_text table_text bg-ffe" id="place_infoSet" value="new-info"></td><td><button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;" data-value="' + data.DB_check + '">＋</button></td>'
        $('#cleanTab').append(html);
        var html = '<p><a id="placelist-' + data.DB_check + '" class="place-S" data-place="' + data.DB_check + '">new-place</a></p>'
        $('.side_bar').append(html);


        $(document).ready(function(){
          // 後でデータベースから引用する形に変更する、
          $("#tbody_dataSet").addClass("place-"+data.DB_check);
          $("#tbody_dataSet").attr('data-head', tech);
          document.getElementById("tbody_dataSet").removeAttribute("id");

          $("#place_nameSet").attr('data-placeid', data.DB_check);
          document.getElementById("place_nameSet").removeAttribute("id");
          $("#place_infoSet").attr('data-infoid', data.DB_check); 
          document.getElementById("place_infoSet").removeAttribute("id");

        });
      })
      
      .fail(function(XMLHttpRequest, status, error_message){
        alert(error_message);
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
