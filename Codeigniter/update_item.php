<?php

    $id = $_POST['id'];
    $no = $_POST['no'];
    $no1 = $_POST['user_id'];

    // テスト用     // userテーブルの全てのデータを取得する
    $mysqli = new mysqli("localhost", "root", "root", "cleanup");

    $sql = "UPDATE item SET item_name = '$no' WHERE id = '$id'";
    $sth = $mysqli -> query($sql);

    $list = array("DB_check" => $no);
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($list);
    exit;
  ?>