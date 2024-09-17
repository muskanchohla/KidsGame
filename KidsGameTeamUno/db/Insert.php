<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
require_once $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . "src/features/newUserClass.php";
require_once $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/Select.php';



function insertNewPlayer(NewUser $newUserN) {
    echo"<script>console.log('Insertion new player')</script>";
  //  include("../../src/features/newUserClass.php");
   // $newUser = new NewUser($username, $name, $lastName);
    $connectionDBB=ConnectDb();
    selectDb($connectionDBB);
    echo"<script>console.log('DB Selected')</script>";

    $sql="insert into player (fname, lName, userName ) values (?, ?, ?)";
    //prepare the query with the params 
    $statement = mysqli_prepare($connectionDBB,$sql);
    //bind the params sss means we are binding 3 strings

    mysqli_stmt_bind_param($statement,"sss",$newUserN->name,$newUserN->lastName,$newUserN->username);

    mysqli_stmt_execute($statement);


    if(mysqli_stmt_affected_rows($statement)>0){
        echo"<script>console.log('Insertion success')</script>";
    }else{
        echo"<script>console.log('something wrong with the insertion')</script>";
    }

    DisconnectDB($connectionDBB);

}


function insertPassword(NewUser $newUser){
    $connectionDBB=ConnectDb();
    
    $lastRNumber=GetLastRegistrationOrder($connectionDBB);
   
    selectDb($connectionDBB);
    //encrypt the password with the function hash method.
    $encryptedPassword=password_hash($newUser->password,PASSWORD_DEFAULT);
    $sql="INSERT INTO authenticator (passCode,registrationOrder) values ('$encryptedPassword',$lastRNumber)";


    $sql_Insert=$connectionDBB->query($sql);

    if($sql_Insert==false)
    echo "something went wrong insertion failed";

}


//Insert Score of DB

function insertScore($result,$lives,$userid) {
    $connectionDBB=ConnectDb();
    selectDb($connectionDBB);
    $sql="insert into score (scoreTime, result, livesUsed, registrationOrder) VALUES (now(), ?, ?, ?);";
    //prepare the query with the params 
    $statement = mysqli_prepare($connectionDBB,$sql);
    //echo $sql;
    //bind the params sss means we are binding 3 strings

    mysqli_stmt_bind_param($statement,"sii",$result,$lives,$userid);

    mysqli_stmt_execute($statement);

    DisconnectDB($connectionDBB);
    

}


?>
