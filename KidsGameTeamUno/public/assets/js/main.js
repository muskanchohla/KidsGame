//Variable for userid and game
sitename = "kidsgameteamuno"

// This functions is used to assing the options in the right div accorind to the user answers
function SetOptionPosition(divtemp, divParent)
{
    switch (parseInt(divParent))
    {
        case 0:
            document.getElementById("left").appendChild(divtemp)
            break;
        case 1:
            document.getElementById("one").appendChild(divtemp)
            break;
        case 2:
            document.getElementById("two").appendChild(divtemp)
            break;
        case 3:
            document.getElementById("three").appendChild(divtemp)
            break;
        case 4:
            document.getElementById("four").appendChild(divtemp)
            break;
        case 5:
            document.getElementById("five").appendChild(divtemp)
            break;
        case 5:
            document.getElementById("six").appendChild(divtemp)
            break;

    }
}

function getValue(divTemp)
{
    let val = "";
    switch (divTemp)
    {
        case "divA":
            val = document.getElementById("FP1").innerText;
            break;
        case "divB":
            val = document.getElementById("FP2").innerText;
            break;
        case "divC":
            val = document.getElementById("FP3").innerText;
            break;
        case "divD":
            val = document.getElementById("FP4").innerText;
            break;
        case "divE":
            val = document.getElementById("FP5").innerText;
            break;
        case "divF":
            val = document.getElementById("FP6").innerText;
            break;
    }
    return val;
}

function Validate(game)
{
    console.log("Entra a validación: " + game);

    let lBox = document.getElementById("left");
    let oneBox = document.getElementById("one");
    let twoBox = document.getElementById("two");

    if (game < 5)
    {
        if (lBox.children.length == 0)
        {
            postWithAjax(game);
        }
        else{
            //Here you can call the php function
            alert("To continue the game it is needed to drop all the values to the empty boxes");
        }
    }
    else
    {
        if (oneBox.children.length > 0 && twoBox.children.length > 0)
        {
            postWithAjax(game);
        }
        else{
            //Here you can call the php function
            alert("To continue the game it is needed to drop values to the first two boxes");
        }
    }
}


function postWithAjax(game)
{
    console.log("Post with ajax");
     // Parameters to send to PHP function
     var param1 = "";
     var param2 = "";
     var param3 = "";
     var param4 = "";
     var param5 = "";
     var param6 = "";

    let oneBox = document.getElementById("one");
    let twoBox = document.getElementById("two");
    let threeBox = document.getElementById("three");
    let fourBox = document.getElementById("four");
    let fiveBox = document.getElementById("five");
    let sixBox = document.getElementById("six");
    let leftBox = document.getElementById("left");

    

    //Valida according the game


    param1 = getValue(oneBox.children[0].id);
    param2 = getValue(twoBox.children[0].id);
    if (game < 5)
    {
        param3 = getValue(threeBox.children[0].id);
        param4 = getValue(fourBox.children[0].id);
        param5 = getValue(fiveBox.children[0].id);
        param6 = getValue(sixBox.children[0].id);
    }
    else
    {
        //get the other elements that not participate to have all the array elements to validate the games
        param3 = getValue(leftBox.children[0].id);
        param4 = getValue(leftBox.children[1].id);
        param5 = getValue(leftBox.children[2].id);
        param6 = getValue(leftBox.children[3].id);
    }

    /*console.log(param1);
    console.log(param2);
    console.log(param3);
    console.log(param4);
    console.log(param5);
    console.log(param6);*/
   

    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // Set withCredentials to true to include cookies in the request
    xhttp.withCredentials = true;

    // Define what happens on successful response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display the response from the PHP function
            let res = this.responseText;
            let resArr = res.split("|");
            let size = resArr.length;
            if (size >= 3)
            {
                let act = resArr[size - 3];
                let gameVal = resArr[size - 2];
                let usVal = resArr[size - 1];
                
                switch (act)
                {
                    case "fail":
                        alert("YOU FAILED!\n" + gameVal + "\n" +  usVal );
                        window.location.href = "/" + sitename + "/public/form/game-form.php";

                        break;
                    case "next":
                        alert("GOOD JOB!\n" + gameVal + "\n" +  usVal + "\nGo to the next level" );
                        window.location.href = "/" + sitename + "/public/form/game-form.php";
                        break;
                    case "gameover":
                        alert("YOU FAILED!\n" + gameVal + "\n" +  usVal );
                        window.open('/' + sitename + '/public/message/game-over.php', 'popupWindow', 'width=800px,height=300px,resizable=no,scrollbars=no,toolbar=no,menubar=no,status=no')
                        window.location.href = "/" + sitename + "/index.php";
                        //alert("PopUp!\n" + gameVal + "\n" +  usVal + "\nLooser" );
                        //window.location.href = "/dw3/finalproject/public/message/game-over.php";
                        break;
                    case "winner":
                        window.open('/' + sitename + '/public/message/game-won.php', 'popupWindow', 'width=800px,height=300px,resizable=no,scrollbars=no,toolbar=no,menubar=no,status=no')
                        window.location.href = "/" + sitename + "/public/message/history-table.php";
                        break;

                }
               


            }
            else
            {
                alert("Something went wrong, please try again!");
                window.location.href = "/" + sitename + "/public/form/game-form.php";
            }
            console.log(res.split("|"))
            console.log(this.responseText);
            //
        }
    };

    // Open a connection to the PHP script containing the PHP function
    xhttp.open("POST", "/" + sitename + "/src/features/game.php", true);

    // Set the content type
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with the function name and parameters
    xhttp.send("game=validateGame&param1=" + encodeURIComponent(param1) + "&param2=" + encodeURIComponent(param2) + "&param3=" + encodeURIComponent(param3) + "&param4=" + encodeURIComponent(param4) + "&param5=" + encodeURIComponent(param5) + "&param6=" + encodeURIComponent(param6));

}



// This functions is used to enable the drag and drop
function DragDrop()
{
    let lists = document.getElementsByClassName("list");
    let oneBox = document.getElementById("one");
    let twoBox = document.getElementById("two");
    let threeBox = document.getElementById("three");
    let fourBox = document.getElementById("four");
    let fiveBox = document.getElementById("five");
    let sixBox = document.getElementById("six");
    let leftBox = document.getElementById("left");
    let selected = null;
    for(list of lists)
    {
        console.log("Deja Hijo");
        list.addEventListener("dragstart",function(e){
            selected = e.target;
            
            leftBox.addEventListener("dragover", function(e){

                e.preventDefault();
            });

            leftBox.addEventListener("drop", function(e){
                leftBox.appendChild(selected);
                selected=null;
            });


            oneBox.addEventListener("dragover", function(e){
                
                e.preventDefault();
            });

            oneBox.addEventListener("drop", function(e){
                if (oneBox.childElementCount === 0)
                {
                    oneBox.appendChild(selected);
                }
                selected=null;
            });
            
            twoBox.addEventListener("dragover", function(e){
                e.preventDefault();
            });

            twoBox.addEventListener("drop", function(e){
                if (twoBox.childElementCount === 0)
                    twoBox.appendChild(selected);
                selected=null;
            });

            threeBox.addEventListener("dragover", function(e){
                e.preventDefault();
            });

            threeBox.addEventListener("drop", function(e){
                if (threeBox.childElementCount === 0)
                    threeBox.appendChild(selected);
                selected=null;
            });

            fourBox.addEventListener("dragover", function(e){
                e.preventDefault();
            });

            fourBox.addEventListener("drop", function(e){
                if (fourBox.childElementCount === 0)
                    fourBox.appendChild(selected);
                selected=null;
            });

            
            fiveBox.addEventListener("dragover", function(e){
                e.preventDefault();
            });

            fiveBox.addEventListener("drop", function(e){
                if (fiveBox.childElementCount === 0)
                    fiveBox.appendChild(selected);
                selected=null;
            });

            sixBox.addEventListener("dragover", function(e){
                e.preventDefault();
            });

            sixBox.addEventListener("drop", function(e){
                if (sixBox.childElementCount === 0)
                    sixBox.appendChild(selected);
                selected=null;
            });


        
        })  
    }
}

function submitForm() {
    alert("The game is stopped");
    postWithAjaxStop();
}

function postWithAjaxStop()
{
    console.log("Post with ajax Stop");
     
    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // Set withCredentials to true to include cookies in the request
    xhttp.withCredentials = true;

    // Define what happens on successful response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Display the response from the PHP function
            console.log(this.responseText);
            let res = this.responseText;
            let resArr = res.split("|");
            let size = resArr.length;
            if (size == 2)
            {
                window.open('/' + sitename + '/public/message/game-stopped.php', 'popupWindow', 'width=800px,height=300px,resizable=no,scrollbars=no,toolbar=no,menubar=no,status=no')
                window.location.href = "/" + sitename + "/public/message/history-table.php";
            }
        }
    };

    // Open a connection to the PHP script containing the PHP function
    xhttp.open("POST", "/" + sitename + "/src/features/game.php", true);

    // Set the content type
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with the function name and parameters
    xhttp.send("stop=stopGame");

}

function ValidateUserNameExist(){
   

  var uName = document.getElementById("uName").value.replace(/\s/g, '');
 
  // Crea una nueva instancia de XMLHttpRequest
  var xmlhttp = new XMLHttpRequest();

  // Configura la solicitud POST
  xmlhttp.open("POST", "../../src/features/checkUsername.php", true);

  // Establece el encabezado de la solicitud
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Envía los datos al servidor
  xmlhttp.send("uName=" + uName);

  // Maneja la respuesta del servidor
  xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          if (this.responseText != null){
              document.getElementById("uNameMessage").innerHTML = this.responseText;
             

          }
             
          else
              alert("No data received from the PHP file");
      }
  };
}



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

