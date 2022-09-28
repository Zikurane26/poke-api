<?php
    $destinatario = 'brasti00@gmail.com';
    $asunto = 'Prueba de correo';
    $cuerpo = '
    
    <html> 
    <head> 
       <title>Prueba de correo</title> 
    </head> 
    <body> 
    <h1>Hola mundo dentro del correo</h1> 
    <p> 
    <img src="https://d500.epimg.net/cincodias/imagenes/2014/11/22/lifestyle/1416651327_858111_1416651500_noticia_normal.jpg" alt="Prueba"> 
    </p> 
    </body> 
    </html> 
    ';
    
    //para el envío en formato HTML 
    $cabeceras  = 'Prueba de envio_cabecera' . "\r";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r";

    mail($destinatario, $asunto, $cuerpo, $cabeceras);
    echo "Correo enviado";
    
?>

