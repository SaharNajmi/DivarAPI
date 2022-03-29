<?php

$city = $_GET['city'];
$category = $_GET['category'];
include 'query.php';
$query = new query();

//get ads by city and category
if ($city != "" && $category != "") {
    if ($city == "all") {
        if ($category == "all")
            $sql = "select * from banners where status=1 order by id DESC ";
        else if ($category != "all")
            $sql = "select * from banners where status=1 and category='$category' order by id DESC ";
    } else if ($city != "all") {
        if ($category == "all")
            $sql = "select * from banners where status=1 and city='$city' order by id DESC ";
        else if ($category != "all")
            $sql = "select * from banners where status=1 and city='$city' and category='$category' order by id DESC ";
    }
    echo json_encode($query->getBanner($sql));
} else
    echo "null";

