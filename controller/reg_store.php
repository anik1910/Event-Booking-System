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
        $src = $_FILES['nid_file']['tmp_name'];
        $ext = explode('.', $_FILES['nid_file']['name']);
        $cut_email = explode('@', $email)[0];
        $des = '../asset/userNID/' . $cut_email . '.' . $ext[1];

        if (move_uploaded_file($src, $des))
        {
            //
        }

        header('location: ../View/User_Authentication_feature/login.html');
    }
    else
    {
        header('location: ../View/User_Authentication_feature/signup.php');
    }
}
?>
