<?php
include "query.php";
$query = new query();
$phone = $_POST['mobile'];

if ($phone != "") {
    $sendState = $query->sendActivationKey($phone);
    echo json_encode($sendState);
} else
    echo "empty";


