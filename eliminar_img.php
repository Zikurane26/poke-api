<?php 

include $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php';

if (isset($_POST['enter'])) {
    $last_id = mysqli_query($conex, "SELECT MAX(id) FROM datos_usuarios");
	$last_id = mysqli_fetch_array($last_id);
	$last_id = 12;//$last_id[0] + 1;
    $directorio ="images/images_users/";
    $aleatorio = mt_rand(100, 999);
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta = "images/images_users/327Sekiro.jpg";
    $nombre = $_POST['nombre'];
    //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $imagen= $_FILES['imagen']['tmp_name'];
    //$consulta = "UPDATE datos_usuarios SET imagen='$imagen' where id='$nombre'";
    $consulta = "UPDATE datos_usuarios SET imagen= '$ruta' where id='$last_id'";

    $resultado = mysqli_query($conex,$consulta);
    
    If (unlink($ruta)) {
        echo "file was successfully deleted";
      } else {
        echo "there was a problem deleting the file";
      }
}
?>