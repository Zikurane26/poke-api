<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php';
$link=connect();
mysqli_set_charset($link, "utf8");

        $sql_query = ' SELECT * FROM datos_usuarios WHERE (email="'.$_POST['email'].'" or usuario="'.$_POST['email'].'") and password = "'.$_POST['password'].'"';
        $sql_query_cont = ' UPDATE datos_usuarios SET contador = contador + 1 WHERE (email="'.$_POST['email'].'" or usuario="'.$_POST['email'].'") and password = "'.$_POST['password'].'"';
        $sql_query_estado = ' SELECT estado FROM datos_usuarios WHERE (email="'.$_POST['email'].'" or usuario="'.$_POST['email'].'") and password = "'.$_POST['password'].'"';

        if (!$sql_login_validate=mysqli_query($link,$sql_query)) {
            ECHO "HAY UN ERROR 3";
            EXIT;
        } 
        else {
            $row_get_login_validate=mysqli_fetch_assoc($sql_login_validate); 
            $num_rows = mysqli_num_rows($sql_login_validate);
            mysqli_free_result($sql_login_validate);
            mysqli_query($link,$sql_query_cont);
        }

?>