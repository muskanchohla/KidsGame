<?php
//connection with db info 





 $hostName="localhost";
 $userName="root";
 $password="";

// Función para conectar con la base de datos
function ConnectWithDb() {
    $hostName="localhost";
    $userName="root";
    $password="";


    try {
        $connection = new mysqli($hostName, $userName, $password);
        
        return $connection;
    } catch (mysqli_sql_exception $error) {
        // Si la conexión falla, muestra el mensaje de error y detiene el script
        die("Connection to MySQL failed! <br>" . $error);
    }
}




$bdName="kidsgames";
// Conectar a la base de datos
$connectionDb = ConnectWithDb();



function checkIfDbExists($connection, $dbName) {
    $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        // La base de datos existe
        return true;
    } else {
        createDB($connection);
        return false;
    }
    DisconnectDB($connection);
}


// Función para crear la estructura de la base de datos si aún no existe
function createDB($connection) {
    try {
        $connection->multi_query(file_get_contents("../../db/database-entity.sql"));
        echo "Creation success.";
        
    } catch (mysqli_sql_exception $error) {
        // Si la creación falla, muestra el mensaje de error y detiene el script
       // die("Creation of Database and Tables failed! <br>" . $error);
    }
    DisconnectDB($connection);
}
/*

// Función para desconectar de la base de datos
function DisconnectDB($connection) {
    try {
        $connection->close();
    } catch (mysqli_sql_exception $error) {
        die("Disconnection from MySQL failed!<br/>" . $error);
    }
}
*/


//check if the db exists
checkIfDbExists($connectionDb,$bdName);




DisconnectDB($connectionDb);
?>
