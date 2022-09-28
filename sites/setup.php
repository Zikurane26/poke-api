<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/session/session_start.php';
    
    

    /* echo '¡Hola ' . htmlspecialchars($_COOKIE["user_type"]) . '!'; */

    switch ($_SESSION["use_typ_id"]) {
        case 1:
            header('location: /backend/sites/admin_setup.php');
            
            break;
        case 2:
            header('location: /backend/sites/colaborator_setup.php');
            break;
        
        default:
    };
    //header('location: /backend/sites/admin_setup.php');
    //echo "NO ENTRA A NINGUNA DE LAS OPCIONES";
    
?>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/header.php';?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/menu.php';?>
<?php 
        include_once $_SERVER['DOCUMENT_ROOT'].'/backend/component/user/adm_users.php';
    ?>
<head>
    <title>Setup</title>
</head>
<body>

<div class="content shadow box box_table">
    
    <table class="table table_border">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Create At</th>
        </tr>
    </thead>
    <tbody>
        <?php $query = "SELECT * from datos_usuarios";
        $result_dates = mysqli_query($conex, $query);

        while($row = mysqli_fetch_array($result_dates)){ ?>
        <tr class="table_content">
            <td ><?php echo $row['nombre']?>  </td>
            <td ><?php echo $row['email']?>  </td>
            <td ><?php echo $row['nacimiento']?>  </td>
        </tr>
        <?php   }  ?>
    </tbody>
    </table>
</div>

</body>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/footer.php';?>