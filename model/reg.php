<?php
require_once('db.php');

if(isset($_REQUEST['submit']))
{

    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']); 

    $con = getConnection();
    $sql = "insert into registration values(null, '{$email}', '$password')";
    if(mysqli_query($con, $sql))
    {
        header('location: ../View/User_Authentication_feature/login.html');
    }
    else
    {
        header('location: ../View/User_Authentication_feature/signup.html');
    }
}
?>
