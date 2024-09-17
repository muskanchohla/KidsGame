 
 
<?php 
        if (session_status() == PHP_SESSION_ACTIVE) {
            echo "Session is already started.";
        } else {
            session_start();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        //echo $_SERVER['DOCUMENT_ROOT'] . '/dw3/finalproject/config.php';
        require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
        //echo ROOT_PATH . 'public/template/head.php';
        //require_once ROOT_PATH . 'public/template/head.php' 
        require $_SERVER['DOCUMENT_ROOT'] .  ROOT_PATH . '/public/template/head.php'
        ?>
    
    ?>
    
</head>
<body class="introduction">            
    <div id="messagesdiv">
        <br/>
        Y O U &emsp; W I N!
        <br/>
        YOU HAVE COMPLETING SUCCESFULLY THE SIX GAMES!
    </div>
    
    <div id="optionsdiv">
        <button  id="btnHome"> Go Home </button>
        <button  id="btnTryAgain"> Try Again!</button>
        <button  id="btnHistory"> History Results</button>
    </div> 
    <script>
        //Variable for userid and game
        sitename = "kidsgameteamuno"
        // Get references to the buttons
        var btnHome = document.getElementById('btnHome');
        //var btnTryAgain = document.getElementById('btnTryAgain');
        //var btnHistory = document.getElementById('btnHistory');

        // Add event listeners to the buttons
        btnHome.addEventListener('click', function() {
            // Redirect the parent window to the continue page
            console.log("entra a Home");
            // Close the popup
            window.opener.location.href =  '/'+ sitename + '/index.php';
            window.close();
        });

        btnTryAgain.addEventListener('click', function() {
            // Redirect the parent window to the save page
            window.opener.location.href =  '/'+ sitename + '/public/form/game-form.php';
            // Close the popup
            window.close();
        });

        btnHistory.addEventListener('click', function() {
            // Redirect the parent window to the save page
            window.opener.location.href =  '/'+ sitename + '/public/message/history-table.php';
            // Close the popup
            window.close();
        });
    
    </script>   
</body>
</html>
