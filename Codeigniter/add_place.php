<?php

    $user_id = $_POST['user_id'];

    $mysqli = new mysqli("localhost", "root", "root", "cleanup");

    $sql = "INSERT INTO place(user_id, name, info) VALUES('$user_id', 'new-place', 'new-info')";

    $res = $mysqli->query($sql);

    $no = $mysqli->insert_id;

    $list = array("id" => $place_id, "DB_check" => $no);
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($list);
    exit;
  ?>