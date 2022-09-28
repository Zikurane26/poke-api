<?php 

include $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php';

if (isset($_POST['enter'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['user']) >= 1 && strlen($_POST['password']) >= 1) {
		//Trae el último número ID de la base de datos "datos_usuarios" y suma 1
		$last_id = mysqli_query($conex, "SELECT MAX(id) FROM datos_usuarios");
		$last_id = mysqli_fetch_array($last_id);
		$last_id = $last_id[0] + 1;
		
		$name = trim($_POST['name']);
		$last_name = trim($_POST['last_name']);
		$user= trim($_POST['user']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmpassword = trim($_POST['confirm_password']);
		$telefono = trim($_POST['phone']);
		$nacimiento = $_POST['birth']; 
		$pais = trim($_POST['country']);
		$cargo = trim($_POST['cargo']);
		$id_pokemon= trim($_POST['id_pokemon']);
		// Guardar en la variable $imagen la imagen que se sube
		$nombre_archivo = $_FILES['imagen']['name'];
    	$directorio ="images/images_users/";
    	$aleatorio = mt_rand(100, 999);
    	$ruta = "images/images_users/".$aleatorio.$nombre_archivo;
	    $imagen = $_FILES['imagen']['tmp_name'];
		$rol= 2; //Rol de usuario= 2 (por defecto) Rol admin = 1
		$contador = 0;
		$estado = 1; //Estado de usuario= 1 (por defecto) Estado de usuario inactivo = 0
		$consulta = "INSERT INTO datos_usuarios(id,nombre, apellido, usuario, email, password, nacimiento, telefono, pais, cargo, rol, contador,pokemon,estado,imagen) VALUES ('$last_id','$name','$last_name','$user','$email','$password','$nacimiento','$telefono','$pais','$cargo','$rol','$contador',$id_pokemon,$estado,'$ruta')";
		$verificar_email = mysqli_query($conex, "SELECT	* FROM datos_usuarios WHERE email='$email'");
		$verificar_user= mysqli_query($conex, "SELECT * FROM datos_usuarios WHERE usuario='$user'");
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
		 
		}


		
		if (mysqli_num_rows($verificar_email) > 0){
			?> 
	    	<h3 class="message_php">El email ya está registrado</h3>
		   <?php
			exit;
		}else if (mysqli_num_rows($verificar_user) > 0){
			?> 
	    	<h3 class="message_php">El usuario ya está registrado</h3>
		   <?php
			exit;
		}
		

		if($password==$confirmpassword){
			$resultado = mysqli_query($conex,$consulta);
	    	if ($resultado) {
				echo "<script> window.location='/backend/index.php'; </script>";
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

		} else {
			?> 
	    	<h3 class="message_php">Contraseña incorrecta</h3>
		   <?php
			exit;
		}
		#header('Location:/backend/index.php');
		//echo "<script> window.location='/backend/index.php'; </script>";
		echo "Usuario registrado";

	    
		
    }   else {
	    	?> 
	    	<h3>¡Por favor complete los campos!</h3>
		   <?php
		   $hola = mysqli_errno($conex). " Message ".mysqli_error($conex);
           echo $hola;
    }
}

?>