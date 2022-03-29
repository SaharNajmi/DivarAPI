<?php

$tell = $_GET['tell'];
include 'query.php';
$query = new query();
$id = $query->getUserIDWIthPhone($tell);

if ($tell != "") {
    $sql = "select * from banners where status=1  and userID='$id' order by id DESC ";
    echo json_encode($query->getBanner($sql));
} else
    echo "null";