

function ValidateUserName(){
   
  
    var uName = document.getElementById("uName").value.replace(/\s/g, '');
   
    // Crea una nueva instancia de XMLHttpRequest
    var xmlhttp = new XMLHttpRequest();

    // Configura la solicitud POST
    xmlhttp.open("POST", "../../src/signup-onkeyup/uname-ajax.php", true);

    // Establece el encabezado de la solicitud
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Envía los datos al servidor
    xmlhttp.send("uName=" + uName);

    // Maneja la respuesta del servidor
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != null){
                document.getElementById("uNameMessage2").innerHTML = this.responseText;
               

            }
               
            else
                alert("No data received from the PHP file");
        }
    };
}
