<?php
session_start();

require_once('../model/loginModel.php');

if (isset($_REQUEST['submit'])) {

    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);
    if ($email == 'admin@gmail.com' && $password == 'admin0') {
        $_SESSION['status'] = 'true';
        header('Location: ../View/Admin_Panel_feature/admin.php');
        exit();
    } else {
        $user = ['email' => $email, 'password' => $password];
        $status = login($user);
        if ($status) {
            $_SESSION['status'] = true;
            $_SESSION['email'] = $email;
            if (isset($_REQUEST['remember'])) {
                setcookie('status', 'true', time() + 5000, '/');
            }
            header('Location: ../View/Event_Calendar_feature/Event_Calendar_feature.php');
            exit();
        }
    }
}

?>