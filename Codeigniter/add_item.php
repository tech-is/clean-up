<?php

    $user_id = $_POST['user_id'];
    $place_id = $_POST['place_id'];

    $mysqli = new mysqli("localhost", "root", "root", "cleanup");

    $date = new DateTime();
    $date = $date->format('Y-m-d H:i:s');
    
    $sql = "INSERT INTO item(user_id, place_id, item_name, created_at) VALUES('$user_id', '$place_id', 'new-item', '$date')";

      $res = $mysqli->query($sql);

    $no = $mysqli->insert_id;

    $list = array("id" => $place_id, "DB_check" => $no);
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($list);
    exit;
  ?>