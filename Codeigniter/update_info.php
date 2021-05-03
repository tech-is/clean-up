<?php

    $id = $_POST['id'];
    $no = $_POST['no'];

    $mysqli = new mysqli("localhost", "root", "root", "cleanup");

    $sql = "UPDATE place SET info = '$no' WHERE id = '$id'";

    $sth = $mysqli -> query($sql);

    $list = array("id" => $id, "DB_check" => $no);
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($list);
    exit;
  ?>