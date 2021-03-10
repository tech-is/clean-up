<div id="contents">

  <table>
    <tbody>
  <tr>
    <th style="width:5%;">○</th>
    <th style="width:10%;">管理番号</th>
    <th style="width:45%;">部屋名</th>
    <th style="width:15%">更新日</th>
    <th style="width:10%">情報</th>
  </tr>
  <tr>
    <td class="item-done clickable" data-toggle="collapse" data-target="#accordion1"><details open><summary class="Snone"></summary></td>
    <td><font color=#090>*room[id]*</font></td>
    <td><input type="text" class="table_text" value="*room[room_name]*"></td>
    <td><font color=#f00>*item[created_at]*</font></td>
    <td><button type="button" id="addRow" class="btn btn-primary rounded-circle p-0" style="width:2rem;height:2rem;">＋</button></td>
  </tr>
  <!-- アイテム情報の表示 繰り返し用 -->
<tbody class="room-1">
    <tr id="accordion1" class="collapse show">
      <td colspan="1">
                    <p><a></a></p>
      </td>
      <td colspan="1">
                    <a><button type="button" id="check-1" class="btn btn-info mt-1 p-0 w-75" value="1" onclick="clickBtn1(this.id)">保管中</button></a>
      </td>
      <td colspan="1">
                    <input type="text" class="table_text" style="color:#f00;" value="*item[item_name]*①  例:コーラ">
      </td>
      <td colspan="1">
                    <font color=#f00>*item[created_at]*</font>
      </td>
      <td colspan="1">
                    <a><button type="button" id="dbtn02-01" class="btn btn-secondary p-0 w-50 remove">削除</button></a>
      </td>
    </tr>

<!-- 繰り返しサンプル用 -->
    <tr id="accordion1" class="collapse show">
      <td colspan="1"><p><a></a></p></td>
      <td colspan="1"><a><button type="button" id="check-2" class="btn btn-info mt-1 p-0 w-75" value="1" onclick="clickBtn1(this.id)">保管中</button></a></td>
      <td colspan="1"><input type="text" class="table_text" style="color:#f00;" value=*item[item_name]*②></td>
      <td colspan="1"><font color=#f00>*item[created_at]*</font></td>
      <td colspan="1"><a><button type="button" id="dbtn02-02" class="btn btn-secondary p-0 w-50 remove">削除</button></a></td></tr>
<!-- 繰り返しサンプル用 -->
<tr id="accordion1" class="collapse show">
      <td colspan="1"><p><a></a></p></td>
      <td colspan="1"><a><button type="button" id="check-3" class="btn btn-info mt-1 p-0 w-75" value="1" onclick="clickBtn1(this.id)">保管中</button></a></td>
      <td colspan="1"><input type="text" class="table_text" style="color:#f00;" value=*item[item_name]*③></td>
      <td colspan="1"><font color=#f00>*item[created_at]*</font></td>
      <td colspan="1"><a><button type="button" id="dbtn02-03" class="btn btn-secondary p-0 w-50 remove">削除</button></a></td></tr>
</tbody>
  <tr>
    <td></td>
    <td>0002</td>
    <td>テックアイエス</td>
    <td>2021/01/21</td>
    <td>
      <button type="button" class="btn btn-primary rounded-circle p-0" style="width:2rem;height:2rem;">＋</button>
    </td>
  </tr>
</table>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </div>

<script>
    $('#addRow').click(function(){
        var html = 
      '<tr id="accordion1" class="collapse show"><td colspan="1"><p></p></td><td colspan="1"><button type="button" class="btn btn-info mt-1 p-0 w-75" value="1" onclick="clickBtn1(this.id)">保管中</button></td><td colspan="1"><input type="text" class="table_text" style="color:#f00;" value="新しいアイテム"></td><td colspan="1"><font color=#f00>*item[created_at]*</font></td><td colspan="1"><button type="button" class="btn btn-secondary p-0 w-50 remove">削除</button></td><tr>';
        $('.room-1').append(html);
    });

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
    function clickBtn1(check1) {
      const input1 = document.getElementById(check1);
          if (input1.value === "1") {
              input1.value = "0";
              input1.innerHTML = "持出中";
              input1.className = "btn btn-warning mt-1 p-0 w-75";
          } else {
              input1.value = "1";
              input1.innerHTML = "保管中";
              input1.className = "btn btn-info mt-1 p-0 w-75";
          }
    }
</script>