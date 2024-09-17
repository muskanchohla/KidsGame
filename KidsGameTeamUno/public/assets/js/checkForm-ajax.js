function CheckForm(){
   //get the value for each <span> and send the values to another php file to check if the <span> is empty
    var uName = document.getElementById("uNameMessage").value
    var password = document.getElementById("passwordMessage").value || "";
    var passwordC = document.getElementById("cPasswordMessage").value || "";
    var fName = document.getElementById("fNameMessage").value;
    var lName= document.getElementById("lNameMessage").value;
    var email= document.getElementById("emailMessage").value;
  
    var params = "uName=" + encodeURIComponent(uName) + "&password=" + encodeURIComponent(password)+
     "&passwordc=" + encodeURIComponent(passwordc)+ "&fName=" + encodeURIComponent(fName) + "&lName="+encodeURIComponent(lName)+ "&email="+encodeURIComponent(email);
    var xmlhttp = new XMLHttpRequest();

    // Configura la solicitud POST
    xmlhttp.open("POST", "../../src/features/checkForm.php", true);

    // Establece el encabezado de la solicitud
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Envía los datos al servidor
    xmlhttp.send( params);

    // Maneja la respuesta del servidor
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != null){
                document.getElementById("passwordMessage").innerHTML = this.responseText;
               

            }
               
            else
                alert("No data received from the PHP file");
        }
    };
}
