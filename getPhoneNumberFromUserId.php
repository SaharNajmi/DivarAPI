<?php
if (!empty($_GET) && $_GET['userId'] != "") {

    include 'query.php';
    $query = new query();

    $userID = $_GET['userId'];
    $tell = $query->getPhoneNumberFromUserId($userID);
    echo json_encode($tell);
} else
    echo "please enter by application";
