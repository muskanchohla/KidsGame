<?php
require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'db/Insert.php';
// Here we generate the random numbers allways six
function generateUniqueRandomNumbers($min, $max, $count) {
    $numbers = array();
    $range = $max - $min + 1;
    
    // Check if count of numbers to generate is larger than the range
    if ($count > $range) {
        return false;
    }

    while (count($numbers) < $count) {
        $randomNumber = mt_rand($min, $max);
        if (!in_array($randomNumber, $numbers)) {
            $numbers[] = $randomNumber;
        }
    }

    return $numbers;
}


//Here we gerate the six ramdom letters

function generateUniqueRandomLetters($count) {
    $letters = array();
    $range = range('A', 'Z');

    // Check if count of letters to generate is larger than the range
    if ($count > count($range)) {
        return false;
    }

    while (count($letters) < $count) {
        $randomLetter = $range[array_rand($range)];
        if (!in_array($randomLetter, $letters)) {
            $letters[] = $randomLetter;
        }
    }

    return $letters;
}

function setGame($game)
{
    //echo "Entra a set game";
    $gameDesc = "";
    switch ($game)
    {
        case 1:
            $gameDesc ="Game Level 1: Order 6 letters in ascending order";
            break;
        case 2:
            $gameDesc ="Game Level 2: Order 6 letters in descending order";
            break;
        case 3:
            $gameDesc ="Game Level 3: Order 6 numbers in ascending order";
            break;
        case 4:
            $gameDesc ="Game Level 4: Order 6 numbers in descending order";
            break;
        case 5:
            $gameDesc ="Game Level 5: Identify the first (smallest) and last letter (largest) in a set of 6 letters";
            break;
        case 6:
            $gameDesc ="Game Level 6: Identify the smallest and the largest number in a set of 6 numbers";
            break;
    }
    $miScript ="
    <script>
        document.addEventListener('DOMContentLoaded', function() { 
            document.getElementById('lblGame').innerText = '$gameDesc';
        });
    </script> ";
    echo $miScript;

        gameGenerateValues($game);
             
}




// this function was created based on the game will generate numbers or letters
function gameGenerateValues($game)
{
    $values = array();
    if($game == 1 or $game == 2 or $game == 5)
    {
        //get letters 
        $values =generateUniqueRandomLetters(6);
    }
    elseif($game == 3 or $game == 4 or $game == 6)
    {
        $values = generateUniqueRandomNumbers(0,100,6);
    }

    $miScript ="";
    $i = 1;


    $miScript ="
    <script>
    document.addEventListener('DOMContentLoaded', function() { ";
        
    foreach ($values as $value) {
        //echo "document.getElementById('F" . $game . "P". $i ."').innerText = '$value';";
        $miScript = $miScript . "document.getElementById('FP". $i ."').innerText = '$value';";
        //$miScript = $miScript .  "document.getElementById('FP". $i ."_hidden').value = '$value';";
        $i++;
    }

    $miScript = $miScript .  "});
    </script> ";
    
    echo $miScript;

}

function validateGame($param1, $param2, $param3, $param4, $param5, $param6) {
    
    //echo "entra a validate game ";
    /*echo $param1;
    echo $param2;
    echo $param3;
    echo $param4;
    echo $param5;
    echo $param6;*/

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } 
   
    $game = $_SESSION['game'];

    //echo $game;

    $ga = [];
    
    if($game == 1 or $game == 2 or $game == 5)
    {
        //get letters
        $ga[] = $param1;
        $ga[] = $param2;
        $ga[] = $param3;
        $ga[] = $param4;
        $ga[] = $param5;
        $ga[] = $param6;
        
    }
    elseif($game == 3 or $game == 4 or $game == 6)
    {
        //numbers
        $ga[] = intval($param1);
        $ga[] = intval($param2);
        $ga[] = intval($param3);
        $ga[] = intval($param4);
        $ga[] = intval($param5);
        $ga[] = intval($param6);
    }

    //To display the message of your values and our values
    if ($game < 5)
    {
        $uservalues = "Your values: " . $param1 . ", " . $param2. ", " . $param3. ", " . $param4. ", " . $param5. ", " . $param6 ;
    }
    else
    {
        $uservalues = "Your values: Min " . $param1 . ", Max " . $param2;
    }

    switch ($game)
    {
        case 1:
            //$gameDesc ="Game Level 1: Order 6 letters in ascending order";
            sort($ga);
            if ($ga[0] == $param1 && $ga[1] == $param2 && $ga[2] == $param3 && $ga[3] == $param4 && $ga[4] == $param5 && $ga[5] == $param6 )
            {
                echo " |next";
                updateGameLevel();
            }
            else
                updateLives();
            $correctValues = implode(", ", $ga);
            break;
        case 2:
            //$gameDesc ="Game Level 2: Order 6 letters in descending order";
            rsort($ga);
            if ($ga[0] == $param1 && $ga[1] == $param2 && $ga[2] == $param3 && $ga[3] == $param4 && $ga[4] == $param5 && $ga[5] == $param6 )
            {
                echo " |next";
                updateGameLevel();
            }
            else
                updateLives();
            $correctValues = implode(", ", $ga);
            break;
        case 3:
            //$gameDesc ="Game Level 3: Order 6 numbers in ascending order";
            sort($ga);
            if ($ga[0] == intval($param1) && $ga[1] == intval($param2) && $ga[2] == intval($param3) && $ga[3] == intval($param4) && $ga[4] == intval($param5) && $ga[5] == intval($param6) )
            {
                echo " |next";
                updateGameLevel();
            }
            else
                updateLives();
            $correctValues = implode(", ", $ga);
            break;
        case 4:
            //$gameDesc ="Game Level 4: Order 6 numbers in descending order";
            rsort($ga);
            if ($ga[0] == intval($param1) && $ga[1] == intval($param2) && $ga[2] == intval($param3) && $ga[3] == intval($param4) && $ga[4] == intval($param5) && $ga[5] == intval($param6) )
            {
                echo " |next";
                updateGameLevel();
            }
            else
                updateLives();
            $correctValues = implode(", ", $ga);
            break;
        case 5:
            //$gameDesc ="Game Level 5: Identify the first (smallest) and last letter (largest) in a set of 6 letters";
            $minValue = min($ga);
            $maxValue = max($ga);
            if ($minValue == $param1 && $maxValue == $param2)
            {
                echo " |next";
                updateGameLevel();
            }
            else
                updateLives();
            $correctValues =  "Min " . $minValue . ", Max " . $maxValue;
            break;
        case 6:
            //$gameDesc ="Game Level 6: Identify the smallest and the largest number in a set of 6 numbers";
            $minValue = min($ga);
            $maxValue = max($ga);
            if ($minValue == intval($param1) && $maxValue == intval($param2))
            {
                echo " |winner";
                insertScore("win",6 - intval($_SESSION['lives']), $_SESSION['user_id']);
                $_SESSION['lives'] = 6;
                $_SESSION['game'] = 1;
            }
            else
                updateLives();
            $correctValues =  "Min " . $minValue . ", Max " . $maxValue;
            break;
    }
    
    echo"|Correct Values : " . $correctValues . "|" . $uservalues ;
}

function updateLives()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } 

    if ($_SESSION['lives'] == 1)
    {
        echo " |gameover";
        insertScore("gameover",6, $_SESSION['user_id']);
        $_SESSION['lives'] = 6;
        $_SESSION['game'] = 1;
    }
    else
    {
        $_SESSION['lives'] = $_SESSION['lives'] - 1;
        echo " |fail";
    }

    
}
function updateGameLevel()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } 
    $_SESSION['game'] = $_SESSION['game'] + 1;
    
}

function stopGame()
{
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } 
    //retrieve session variables 
    insertScore("incomplete", 6 - intval($_SESSION['lives']), $_SESSION['user_id']);
    //insertScore("incomplete",6,4);
    $_SESSION['lives'] = 6;
    $_SESSION['game'] = 1;
    echo " |Stopped";

}

