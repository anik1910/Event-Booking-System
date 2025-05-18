<?php

    session_start();
    session_destroy();
    //setcookie('status', 'true', time()-10, '/');
    header('location: ../View/User_Authentication_feature/login.html');

?>