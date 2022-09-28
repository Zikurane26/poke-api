<?php 

include $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php';

if (isset($_POST['enter'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['user']) >= 1 && strlen($_POST['password']) >= 1) {
		$name = trim($_POST['name']);
		$user= trim($_POST['user']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmpassword = trim($_POST['confirm_password']);
		$nacimiento = $_POST['birth'];
		$consulta = "INSERT INTO datos_usuarios(nombre, usuario, email, password, nacimiento) VALUES ('$name','$user','$email','$password','$nacimiento')";
		$verificar_email = mysqli_query($conex, "SELECT	* FROM datos_usuarios WHERE email='$email'");
		$verificar_user= mysqli_query($conex, "SELECT * FROM datos_usuarios WHERE usuario='$user'");
		if (mysqli_num_rows($verificar_email) > 0){
			?> 
	    	<h3 class="message_php">El email ya está registrado</h3>
		   <?php
			
		}else if (mysqli_num_rows($verificar_user) > 0){
			?> 
	    	<h3 class="message_php">El usuario ya está registrado</h3>
		   <?php
			
		}else if($password==$confirmpassword){
			$resultado = mysqli_query($conex,$consulta);
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

		} else {
			?> 
	    	<h3 class="message_php">Contraseña incorrecta</h3>
		   <?php
			
		}

		/* Después de registrarse se es enviado a… */
		


	    
		
    }   else {
	    	?> 
	    	<h3>¡Por favor complete los campos!</h3>
		   <?php
		   $hola = mysqli_errno($conex). " Message ".mysqli_error($conex);
           echo $hola;
    }
}



?>