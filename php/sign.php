<?php include './conn.php';
session_start();

$response = array();

if (!empty($_POST['name']) and !empty($_POST['lastname']) and !empty($_POST['password']) and !empty($_POST['reppassword']) and !empty($_POST['email']) and !empty($_POST['age']) and !empty($_POST['category'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $reppassword = $_POST['reppassword'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $category = $_POST['category'];

    if ($password == $reppassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "INSERT INTO users (name, lastname, password, email, age, category) VALUES ('$name', '$lastname', '$password','$email', '$age', '$category')");
        if (!$result) {
            $response["status"] = "error";
            $response["message"] = "Fallo al ingresar los datos.";
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['category'] = $category;
            $response['status'] = 'success';
            $response['message'] = 'Usuario registrado con exito.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Las contraseñas no coinciden.';
    }

} else {
    $response['status'] = 'error';
    $response['message'] = 'Rellene todos los campos.';
}

header('Content-Type: application/json');
echo json_encode($response);

