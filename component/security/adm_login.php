<?php
#session_start();

#VALIDAR QUE VENGA UNA ACTION
if(!isset($_POST['action'])){ECHO 'No viene acción adm_login'; EXIT;}

if($_POST['action'] == 'LV'){

    if(!isset($_POST['email'])){ECHO 'No viene email adm_login'; EXIT;}
    if(!isset($_POST['password'])){ECHO 'No viene contraseña adm_login'; EXIT;}

    if(!strlen($_POST['password']) > 1 && !strlen($_POST['password']) < 20) {ECHO 'ESCRIBA UNA CONTRASEÑA CORRECTA';
         #header('Location:'. $_SERVER['HTTP_REFERER']);
        }

    include_once $_SERVER['DOCUMENT_ROOT'].'/backend/sql/security/login_validate.php';

    //Si el input Checkbox es distinto de 0 entra a este IF
    if($num_rows > 0){
        session_start();
        #ECHO 'ESTA CORRECTO';
        $_SESSION['user_log_in'] = 1;
        $_SESSION['message']=null;
        $_SESSION['admin_name'] = $row_get_login_validate['nombre'];
        $_SESSION['use_id'] = $row_get_login_validate['id'];
        $_SESSION['use_nam'] = $row_get_login_validate['nombre'];
        $_SESSION['use_ape'] = $row_get_login_validate['apellido'];
        $_SESSION['use_use'] = $row_get_login_validate['usuario'];
        $_SESSION['use_ema'] = $row_get_login_validate['email'];
        $_SESSION['use_pas'] = $row_get_login_validate['password'];
        $_SESSION['use_cel'] = $row_get_login_validate['telefono'];
        $_SESSION['use_pais'] = $row_get_login_validate['pais'];
        $_SESSION['use_nac'] = $row_get_login_validate['nacimiento'];
        $_SESSION['use_pok'] = $row_get_login_validate['pokemon'];
        $_SESSION['use_car'] = $row_get_login_validate['cargo'];
        $_SESSION['use_typ_id'] = $row_get_login_validate['rol'];
        $_SESSION['use_sta'] = $row_get_login_validate['estado'];
        $_SESSION['use_cont'] = $row_get_login_validate['contador'];
        if (!empty($_POST['remember'])) {
            setcookie("email", $row_get_login_validate['usuario'], time()+(10*365*24*60*90));
            setcookie("password", $row_get_login_validate['password'], time()+(10*365*24*60*90));
        } else { //Si no está activo el Checkbox cada cookie se establece en null / 0
            if(isset($_COOKIE['email'])){
                setcookie("email","");
            }
            if(isset($_COOKIE['password'])){
                setcookie("password","");
            }
        }
        if ($_SESSION['use_sta'] == 1) {
            echo "<script> window.location='/backend/dashboard'; </script>";
        } else {
            $_SESSION['message']="Usuario inactivo, ingrese a ¿Olvidó su contraseña? para activar su cuenta";
            echo "<script> window.location='/backend/login'; </script>";
        }
        
        
 

    }else{
        session_start();
        ECHO 'Error component/security/adm_login.php';
        $_SESSION['message']="Usuario o contraseña incorrecta";
        setcookie("message", "Usuario o contraseña incorrectos", time()+(10*365*24*60*90));
        header('location:/backend/login');
        $message="Usuario o contraseña incorrecta";
    }
    
    #echo '<pre>'.var_dump($_SESSION).'</pre>';
    /* echo '<pre>'.var_dump($row_get_login_validate).'</pre>'; */


    #$_SESSION["use_id"]=$row_get_login_validate['use_id'];
    #$_SESSION["use_nam"]=$row_get_login_validate['use_nam'];
    #$_SESSION["use_use"]=$row_get_login_validate['use_use'];
    #$_SESSION["use_ema"]=$row_get_login_validate['use_ema'];
    #$_SESSION["use_pas"]=$row_get_login_validate['use_pas'];
    #$_SESSION["use_dat_sig_up"]=$row_get_login_validate['use_dat_sig_up'];
    #$_SESSION["use_typ"]=$row_get_login_validate['use_typ'];
    #echo "<script> window.location='/backend/'; </script>"; 
}
?>