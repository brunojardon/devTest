<?php include("./conn.php");
$response = array();

if (!empty($_POST["userID"])) {
    $userID = $_POST["userID"];
    if (!empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["age"]) && !empty($_POST["category"])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $category = $_POST['category'];
        
        if (empty($_POST["password"]) && empty($_POST["reppassword"])) {
            $query = mysqli_query($conn, "UPDATE users SET name = '$name', lastname = '$lastname', email = '$email', age = '$age', category = '$category' WHERE userID = '$userID'");
            if ($query) {
                $response["status"] = "success";
                $response["message"] = "Los datos fueron editados con exito.";
            } else {
                $response["status"] = "error";
                $response["message"] = "Fallo al hacer la query";
            }
            
        } else {
            $password = $_POST['password'];
            $reppassword = $_POST['reppassword'];
            
            if ($password == $reppassword) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = mysqli_query($conn, "UPDATE users SET name = '$name', lastname = '$lastname', password = '$password', email = '$email', age = '$age', category = '$category' WHERE userID = '$userID'");
                if ($query) {
                    $response["status"] = "success";
                    $response["message"] = "Los datos fueron editados con exito.";
                } else {
                    $response["status"] = "error";
                    $response["message"] = "Fallo al hacer la query";
                }
            } else {
                $response["status"] = "error";
                $response["message"] = "Las contrasenas no coinciden.";
            }
        }

    } else {
        $response["status"] = "error";
        $response["message"] = "Hay campos sin completar.";
    }
} else {
    $response["status"] = "error";
    $response["message"] = "Falta el userID";
}

header('Content-Type: application/json');
echo json_encode($response);