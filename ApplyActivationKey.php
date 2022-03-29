<?php

include "query.php";
$query = new query();

$mobile = $_POST['mobile'];
$activation_key = $_POST['activation_key'];

if ($mobile != "" && $activation_key != "") {
    $loginState = $query->login($mobile, $activation_key);

    echo json_encode($loginState);

} else
    echo "empty";



