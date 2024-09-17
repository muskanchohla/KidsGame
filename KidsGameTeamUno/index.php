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
<?php require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');   ?>

<!DOCTYPE html>
<html lang="en">

    <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/head.php'; ?>

  <body>
  <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/header.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/nav.php'; ?>
  <div class="container" >
     <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body" >
            <h5 class="card-title">Welcome to Kids Games. Do you want to start the adventure?</h5>
            <?php 
            if ($login == 1){
                echo '<p class="card-text">Click to start</p>
                <a class="nav-link" href="'. ROOT_PATH .'public/form/game-form.php">
                  <button >Start</button>
                </a>';
            }
            else{
                echo '<p class="card-text">Login is needed</p>
                <a class="nav-link" href="'. ROOT_PATH .'public/form/signin-form.php">
                  <button >Login</button>
                </a>';
            }
            ?>
            <!-- <p class="card-text">Click to start</p>
            <a class="nav-link" href="<?php echo ROOT_PATH; ?>public/form/game-form.php" style="font-size: 18px;">|
              <button >Start</button>
            </a>-->
          </div>
        </div>
      </div>
    </div>
  </div> 
  <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . '/public/template/footer.php'; ?>
  <?php require_once ($_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'db/create.php');?>
  </body>
</html>
