
<!DOCTYPE html>
<html lang="en">
<?php 
    require($_SERVER['DOCUMENT_ROOT'] . '/kidsgameteamuno/config.php');
    require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/head.php'
    ?>
<script src="<?php echo ROOT_PATH; ?>public/assets/js/signup-onkeyup/fname-ajax.js"></script>
<script src="<?php echo ROOT_PATH; ?>public/assets/js/signup-onkeyup/lname-ajax.js"></script>
<script src="<?php echo ROOT_PATH; ?>public/assets/js/signup-onkeyup/uname-ajax.js"></script>
<script src="<?php echo ROOT_PATH; ?>public/assets/js/signup-onkeyup/pcode1-ajax.js"></script>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/nav.php'; ?>
<div class="container">
  <div class="row justify-content-center align-items-center"> <!-- Modificado para centrar horizontal y verticalmente -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body text-center"> <!-- Añadida la clase text-center para centrar el contenido -->
          <h5 class="card-title">Signup</h5>
              <form id="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                <!--Form fields to input data-->

                <label for="inputName">UserName</label>
                <input id="uName" type="text" name="uName" id="uName" placeholder="JohnDoe" onkeyup="ValidateUserName()"  value="<?php  if(isset($_POST["register"])) $uName=$_POST["uName"];  if(isset($uName)) echo $uName ?>"><br>  
                <span id="uNameMessage"><br></span><span id="uNameMessage2"></span>  <br>    

              
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Password"  onkeyup="ValidatePassword()"  > <br> 
                <span id="passwordMessage"></span><br>  
                <label for="password">Confirm Password</label>
                <input id="passwordC" type="password" name="passwordC" placeholder="Password"  onkeyup="ValidatePassword()"   >  <br>  
                <span id="cPasswordMessage"></span>  <br>  
              
                <label for="inputName">First Name</label>
                <input id="fName" type="text" name="fName" placeholder="John" onkeyup="ValidateFname()"  value="<?php if(isset($_POST["register"])) $fName = $_POST["fName"]; if(isset($fName)) echo $fName  ?>"><br>  
                <span id="fNameMessage"></span>  <br>  
                <br>  
                <label for="inputlname">Last Name</label>
                <input id="lName" type="text" name="lName" placeholder="Doe" onkeyup="ValidateLname()" value="<?php if(isset($_POST["register"])) $lName = $_POST["lName"];  if(isset($lName)) echo $lName  ?>"><br> 
                <span id="lNameMessage"></span><br>
              
                
                
                <!--Submit button to send form data-->
                <input id="register"   type="submit" name="register" value="Register" />
                <input id="login"  type="submit" name="login" value="Login" />        
              </form>
            </div>
      </div>
    </div>
    <!-- Other game levels go here -->
  </div>
</div>
<?php //require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'public/template/footer.php' ?>


</body>

<?php

//connection with the db  variable  to have the connectoin ($connection)
require_once $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/Database.php';

            
require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'src/features/signup.php';     
require $_SERVER['DOCUMENT_ROOT'] .ROOT_PATH . 'db/create.php';

if(isset($_POST["login"]))
  echo "<script>window.location.href='signin-form.php'</script>"



?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH . 'public/template/footer.php'; ?>

</html>


