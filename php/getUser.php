<?php include("./conn.php");
$response = array();

if (!empty($_POST["userID"])) {
    $userID = $_POST["userID"];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE userID = '$userID'");
    if (!$query) {
        $response["status"] = "error";
        $response["message"] = "Problemas al realizar la query.";
    } else {
        $json = array();
        while ($row = mysqli_fetch_array($query)) {
            $json[] = array(
                'userID' => $row['userID'],
                'name' => $row['name'],
                'lastname' => $row['lastname'],
                'password' => $row['password'],
                'email' => $row['email'],
                'age' => $row['age'],
                'category' => $row['category'],
            );
        }
        $jsonstr = json_encode($json[0]);
        echo $jsonstr;
    }
} else {
    $response["status"] = "error";
    $response["message"] = "No se recibío el userID.";
}

if ($response["status"] == "error") {
    echo json_encode($response);
}