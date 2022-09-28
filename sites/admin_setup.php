<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/session/session_start.php';
    /* session_start(); */

    //echo '¡Hola ' . htmlspecialchars($_SESSION["use_typ_id"]) . '!'; 

    switch ($_SESSION["use_typ_id"]) {
        case 2:
            header('location: /backend/sites/colaborator_setup.php');
            break;
        case 3:
            header('location: /backend/sites/setup.php');
            break;
        
       default:
    };
    
?>

<?php /* include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php'; */
include_once $_SERVER['DOCUMENT_ROOT'].'/backend/sql/security/connection.php';?>



<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/header.php';?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/menu.php';?>
<head>
    <title>Administrador</title>
</head>
<body>
<div class="content shadow box box_register">
        
    <form id="form" method="post">
        <div class="form">
            <h1 class="table_tittle">Registrar nuevo usuario</h1>
            <div class="right">
                <input type="text" name="name" id="nombre" placeholder="Nombre"><span class="line"></span>
            </div>
            <div class="right">
                <input type="text" name="user" placeholder="Usuario"><span class="line"></span>
            </div>
            <div class="group">
                <input type="email" name="email" placeholder="Email"><span class="line"></span>
            </div>
            <div class="right-bottom">
                <input type="password" name="password" id="password" placeholder="Password"><span class="line"></span>
            </div>
            <div class="right-bottom">
                <input type="password" name="confirm_password" id="name" placeholder="Repeat Password"><span class="line"></span>
            </div>
            <button type="submit" class="button" name="enter" href="/backend/dashboard.php">Registrar</button>
        </div>
    </form>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT'].'/backend/component/user/adm_users.php';
    ?>
</div>

<div class="content shadow box box_table">
    
    <table class="table table_border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nacimiento</th>
            <th>User type</th>
            <th>Telefono</th>
            <th>Pokemon</th>
            <th>Cargo</th>
            <th>Estado</th>
            <th>Contador</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $query = "SELECT * from datos_usuarios";
        $result_dates = mysqli_query($conex, $query);

        while($row = mysqli_fetch_array($result_dates)){ ?>
        <tr class="table_content">
            <td ><?php echo $row['id']?>  </td>
            <td ><?php echo $row['nombre']?>  </td>
            <td ><?php echo $row['usuario']?>  </td>
            <td ><?php echo $row['email']?>  </td>
            <td ><?php echo $row['password']?>  </td>
            <td ><?php echo $row['nacimiento']?>  </td>
            <td ><?php echo $row['rol']?>  </td>
            <td ><?php echo $row['telefono']?>  </td>
            <td ><?php echo $row['pokemon']?>  </td>
            <td ><?php echo $row['cargo']?>  </td>
            <td ><?php echo $row['estado']?>  </td>
            <td ><?php echo $row['contador']?>  </td>
            <td class="actions_buttons">
                <a href="/backend/component/modify/edit_user.php?id=<?php echo $row['id'] ?>">
                <i class="fas fa-marker button_actions button_action_edit"></i>
                </a>
                <a href="/backend/component/modify/delete_user.php?id=<?php echo $row['id'] ?>">
                <i class="far fa-trash-alt button_actions buttton_action_delete"></i>
                </a>
            </td>
        </tr>
        <?php   }  ?>
    </tbody>
    </table>
</div>

</body>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/footer.php';?>