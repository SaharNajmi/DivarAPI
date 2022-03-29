<?php
include "query.php";
$query = new query();

$title = $_POST['title'];
$desc = $_POST['description'];
$price = $_POST['price'];
$userId = $_POST['userID'];
$city = $_POST['city'];
$cate = $_POST['category'];
$date = date('Y-m-d H:i:s');

$imagePath1 = $query->uploadFile($_FILES['image1']);
$imagePath2 = $query->uploadFile($_FILES['image2']);
$imagePath3 = $query->uploadFile($_FILES['image3']);

if ($title != null &&
    $desc != null &&
    $price != null &&
    $userId != null &&
    $city != null &&
    $cate != null) {
    $add = $query->addBanner($title, $desc, $price, $userId, $city, $cate, $imagePath1['fileName'], $imagePath2['fileName'], $imagePath3['fileName'], $date);

    echo json_encode($add);

} else
    echo "تمام فیلد ها را پر کنید";