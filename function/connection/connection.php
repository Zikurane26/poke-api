<?php 
function connect() { 
    if (!($link = mysqli_connect("localhost","root", "","dashboard") or trigger_error(mysqli_error($link),E_USER_ERROR))) { 
        
       echo "Error conectando a la base de datos.";
       exit(); 
    }   /* check connection */
     if (mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
         exit();
     }
    return $link; 
 }

$conex = mysqli_connect("localhost","root", "", "dashboard"); 
?>