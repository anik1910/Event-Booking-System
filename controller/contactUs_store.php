<?php
require_once('../model/db.php');
header('Content-Type: application/json');

session_start();
$con = getConnection();

// Get raw JSON from POST
if (isset($_POST['json'])) {
    $data = json_decode($_POST['json'], true);

    $cname = trim($data['cname'] ?? '');
    $cemail = trim($data['cemail'] ?? '');
    $cmessage = trim($data['cmessage'] ?? '');

    if ($cname === '' || $cemail === '' || $cmessage === '') {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    // Insert into DB
    $sql = "INSERT INTO contact_us (cname, cemail, cmessage) VALUES ('{$cname}', '{$cemail}', '{$cmessage}')";
    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error occurred."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No data received."]);
}
?>
