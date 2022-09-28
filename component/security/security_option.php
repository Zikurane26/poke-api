<?php 
# JBasic V 0.2
# Creador : Juan Ramirez
# Ultima actualización - Juan Ramirez
# 18 Sep 2020 

include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/session/session_start.php';
mb_internal_encoding('UTF-8');
# ZONA HORARIA 
date_default_timezone_set('America/Bogota');
$_SESSION['cod_sec'] = md5(session_id());

# VALIDACION 
if (!isset($_GET['option'])){ 
    
    if (isset($_SESSION['user_log_in'])){
        $_GET['option'] = 'dashboard';
    }else{
        $_GET['option'] = 'login';
    }

}
if (!isset($_SESSION['sys_ver'])){
    # PROCEDIMIENTO QUE TRAE LA CONFIGURACIÓN DEL APLICATIVO 
   include_once $_SERVER['DOCUMENT_ROOT'].'/backend/sql/security/get_system_information.php'; 
   $_SESSION['sys_nam']=$row_get_system_information['nombre'];
   $_SESSION['sys_ver']=$row_get_system_information['cargo'];
   $_SESSION['sys_ref']=$row_get_system_information['rol'];
   $_SESSION['sys_des']=$row_get_system_information['pokemon'];
   $_SESSION['sys_own']=$row_get_system_information['estado'];
}

if ($_GET['option']=='login'){ 
    if (isset($_SESSION['user_log_in'])) { session_unset($_SESSION['user_log_in']);}
    if (isset($_SESSION['use_id'])) { session_unset($_SESSION['use_id']);}
    header('location:/backend/login');
}
    # PROCEDIMIENTO QUE TRAE LA CONFIGURACIÓN DEL APLICATIVO 
    include_once $_SERVER['DOCUMENT_ROOT'].'/backend/sql/security/get_module.php'; 
    $module_name="login";# NOMBRE DEL MODULO fun_nam
    $module_access='/dashboard.php';# ACCESO AL MODULO fun_acc
    $module_option=$_SESSION['use_typ_id'];# OPCION DEL MODULO fun_opt $row_get_module_information['rol']
    # DIRECTORIO GENERAL DE LA APLICACIÓN
    $main_directory = '/backend';

?>