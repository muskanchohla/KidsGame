
<?php

require_once '../../db/Select.php';

$warn_msg = "";

$empty_msg ="<div class='text-center'>The username is empty";

global $validUsername;
$validUsername=true;

$uName = isset($_POST["uName"]) ? $_POST["uName"] : '';



$connection=ConnectDb();

if($uName == '') {
    echo $empty_msg;
    $validUsername=false;
} 
//check if the username  exist.

$result= GetUserId($connection,$uName);

if($result=null){
    echo "This user does not exist";
    $validUsername=false;
}

DisconnectDB($connection);

?> 
