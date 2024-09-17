<?php
require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
if (isset($_POST["register"])) {

   // require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/src/features/checkForm.php';



    
    //require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'src/features/checkUsername.php';
    //if (isset($validEUsername))
   // if($validEUsername==false)
    //echo "<br>";
    require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'src/signup-onKeyup/uname-ajax.php';
    if($validUsername==false)
    echo "<br>";
    require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'src/signup-onKeyup/fname-ajax.php';
    if($validName==false)
    echo "<br>";
    require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'src/signup-onKeyup/lname-ajax.php';
    if($validlName==false)
    echo "<br>";
    
    require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'src/signup-onKeyup/pcode1-ajax.php';
   if($password==false)
   echo "<br>";

//if all the validation are correct the variable keep being true and it able to go to the next page
if (isset($validEUsername))
    if($validEUsername==true && $validUsername==true && $validName==true && $validlName==true && $validPassowrd==true) {
        require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . "src/features/newUserClass.php";
        $userName=$_POST["uName"];        
        $fName=$_POST["fName"];        
        $lName=$_POST["lName"];       
        $password=$_POST["password"];
        echo $userName;   
        $newUserN = new NewUser($userName, $fName, $lName,$password);

        require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'db/Insert.php';
        insertNewPlayer($newUserN);
        insertPassword($newUserN);
        // Mensaje que deseas mostrar al usuario
    $message = "Thanks for logging up. You are going to the Login Page";
    
        // Redirige al usuario a otra página después de cierto tiempo

    echo"<script>alert('$message'); window.location.href = ' ". ROOT_PATH  ."public/form/signin-form.php';</script>";

    
    } 

}