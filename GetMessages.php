<?php
include 'query.php';
$query = new query();

$bannerID = $_GET['bannerID'];
$MyPhone = $_GET['MyPhone'];

if (!empty($_GET) &&
    $bannerID != "" &&
    $MyPhone != "") {

    if ($bannerID == 0)
        $sql = "SELECT * FROM messages WHERE  (sender=$MyPhone Or receiver=$MyPhone) and id IN (SELECT MAX(id) FROM messages GROUP BY bannerID ) ORDER by id DESC";
    else
        $sql = "select * from messages where (sender=$MyPhone Or receiver=$MyPhone) and bannerID=$bannerID ORDER by id ASC";

    echo json_encode($query->getMessages($sql));

} else {
    echo "null";
}


