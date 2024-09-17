<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');   ?>
<!DOCTYPE html>

<html lang="en">
  <!-- JOSE USA ESTA PAGINA COMO EJEMPLO -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/head.php'; ?>
<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/header.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/nav.php'; ?>


    <div class="container">

      <div class="row justify-content-center align-items-center"> <!-- Modificado para centrar horizontal y verticalmente -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-body text-center"> <!-- Añadida la clase text-center para centrar el contenido -->
              <h5 class="card-title">Signin</h5>

                <!--Form-->
                <form id="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                  <!--Form fields to input data-->
                  <label for="inputName">UserName</label>
                  <input id="uName" type="text" name="uName" placeholder="JohnDoe" onkeyup=""  value="<?php  if(isset($_POST["login"])) $uName=$_POST["uName"];  if(isset($uName)) echo $uName ?>">
                  <span id="uNameMessage"></span><span id="uNameMessage2"></span>


                  <label for="password">Password</label><br>
                  <input id="password" type="password" name="password" placeholder="Password"  onkeyup=""  ><br>
                  <span id="passwordMessage"></span><br>




                  <!--Submit button to send form data-->
                  <input id="btnlogin"  type="submit" name="login" value="Login" />
                  <input id="btnregister" type="submit" name="register" value="Register" />
                  <br>
                  <a id="signinForgotPwd" href="pw-update-form.php">Forgot Password?</a>


                </form>
                <div class="text-center">
                  <p>If you don't have a user created, please click on the <strong>Register</strong> button.</p>
                </div>
            </div>
          </div>
          <!-- Other game levels go here -->
        </div>
      </div>
    </div>
    <?php
    /* JOSE PORFA PON LAS RUTAS OCUPANDO LAS VARIABLES  */
    require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH .  'db/Database.php';

    require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . "src/features/signin.php";
    //checkUserExist(ConnectDb());
    if(isset($_POST["register"])) {
      echo "<script>window.location.href='" . ROOT_PATH . "public/form/signup-form.php'</script>";
    }

    ?> 


    <?php require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/footer.php'; ?>
  </body>
</html>




