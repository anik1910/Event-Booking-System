<?php

require_once('db.php');

function login($user)
{
    $con = getConnection();
    $sql = "select * from registration where email='{$user['email']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        return true;
    }
    else
    {
        return false;
    }

}

?>