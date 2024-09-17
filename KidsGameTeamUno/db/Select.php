<?php
require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
require_once $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/Database.php';

// Connection with the database
/*
function selectDb($connection) {
    try {
        mysqli_select_db($connection, "Kidsgames");
    } catch(mysqli_sql_exception $error) {
        echo $error;
    }
}*/

function GetRegistrationOrder($connection) {
  
        $username = $_POST["uName"];
        $password = $_POST["password"];
        
        selectDb($connection);
        
        $sql_query = "SELECT  registrationOrder FROM player WHERE username = '$username'";
        $queryRessult = $connection->query($sql_query);
        $rows = $queryRessult->num_rows;
        
        if ($rows > 0) {
            $result = $queryRessult->fetch_assoc();
            return $result["registrationOrder"];
        } else {
          
            return null; // Devolver null si el usuario no existe
        }
    
}


function GetLastRegistrationOrder($connection) {
  
   
    
    selectDb($connection);
    
    $sql_query = "SELECT registrationOrder FROM player ORDER BY registrationOrder DESC LIMIT 1";
    $queryRessult = $connection->query($sql_query);
    $rows = $queryRessult->num_rows;
    
    if ($rows > 0) {
        $result = $queryRessult->fetch_assoc();
        return $result["registrationOrder"];
    } else {
      
        return null; // Devolver null si el usuario no existe
    }

}


function GetUserId($connection,$username){

 $sql_query = "SELECT registrationorder from player where userName = '$username' ";


 selectDb($connection);


 $sqlResult=$connection->query($sql_query);
 $rows = $sqlResult->num_rows;

 if($rows>0){
    $result=$sqlResult->fetch_assoc();
    $id=$result["registrationorder"];
    return $id;
 }

 else{

    echo "<div class='text-center'>Username not found";
 }   

 return null;
}



$response = [
"userNotFound"=>false,
"success"=>false,
"invalidPassword"=>false



];
function checkPassword($connection, $registrationOrder) {
    global $response;

    if ($registrationOrder !== null) {
        if(isset($_POST["password"])){
            $password = $_POST["password"];
            $sql_query = "SELECT passCode FROM authenticator WHERE registrationOrder = $registrationOrder";
            $queryResult = $connection->query($sql_query);
            $result = $queryResult->fetch_assoc();
        
            if (password_verify($password, $result["passCode"])) {
                // Autenticación exitosa
                $response['success'] = true;
            } else {
                // Contraseña incorrecta
                $response['invalidPassword'] = true;
            }
        }
    } else {
        // Usuario no encontrado
        $response['userNotFound'] = true;
    }

    return $response;
}


?>
