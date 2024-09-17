<?php

require $_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php';

require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'db/Database.php';

$connection= ConnectDb();



function getResult($connection){
selectDb($connection);

$conn=$connection;

$query = "SELECT player.registrationOrder, player.fName,player.lName,score.result,score.livesUsed,score.scoreTime from player inner Join score  on player.registrationOrder=score.registrationOrder";

$queryResult=$conn->query($query);

if($queryResult->num_rows<=0){
    echo "Data not found";

}else{
    $results = array(); // Array para almacenar los resultados
    
    while ($data = $queryResult->fetch_assoc()) {
        // Almacena cada fila de datos en el array $results
        $result = array(
            "registrationOrder" => $data["registrationOrder"],
            "fName" => $data["fName"],
            "lName" => $data["lName"],
            "result" => $data["result"],
            "livesUsed" => $data["livesUsed"],
            "scoreTime" => $data["scoreTime"]
        );
        
        // Agrega el resultado al array de resultados
     
        $results[] = $result;
  
}

return $results ;


}

return null;


}


DisconnectDB($connection);


?>
