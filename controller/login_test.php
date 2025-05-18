<?php
session_start();

if (isset($_REQUEST['submit'])) {
    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);

    if ($email === "" || $password === "") {
        header("Location: ../View/User_Authentication_feature/login.html");
        exit();
    }

    if ($email === $password) {
        $_SESSION['status'] = true;

        if (isset($_REQUEST['remember'])) {

            setcookie('status', 'true', time() + 5000, '/');
        }

        header('Location: ../View/Event_Calendar_feature/Event_Calendar_feature.php');
        exit();
    } else {

        header("Location: ../View/User_Authentication_feature/login.html");
        exit();
    }
} else {
    // echo "Invalid request. Please submit the form first.";
}
?>
