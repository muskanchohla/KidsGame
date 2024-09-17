function ValidateLname(){
   

    var lName = document.getElementById("lName").value || "";
  
    // Crea una nueva instancia de XMLHttpRequest
    var xmlhttp = new XMLHttpRequest();

    // Configura la solicitud POST
    xmlhttp.open("POST", "../../src/signup-onkeyup/lname-ajax.php", true);

    // Establece el encabezado de la solicitud
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Envía los datos al servidor
    xmlhttp.send("lName=" + lName);

    // Maneja la respuesta del servidor
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != null){
                document.getElementById("lNameMessage").innerHTML = this.responseText;
               

            }
               
            else
                alert("No data received from the PHP file");
        }
    };
}
