<?php


require_once "../../login.php";

//conection with the DB
function ConnectDb(){

try {
    $connection = new mysqli(hostname:HOSTNAME, username:USERNAME, password:PASSWORD);
    echo"conexion success";
} catch (mysqli_sql_exception $error) {
    //If the connection failed, display error message and stop the script
    die("Connection to MySQL failed! <br>" . $error);
}

return $connection;

}


//call the function
$connectionDb=ConnectDb();

//2-CREATE THE DATABASE STRUCTURE IF IT DOESN'T EXIST YET

function createDBIfNotExits($connectionDb){
    try {
       // $createStructure = $connectionDb->multi_query(file_get_contents("kidsGames.sql"));

        $connectionDb->multi_query(file_get_contents("../../db/database-entity.sql"));
        echo "creation or connection success";

    } catch (mysqli_sql_exception $error) {
        //If the creation failed, display error message and stop the script
        die("Creation of Database and Tables failed! <br>" . $error);
    }

}

createDBIfNotExits($connectionDb);

?> 
