<?php
# JBasic V 0.2
# Creador : Juan Ramirez
# Ultima actualización - Juan Ramirez
# 18 Sep 2020 
   
include_once $_SERVER['DOCUMENT_ROOT'].'/backend/component/security/security_option.php'; 

?>
<!DOCTYPE html>
<html lang="es">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="/backend/css/normalize.css">
          <link rel="stylesheet" href="/backend/css/styles_dashboard.css?<?= time();?>">
          <script src="https://kit.fontawesome.com/9907a3343e.js" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
          <script type="text/javascript" src="/backend/js/main.js?<?= time();?>"></script>
          <title> <?= $module_name ?> | <?= $_SESSION['sys_nam'] ?> - V <?=$_SESSION['sys_ver']?> </title>
     </head>
     <body class="full">
<?php

     # PROCEDIMIENTO QUE TRAE LA CONFIGURACIÓN DEL APLICATIVO 
     include_once $_SERVER['DOCUMENT_ROOT'].$main_directory.'/site/header.php';

     include_once $_SERVER['DOCUMENT_ROOT'].$main_directory.'/site/menu.php';

     include_once $_SERVER['DOCUMENT_ROOT'].$main_directory.$module_access;

     include_once $_SERVER['DOCUMENT_ROOT'].$main_directory.'/site/footer.php';
?>
     </body>
</html>

     