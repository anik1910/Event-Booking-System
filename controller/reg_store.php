<?php
//require_once('db.php');
session_start();
//$con = getConnection();
$con = mysqli_connect('127.0.0.1', 'root', '', 'evenboodb');

if(isset($_REQUEST['submit']))
{
    $fname = trim($_REQUEST['fname']); 
    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']); 

    $check_duplicate = "select * from registration where email='$email'";
    $check_result = mysqli_query($con, $check_duplicate);

    if(mysqli_num_rows($check_result) > 0)
    {
        $_SESSION['email_error'] = "This email is already registered";
        header('location: ../View/User_Authentication_feature/signup.php');
        exit();
    }

    $sql = "insert into registration(fname, email, password) values('{$fname}', '{$email}', '{$password}')";
    if(mysqli_query($con, $sql))
    {
        header('location: ../View/User_Authentication_feature/login.html');
    }
    else
    {
        header('location: ../View/User_Authentication_feature/signup.php');
    }
}
?>
