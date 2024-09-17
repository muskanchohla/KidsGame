<?php

if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

$login = 0; // Inicialmente el usuario no está logueado

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  // La variable de sesión existe y no está vacía, entonces el usuario está logueado
  $login = 1;
}

?> 




<nav class="navbar" >
    <a class="logo"  href="<?php echo ROOT_PATH; ?>" >Kids Games</a>
  
    
      <ul class="menu-links">
      <span id="close-menu-btn" class="material-symbols-outlined">close</span>
        <li><a  href="<?php echo ROOT_PATH; ?>" >Home</a> </li>
        <li><a  href="<?php echo ROOT_PATH; ?>public/form/about-us.php">About Us</a> </li>
        <?php 
        if ($login == 1){
      
          echo '<li  >
          <a href="' . ROOT_PATH . 'public/form/game-form.php" ">Game</a>
          </li>';
          echo '<li >
          <a  href="' . ROOT_PATH . 'public/message/history-table.php" ">Results</a>
          </li>';
          echo '<li  >
          <a  href="' . ROOT_PATH . 'src/features/signout.php" ">Log out</a>
          </li>';
          echo '<li  >
          <a  href="#">User: '.  $_SESSION['username'] . '</a>
          </li>';
        }
        else 
        {
          echo '<li >
          <a  href="' . ROOT_PATH . 'public/form/signin-form.php" ">Log in</a>
          </li>';

        }
        ?>




      </ul>


</nav>
