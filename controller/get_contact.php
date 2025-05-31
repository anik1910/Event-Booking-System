<?php
require_once('../model/db.php');
$conn = getConnection();

header('Content-Type: application/json');

$email = isset($_POST['email']) ? $_POST['email'] : '';

$contacts = [];

if ($email !== '') {
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT cname, cemail, cmessage FROM contact_us WHERE cemail LIKE '%$email%'";
} else {
    $sql = "SELECT cname, cemail, cmessage FROM contact_us";
}

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contacts[] = $row;
    }
}

echo json_encode($contacts);
?>