
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
$warn_msg = "";
$start_Letter_msg = "<div class='text-center'>The username must start with Capital letter .";
$max_lenght = "<div class='text-center'>Username must contain at least 8 characters";
$empty_msg ="<div class='text-center'>The username is empty";
global $validUsername;
$validUsername=true;

$uName = isset($_POST["uName"]) ? $_POST["uName"] : '';



if ($uName == '') {
    echo $empty_msg;
    $validUsername=false;
} elseif (!preg_match('/^[A-Z]/', $uName)) {
    echo $start_Letter_msg;
    $validUsername=false;
} elseif (strlen($uName) < 8 ) {
    $validUsername=false;
    echo $max_lenght;
}
//check if the username already exist.
require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . "src/features/checkUsername.php";
//include("../../src/features/checkUsername.php");

?> 
