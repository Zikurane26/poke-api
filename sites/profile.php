<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/session/session_start.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/header.php';?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options</title>
</head>
<body style="align-content: center;">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/menu.php';?>
        <div class="tittle">
            <?php /* include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php'; */
include_once $_SERVER['DOCUMENT_ROOT'].'/backend/sql/security/connection.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/header.php';?>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/menu.php';?>
    <?php
    //echo 'Número de ID: '; 
    //echo $_SESSION['use_id']; echo ' ----';
    //echo '<pre>'.var_dump($_SESSION).'</pre>';
    ?>
    
    
    <?php 
        $query = "SELECT * from datos_usuarios where id=".$_SESSION['use_id'];"";
        $result_dates = mysqli_query($conex, $query);
        $row = mysqli_fetch_array($result_dates);
    ?>
    





<section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
            <div class="perfil-usuario-avatar">
                <img src="../<?php echo $row['imagen']?>" alt="img-avatar">
                <!-- <button type="button" class="boton-avatar">
                    <i class="far fa-image"></i>
                </button> -->
            </div>
            <!-- <button type="button" class="boton-portada">
                <i class="far fa-image"></i> Cambiar fondo
            </button> -->
        </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">
            <h3 class="titulo"><?php echo $row['nombre']?> <?php echo $row['apellido']?></h3>
            <p class="texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="perfil-usuario-bio">
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-signs"></i> Email: <?php echo $row['email']?></li>
                <li><i class="icono fas fa-phone-alt"></i> Telefono: <?php echo $row['telefono']?></li>
                <li><i class="icono fas fa-briefcase"></i> Cargo: <?php echo $row['cargo']?></li>
                <li><i class="icono fas fa-building"></i> Rol: <?php if ($row['rol'] == 1) {
                    echo 'Administrador';
                } else {echo 'Usuario';}?></li>
            </ul>
            <ul class="lista-datos">
                <li><i class="icono fas fa-map-marker-alt"></i> Pais: <?php echo $row['pais']?></li>
                <li><i class="icono fas fa-calendar-alt"></i> Fecha nacimiento: <?php echo $row['nacimiento']?></li>
                <li><i class="icono fas fa-user-check"></i>Usuario: <?php echo $row['usuario']?></li>
                <li><i class="icono fas fa-share-alt"></i> Pokemon: <?php echo $row['pokemon']?></li>
            </ul>
        </div>
        <div class="perfil-usuario-footer">

            <ul class="lista-datos">
                <li><p id="info_pokemon"></p></li>
            </ul>
            <ul class="lista-datos">
                
                <li class="img_pokemon_content"><input type="hidden" name="pokemon_selec" id="pokemon_selec" placeholder="" value="<?php echo $row['pokemon']?>">
                <img src="" id="img_pokemon" alt=""></li>
            </ul>


        <div clas="">
        <input type="hidden" name="pokemon_selec" id="pokemon_selec" placeholder="" value="<?php echo $row['pokemon']?>">
        <img src="" id="img_pokemon" alt="">
        </div>
        <div clas="">
        <p id="info_pokemon"></p>
        </div>
        </div>
        <div class="redes-sociales">
        <a href="/backend/component/modify/edit_user.php?id=<?php echo $row['id'] ?>" class="boton-redes">
        <i class="fas fa-marker button_actions button_action_edit"></i>
        </a>
        </div>
    
    
</section>




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
</body>
<footer>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/footer.php';?>
</footer>
</html>