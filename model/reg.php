<?php
require_once('db.php');

if (isset($_POST['sign-btn'])) {
    $con = getConnection();

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic validation (optional but recommended)
    if (empty($fname) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Prepare statement using MySQLi
    $sql="INSERT INTO registration (fname, email, password) VALUES ('$fname', '$email', '$password')";
    $result=mysqli_query($con,$sql);
    print_r($result);
    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: ";
    }

    $con->close();
}
?>
