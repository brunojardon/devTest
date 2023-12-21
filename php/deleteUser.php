<?php include("./conn.php");

if (!empty($_POST["userID"])) {
    $userID = $_POST["userID"];
    $result = mysqli_query($conn, "DELETE FROM users WHERE userID = '$userID'");
    if(!$result){
        echo "Fallo al eliminar el usuario";
    }else{
        echo "Usuario eliminado";
    }
} else {
    echo "Falta el ID de usuario";
}