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
            echo "<script>alert('It is needed to do the login');</script>";
            $host = $_SERVER['HTTP_HOST'];
            echo $host;
            // Redirect to the new URL
            
            header("Location: http://$host". ROOT_PATH);
           
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
    <?php 

    require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/head.php'
    ?>
<body class="introduction">

    <?php 
    ?> 
    <?php  require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/src/features/game.php'?> 
   
<nav class="navlives">
    <ul class="menu-lives">
        <li class="lititle" id="Lives">Lives:</li>
        <li id="live6">6</li>
        <li id="live5">5</li>
        <li id="live4">4</li>
        <li id="live3">3</li>
        <li id="live2">2</li>
        <li id="live1">1</li>
    </ul>
</nav>


    
    <!-- Your main content goes here -->
         <!-- Form 1 -->
         
        

            <section class="test-section">
                <div class="dragndrop">
                    <div id="topdiv">
                        <button id ="btnStopGame" onclick="submitForm()">Stop Game</button>
                        <label id="lblGame"></label>
                        <button id="btnValidate" onclick="Validate(<?php echo $_SESSION['game']; ?>)"> Validate</button>

                        
                    </div>   



                    <form name="gameform" action="" method="post">
                        <div id="left" title="0" draggable="true">
                            <div class="list" draggable="true" id="divA">
                                <p id="FP1" class="pform"></p>
                            </div>
                                
                            <div class="list" draggable="true" id="divB">
                                <p id="FP2" class="pform"></p>
                            </div>
                            <div class="list" draggable="true" id="divC">
                                <p id="FP3" class="pform"></p>
                            </div>
                            <div class="list" draggable="true" id="divD">
                                <p id="FP4" class="pform"></p>
                            </div>
                            <div class="list" draggable="true" id="divE">
                                <p id="FP5" class="pform"></p>
                            </div>
                            <div class="list" draggable="true" id="divF">
                                <p id="FP6" class="pform" ></p>
                            </div>
                        </div>
                        <div class="containerquestionnaire">
                            <div id="one" title="1"></div>
                            <div id="two" title="2"></div>
                            <div id="three" title="3"></div>
                            <div id="four" title="4"></div>
                            <div id="five" title="5"></div>
                            <div id="six" title="6"></div>
                        </div>
                    </form>
                </div>

                <script>
                    DragDrop();
                </script>

            </section>
       <br>
       
       
   
    <?php require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'public/template/footer.php' ?>
</body>
</html>
