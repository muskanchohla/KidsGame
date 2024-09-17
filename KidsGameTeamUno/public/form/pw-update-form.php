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
          <h5 class="card-title">Update Password</h5>




<!-- call my js files -->
<script src="<?php echo ROOT_PATH; ?>public/assets/js/signup-onkeyup/uname-exist-ajax.js"></script>
<script src="<?php echo ROOT_PATH; ?>public/assets/js/signup-onkeyup/pcode1-ajax.js"></script>



<!--Form-->
<form id="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
  <!--Form fields to input data-->


 
  <label for="inputName">UserName</label>
  <input id="uName" type="text" name="uName" placeholder="JohnDoe" onkeyup="ExistUserName()" value="<?php  if(isset($_POST["Edit"])) $uName=$_POST["uName"];  if(isset($uName)) echo $uName ?>"><br>  
  <span id="uNameMessage"></span><span id="uNameMessage2"></span>  <br>    

 
  <label for="password">New Password</label>
  <input id="password" type="password" name="password" placeholder="New Password"  onkeyup="ValidatePassword()"  > <br> 
  <span id="passwordMessage"></span><br>  
  <label for="password">Confirm Password</label>
  <input id="passwordC" type="password" name="passwordC" placeholder="Confirm Password" onkeyup="ValidatePassword()"   >  <br>  <br>
  <span id="cPasswordMessage"></span>  

  
  
  <!--Submit button to send form data-->
  <input id="register" type="submit" name="Edit" value="Edit" />
  <input id="login"  type="submit" name="Login" value="Login" />



</form>
</div>
      </div>
    </div>
    <!-- Other game levels go here -->
  </div>
</div>


</body>




<?php

//connection with the db  variable  to have the connectoin ($connection)

require_once $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/Database.php';

            
require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'src/features/checkForm.php';     
require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'src/features/pw-update.php';     
require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/create.php';


if(isset($_POST["Login"]))
  echo "<script>window.location.href='signin-form.php'</script>"

?>
<?php require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'public/template/footer.php' ?>
</head>

</html>


 
