
<?php

$warn_msg = "";
$only_Letter_msg = "<div class='text-center'>The Last name must have only letters [a-z].";
$only_cLetter_msg = "<div class='text-center'>The Last Name Must start with capital letter";
$empty_msg ="<div class='text-center'>The Last name is empty";
global $validlName;
$validlName=true;
$lName = isset($_POST["lName"]) ? $_POST["lName"] : '';

if ($lName == '') {
    $validlName=false;
    echo $empty_msg;
} elseif (!preg_match('/^[a-zA-Z]+$/', $lName)) {
    $validlName=false;
    echo $only_Letter_msg;
}elseif(!preg_match('/^[A-Z]/', $lName)) {
    $validlName=false;
    echo $only_cLetter_msg;
}


?> 
