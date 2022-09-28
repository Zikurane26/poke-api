<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/session/session_start.php'; ?>
<?php /* include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php'; */
include_once $_SERVER['DOCUMENT_ROOT'].'/backend/sql/security/connection.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/header.php';?>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/menu.php';?>
    <?php
    //echo 'Nombre de la sesión: '; 
    //echo $_SESSION['admin_name']; echo ' ----';
    //echo '<pre>'.var_dump($_SESSION).'</pre>';
    $query_id = "SELECT * from datos_usuarios where id=".$_SESSION['use_id'];"";
    $result_id= mysqli_query($conex,$query_id);
    $row_id= mysqli_fetch_array($result_id);
    $_SESSION['use_pok']=$row_id['pokemon'];


    ?>
    <div><p><b syle="font-size: 20vh;font-family: 'Lucida Sans', 'Lucida Sans Regular';">WELCOME al dashboard</b></p></div>
    <div class="content shadow box box_table">
    
    <table class="table table_border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Nacimiento</th>
            <th>User type</th>
            <th>Telefono</th>
            <th>Pokemon</th>
            <th>Cargo</th>
            <th>Estado</th>
            <th>Contador</th>
            <th>Imagen</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        if ($_SESSION['use_typ_id'] == '1') {
            $query = "SELECT * FROM `datos_usuarios`  \n"
            . "ORDER BY `datos_usuarios`.`contador`  DESC;";
        } else {
            $query = "SELECT * from datos_usuarios where id=".$_SESSION['use_id'];"";
        }
        $result_dates = mysqli_query($conex, $query);

        while($row = mysqli_fetch_array($result_dates)){ ?>
        <tr class="table_content">
            <td ><?php echo $row['id']?>  </td>
            <td ><?php echo $row['nombre']?>  </td>
            <td ><?php echo $row['apellido']?>  </td>
            <td ><?php echo $row['usuario']?>  </td>
            <td ><?php echo $row['email']?>  </td>
            <td ><?php echo $row['nacimiento']?>  </td>
            <td ><?php echo $row['rol']?>  </td>
            <td ><?php echo $row['telefono']?>  </td>
            <td ><?php echo $row['pokemon']?>  </td>
            <td ><?php echo $row['cargo']?>  </td>
            <td ><?php echo $row['estado']?>  </td>
            <td ><?php echo $row['contador']?>  </td>
            <td><img src="<?php echo $row['imagen']?>" alt="imagen" width="100px" height="100px"></td>
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

<div clas="content shadow box">
    <input type="hidden" name="pokemon_selec" id="pokemon_selec" placeholder="" value="<?php echo $_SESSION['use_pok']?>">
    <img src="" id="img_pokemon" alt="">
    <p id="info_pokemon"></p>

</div>
</body>
<script>
        $(document).ready(function(){
                var pokemon = $("#pokemon_selec").val();
                $.ajax({
                    url: "https://pokeapi.co/api/v2/pokemon/"+pokemon,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $("#img_pokemon").attr("src", data.sprites.front_default);
                        $("#info_pokemon").html("<input type='hidden' name='id_pokemon' value='"+data.id+"'<p>ID: "+data.id+"</p>Nombre: "+data.name+"<br>Altura: "+data.height+"<br>Tipo: "+data.types[0].type.name+"<br>Peso: "+data.weight);
                    },
                    error: function(){
                        alert("No se ha podido obtener la información");
                    }
                });
        });


    </script>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/footer.php';?>



