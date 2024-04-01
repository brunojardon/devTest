<?php session_start();
if(!empty($_SESSION['name'])){
    $response = array('name' => $_SESSION['name'], 'lastname' => $_SESSION['lastname'], 'email' => $_SESSION['email'], 'category' => $_SESSION['category']);
} else {
    $response = array('name' => '', 'lastname' => '', 'email' => '', 'category' => '');
}

header('Content-Type: application/json');
echo json_encode($response);