<?php
function timeOut() {
    echo "<script>
    var time = 900000; // 15 minutos en milisegundos
    
    setTimeout(function() { 
        window.location.href = '../../index.php'; 
    }, time);

    // Hacer una solicitud AJAX para destruir la sesión después de 15 minutos
    setTimeout(function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../src/features/destroy_session.php', true);
        xhr.send();
    }, time);
    </script>";
}




?>