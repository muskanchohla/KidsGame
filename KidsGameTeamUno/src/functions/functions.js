



//validate capital Letter
function FirstCapitalLetter(){
 alert("Este codigo debe ir en main o en las validaciones ajax, aqui no!");


    var fName = document.getElementById("fName").value;

    // Crea una nueva instancia de XMLHttpRequest
    var xmlhttp = new XMLHttpRequest();

    // Configura la solicitud POST
    xmlhttp.open("POST", "capitalLetter.php", true);

    // Establece el encabezado de la solicitud
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Envía los datos al servidor
    xmlhttp.send("fName=" + fName);

    // Maneja la respuesta del servidor
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != null){
                document.getElementById("fNameMessage").innerHTML = this.responseText;
               

            }
               
            else
                alert("No data received from the PHP file");
        }
    };



}