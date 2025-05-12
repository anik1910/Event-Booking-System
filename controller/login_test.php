<?php
    session_start();
    
    if(isset($_REQUEST['submit'])){
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if($email == "" || $password == ""){
            echo "Null username/password!";
        }else if($email == $password){
            echo "valid user!";
            // $_SESSION['status'] = true;

            if (isset($_REQUEST['remember'])) 
            {
            setcookie('status', 'true', time() + 2, '/');
            }

            header('location: ../View/Ticket_Types_feature/ticket.php');
            exit();
        }else{
            // echo "invalid user!";
        }
    }else{
        echo "invalid request! please submit the form frist!";
        header('location: ../View/User_Authentication_feature/login.html');
    }

?>