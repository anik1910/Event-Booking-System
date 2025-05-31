<?php
session_start();
require_once('../model/db.php');
$con = getConnection();

if (!isset($_SESSION['email'])) {
    echo "Unauthorized access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['email'];
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $uaddress = $_POST['uaddress'];
    $upassword = $_POST['upassword'];

    $pmq = "UPDATE profilemanagement SET fullname = '$fullname', phonenumber = '$phonenumber', uaddress = '$uaddress', upassword = '$upassword' WHERE email = '$email'";
    $rq = "UPDATE registration SET fname = '$fullname', password = '$upassword' WHERE email = '$email'";

    $updateSuccess = mysqli_query($con, $pmq);
    $updateRSuccess = mysqli_query($con, $rq);

    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] === 0) {
        $src = $_FILES['myfile']['tmp_name'];
        $ext = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $cut_email = explode('@', $email)[0];
        $des = '../asset/userimage/' . $cut_email . '.' . $ext;

        if (!move_uploaded_file($src, $des)) {
            echo "Image upload failed.";
        }
    }

    if ($updateSuccess) {
        if ($updateRSuccess) {
            $_SESSION['update_success'] = "Profile updated successfully!";
            header("Location: ../View/Profile_Management_feature/profilemanagement.php");
            exit();
        }
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>