 
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php';

require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/src/functions/game-functions.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['game'])) {
        // Check which PHP function to call based on the value of the function parameter
        if ($_POST['game'] == 'validateGame') {
            // Call the PHP function with parameters
            //echo $_SESSION['game'];
            validateGame($_POST['param1'], $_POST['param2'], $_POST['param3'], $_POST['param4'], $_POST['param5'], $_POST['param6']);
        }
    }
    elseif (isset($_POST['stop'])) {
        if ($_POST['stop'] == 'stopGame') {
            //call the method for cancel game
            stopGame();
        }
    }
}
else 
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } 

    if (isset($_SESSION['game']) && !empty($_SESSION['game'])) {
        // The session variable exists and is not empty
        setGame( $_SESSION['game']);
    } else {
        // The session variable either doesn't exist or is empty
        //redirect to home
        $host = $_SERVER['HTTP_HOST'];
        echo $host;
        // Redirect to the new URL
        header("Location: http://$host". ROOT_PATH);
        //header("Location: http://localhost/dw3/finalproject/index.php");
        exit();
    }
   
    //CHANGE STYLES FOR LIVES
    $lives = "";
    for ($i =1; $i <= 6; $i ++)
    {
        $lives = $lives . "liv$i = document.getElementById('live$i');";
        if ($i == $_SESSION['lives']) // CURRENT LIFE
            $lives = $lives . "liv$i.classList.add('licurrent');";
        elseif ($i < $_SESSION['lives']  )
            $lives = $lives . "liv$i.classList.add('linext');";
        elseif ($i > $_SESSION['lives'])
            $lives = $lives . "liv$i.classList.add('lidead');";


    }

    $divGames = "";

    if ($_SESSION['game'] > 4)
    {
        $divGames = "
            div3 = document.getElementById('three');
            div3.style.display = 'none';
            div4 = document.getElementById('four');
            div4.style.display = 'none';
            div5 = document.getElementById('five');
            div5.style.display = 'none';
            div6 = document.getElementById('six');
            div6.style.display = 'none';
       ";
    }

    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    ". $divGames . " " . $lives . "   

     
    });
    </script> ";


}


