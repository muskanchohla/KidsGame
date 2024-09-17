function ValidatePassword(){
   
    
    var password = document.getElementById("password").value || "";
    var passwordC = document.getElementById("passwordC").value || "";
  
    var params = "password=" + encodeURIComponent(password) + "&passwordC=" + encodeURIComponent(passwordC);
    var xmlhttp = new XMLHttpRequest();

    // Configura la solicitud POST
    xmlhttp.open("POST", "../../src/signup-onkeyup/pcode1-ajax.php", true);

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
 
