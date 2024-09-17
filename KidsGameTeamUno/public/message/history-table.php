<?php 
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            $valid = true;
        } else {
            // The session variable either doesn't exist or is empty
            //redirect to home
            $host = $_SERVER['HTTP_HOST'];
            echo $host;
            // Redirect to the new URL
            header("Location: http://$host". ROOT_PATH);
            exit();
        }

        // Generamos datos aleatorios para la tabla
// Con 10 filas de datos

require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/src/features/history.php';


$conn=ConnectDb();

$queryResult=getResult($conn);
$resultados = [];
if(isset($queryResult))
foreach($queryResult as $value) {
   
   
    $resultados[] = [
        'id' => $value["registrationOrder"],
        'first_name' => $value["fName"] ,
        'last_name' => $value["lName"],
        'game_outcome' => $value["result"],
        'lives_used' => $value["livesUsed"],
        'end_date' => $value["scoreTime"],
    ];
}

?>


<?php require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');   ?>
<!DOCTYPE html>
<html lang="en">
    <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/head.php'; ?>
    <style>
        .result-section {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 80vh; /* Ajusta este valor según tus necesidades */
        }
        .scrollable {
            max-height: 380px;
            overflow-y: auto; /* Activa el desplazamiento vertical */
            overflow-x: auto; /* Agrega desplazamiento horizontal solo si es necesario */
        }
        .scrollable table {
            min-width: 100%; /* Asegura que la tabla tenga al menos el ancho del contenedor */
        }
    </style>
    <body>
        <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/header.php'; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/nav.php'; ?>
        <div class="container">
            <section class="result-section">
                <div class="containerresults scrollable">
                    <table id="myTable" border="1">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Outcome of the Game</th>
                            <th>Number of Lives Used</th>
                            <th>Date and Time</th>
                        </tr>
                        <?php foreach ($resultados as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td><?php echo $row['game_outcome']; ?></td>
                            <td><?php echo $row['lives_used']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div>
                    <button id="btnHome">Go Home</button>
                    <button id="btnTryAgain">Try Again!</button>
                </div>
                <script>
                    document.getElementById('btnHome').addEventListener('click', function() {
                        window.location.href = '/kidsgameteamuno/index.php';
                    });
                    document.getElementById('btnTryAgain').addEventListener('click', function() {
                        window.location.href = '/kidsgameteamuno/public/form/game-form.php';
                    });
                </script>
            </section>
        </div> 
        <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/footer.php'; ?>
    </body>
</html>








