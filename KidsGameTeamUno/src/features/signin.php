<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');

//include ("../../db/Select.php");
require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH .  'db/select.php';
$connectionToDb = ConnectDb();
if ($connectionToDb) {
    if (isset($_POST["login"])) {
    $result = checkPassword($connectionToDb, GetRegistrationOrder($connectionToDb));

    if($result["success"]){
            
            $username = $_POST["uName"];
            $id=GetUserId($connectionToDb,$username);
            print($id);
           
            if (session_status() != PHP_SESSION_ACTIVE)
                session_start();

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $id;
            $_SESSION['game'] = 1 ; 
            $_SESSION['lives'] = 6;
        
            //echo "Authentication success";

       

        echo "<script>alert('Login successful. You are being redirected to the Home page'); window.location.href = '" . ROOT_PATH . "/index.php';</script>";
    }else if($result["invalidPassword"]){
     
        echo "<div class='text-center'>Password incorrect. Try again";
    }elseif($result["userNotFound"]){

       

            echo "<div class='text-center'>User not found"; // Mensaje adicional si el usuario no existe
        
        
    
    }
    }

    DisconnectDB($connectionToDb);
}



include("timeOut.php");

timeOut();










?>