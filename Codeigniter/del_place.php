<?php

    $id = $_POST['user_id'];
    $place_id = $_POST['place_id'];

    $mysqli = new mysqli("localhost", "root", "root", "cleanup");
    $sql = "SELECT id, item_name FROM item WHERE user_id = $id AND place_id = $place_id";
    $res = $mysqli->query($sql);
    $row = $res->fetch_all(MYSQLI_ASSOC);


    if($row == null ) {

      $sql = "DELETE FROM place WHERE id = $place_id AND user_id = $id";
      $res = $mysqli->query($sql);

      $no = "true";

    }else {
      
      $no = "fault";
    }

    $list = array("id" => $id, "DB_check" => $no);
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($list);
    exit;
  ?>