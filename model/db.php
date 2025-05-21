<?php

    $host = "127.0.0.1";
    $dbname = "evenboodb";
    $dbuser = "root";
    $dbpass = "";

    function getConnection(){
        
        global $dbname;
        global $dbuser;
        global $dbpass;

        $con = mysqli_connect($GLOBALS['host'], $dbuser, $dbpass, $dbname);

        if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
        return $con;
    }
?>