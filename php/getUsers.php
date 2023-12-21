<?php include('./conn.php');
$result = mysqli_query($conn, 'SELECT * FROM users');
if (!$result) {
    die('Error al realizar la peticion' . mysqli_error($conn));
} else {
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
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
    echo json_encode($json);
}