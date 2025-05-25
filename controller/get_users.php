<?php
require_once('../model/db.php');
$conn = getConnection();

header('Content-Type: application/json');

$email = isset($_POST['email']) ? $_POST['email'] : '';

$users = [];

if ($email !== '') {
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT fullname, email, phonenumber, uaddress FROM profilemanagement WHERE email LIKE '%$email%'";
} else {
    $sql = "SELECT fullname, email, phonenumber, uaddress FROM profilemanagement";
}

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

echo json_encode($users);
?>