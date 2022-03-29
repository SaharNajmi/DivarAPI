<?php
if (!empty($_GET) && $_GET['tell'] != "") {

    include 'query.php';
    $query = new query();

    $username = $_GET['tell'];
    $id = $query->getUserIdFromPhone($username);

    echo json_encode($id);
} else
    echo "please enter by application";
