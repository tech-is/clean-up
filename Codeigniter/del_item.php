<?php

    $id = $_POST['id'];

    $mysqli = new mysqli("localhost", "root", "root", "cleanup");
  
    $sql = "DELETE FROM item WHERE id = $id";

    $res = $mysqli->query($sql);

    $list = array("id" => $id, "DB_check" => $no);
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($list);

    exit;
  ?>