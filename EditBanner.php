<?php
if ($_POST['title'] != null &&
    $_POST['description'] != null &&
    $_POST['price'] != null &&
    $_POST['userID'] != null &&
    $_POST['city'] != null &&
    $_POST['category'] != null) {

    include "query.php";
    $query = new query();

    $id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $userId = $_POST['userID'];
    $city = $_POST['city'];
    $cate = $_POST['category'];
    $date = date('Y-m-d H:i:s');

    $imageInfo = $query->getImageBanner($id);
    $imagePath1 = $query->uploadFile($_FILES['image1']);
    $imagePath2 = $query->uploadFile($_FILES['image2']);
    $imagePath3 = $query->uploadFile($_FILES['image3']);

    //upload image 1
    if ($imagePath1['state'])
        $query->removeFile($imageInfo['image1']);
    else
        $imagePath1['fileName'] = $imageInfo['image1'];

    //upload image 2
    if ($imagePath2['state'])
        $query->removeFile($imageInfo['image2']);
    else
        $imagePath2['fileName'] = $imageInfo['image2'];

    //upload image 3
    if ($imagePath3['state'])
        $query->removeFile($imageInfo['image3']);
    else
        $imagePath3['fileName'] = $imageInfo['image3'];

    //add banner
    $add = $query->editBanner($id, $title, $desc, $price, $userId, $city, $cate, $imagePath1['fileName'], $imagePath2['fileName'], $imagePath3['fileName'], $date, 0);

    echo json_encode($add);
    // echo json_encode($imageInfo);
} else
    echo "add banner not successful!!!";



