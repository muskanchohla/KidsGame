 <?php

$host = "localhost";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// 1.Create the Database | Créer la Base de données
if ($mysqli->connect_error) {
    die("Conexión Fail: " . $conn->connect_error);
}

// Comando SQL para crear la base de datos 'kidsGames'
$sql = "CREATE DATABASE IF NOT EXISTS kidsGames";

// Ejecutar el comando SQL
if ($mysqli->query($sql) === TRUE) {
    echo "";
} else {
    echo "something went wrong with the DB creation " . $conn->error;
}





$sqlScript = "USE kidsGames;
CREATE TABLE IF NOT EXISTS player( 
    fName VARCHAR(50) NOT NULL, 
    lName VARCHAR(50) NOT NULL, 
    userName VARCHAR(20) NOT NULL UNIQUE,
    registrationTime DATETIME NOT NULL,
    id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
    registrationOrder INTEGER AUTO_INCREMENT,
    PRIMARY KEY (registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE TABLE IF NOT EXISTS authenticator(   
    passCode VARCHAR(255) NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE TABLE IF NOT EXISTS score( 
    scoreTime DATETIME NOT NULL, 
    result ENUM('win', 'gameover', 'incomplete'),
    livesUsed INTEGER NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE VIEW history AS
SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
FROM player p, score s
WHERE p.registrationOrder = s.registrationOrder;
";

// Execute each SQL statement
if ($mysqli->multi_query($sqlScript)) {
    echo "";
} else {
    echo "Error creating database: " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>

