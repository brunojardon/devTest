<?php include('./conn.php');
session_start();

$response = array();

if (!empty($_POST['name']) and !empty($_POST['lastname']) and !empty($_POST['password'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, 'SELECT password FROM users WHERE name = "' . $name . '" AND lastname = "' . $lastname . '"');
    $row = mysqli_fetch_assoc($result);
    $hash = $row['password'];

    if (password_verify($password, $hash)) {
        $_SESSION['name'] = $name;
        $_SESSION['lastname'] = $lastname;

        $result = mysqli_query($conn, 'SELECT email FROM users WHERE name = \'' . $name . '\' AND lastname = \'' . $lastname . '\'');
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];

        $result = mysqli_query($conn, 'SELECT category FROM users WHERE name = \'' . $name . '\' AND lastname = \'' . $lastname . '\'');
        $row = mysqli_fetch_assoc($result);
        $_SESSION['category'] = $row['category'];

        $response['status'] = 'success';
        $response['message'] = 'Sesion iniciada con exito!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Las credenciales no son validas.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Rellene todos los campos.';
}

header('Content-Type: application/json');
echo json_encode($response);