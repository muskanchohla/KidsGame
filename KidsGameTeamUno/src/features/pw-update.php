<?php
require $_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php';

require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/src/features/uname_exist.php';
require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'db/update.php';
require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'src/signup-onkeyup/pcode1-ajax.php';
if(isset($_POST["Edit"])){

   
    $connection=ConnectDb();

    if($validUsername && $validPassowrd==true){

          $rOrder=GetRegistrationOrder($connection);


        $userName=$_POST["uName"]; 
        $password=$_POST["password"];

       $response = updatePassword($connection,$rOrder,$password);

        if($response){
    
            echo "<script>alert('Update successfully');</script>";
        }


    }


    DisconnectDB($connection);

}



?> 
 
