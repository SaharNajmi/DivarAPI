<?php
if (!empty($_GET) && !empty($_GET['id'])) {
    include 'query.php';
    $query = new query();

    $id = $_GET['id'];

    $del = $query->deleteBanner($id);
    echo json_encode($del);
} else
    echo "please enter by application";
