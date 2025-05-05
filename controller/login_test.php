<?php
    session_start();
    
    if(isset($_REQUEST['log-btn'])){
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if($email == "" || $password == ""){
            // echo "Null username/password!";
        }else if($email == $password){
            //echo "valid user!";
            $_SESSION['status'] = true;
            header('location: ');
        }else{
            echo "invalid user!";
        }
    }else{
        //echo "invalid request! please submit the form frist!";
        header('location: form.html');
    }

?>