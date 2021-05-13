
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

    var name = "new-place";
    var base_url = '<?= base_url() ?>';

    try {
          axios.post(base_url + "Place/post", {
                    name: name
              })
                .then(function(response) {
                      $(document).ready(function(){
                        var html = '<tbody id="tbody_dataSet"><tr class="bg-ffe"><td class="page" data-toggle="collapse" data-target="#accordion' + response.data.id + '"></td><td><font color=#090>' + (('000' +tech).slice(-3)) + '</font></td><td><input type="text" class="place_text table_text bg-ffe" id="place_nameSet" value="new-place"></td><td><input type="text" class="info_text table_text bg-ffe" id="place_infoSet" value="new-info"></td><td><button type="button" class="btn btn-primary rounded-circle p-0 addRow" style="width:2rem;height:2rem;" data-value="' + response.data.id + '">＋</button></td>'
                        $('#cleanTab').append(html);
                        var html = '<p><a id="placelist-' + response.data.id + '" class="place-S" data-place="' + response.data.id + '">new-place</a></p>'
                        $('.side_bar').append(html);

                        $("#tbody_dataSet").addClass("place-"+response.data.id);
                        $("#tbody_dataSet").attr('data-head', tech);
                        document.getElementById("tbody_dataSet").removeAttribute("id");

                        $("#place_nameSet").attr('data-placeid', response.data.id);
                        document.getElementById("place_nameSet").removeAttribute("id");
                        $("#place_infoSet").attr('data-infoid', response.data.id); 
                        document.getElementById("place_infoSet").removeAttribute("id");
                      });
                })
      } catch(error) {
                  alert(error);
      }

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
