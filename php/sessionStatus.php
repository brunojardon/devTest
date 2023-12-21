<?php session_start();

$response = array('name' => $_SESSION['name'], 'lastname' => $_SESSION['lastname'], 'email' => $_SESSION['email'], 'category' => $_SESSION['category']);

header('Content-Type: application/json');
echo json_encode($response);