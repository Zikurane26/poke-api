<?php 

include $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php';

if (isset($_POST['enter'])) {
    $last_id = mysqli_query($conex, "SELECT * FROM datos_usuarios where id='1'");
    $last_id = mysqli_fetch_array($last_id);
    $last_id = $last_id[0];
    $directorio ="images/images_users/";
    $aleatorio = mt_rand(100, 999);
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta = "images/images_users/".$aleatorio.$nombre_archivo."";
    $nombre = $_POST['nombre'];
    //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $imagen= $_FILES['imagen']['tmp_name'];
    $image= $row['imagen'];
    $url_imagen= "../../'$image'";
    //$consulta = "UPDATE datos_usuarios SET imagen='$imagen' where id='$nombre'";
    $consulta = "UPDATE datos_usuarios SET imagen='$ruta' WHERE id='$id'";

    $resultado = mysqli_query($conex,$consulta);
    If (unlink($url_imagen)) {
        echo "file was successfully deleted";
      } else {
        echo "there was a problem deleting the file";
      }
    if(!file_exists($directorio )){
        mkdir($directorio ,0777,true);
        if(file_exists($directorio )){
     
            if(move_uploaded_file($imagen, 'BACKEND/'.$aleatorio.$nombre_archivo)){
                echo "Archivo guardado con exito";
            }else{
                echo "Archivo no se pudo guardar";
            }
        }
    }else{
            if(move_uploaded_file($imagen, $directorio.$aleatorio.$nombre_archivo)){
            echo "Archivo guardado con exito";
     
        }elseif(move_uploaded_file($imagen, $directorio.$aleatorio.$nombre_archivo)){
            echo "Archivo guardado con exito";
        }else{
            echo "Archivo no se pudo guardar";
        }
     
        var_dump($ruta);
     
    }


    if ($resultado) {
    ?> 
    <h3 class="message_php">¡Ha inscrito correctamente el usuario!</h3>
   <?php
    } else {
    ?> 
    <h3>¡Ups ha ocurrido un error!</h3>
   <?php
   $error_a = mysqli_errno($conex). " Message ".mysqli_error($conex);
   echo $error_a;
    }
}
?>