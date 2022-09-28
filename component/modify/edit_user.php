<?php 
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/backend/function/connection/connection.php';
    



    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM datos_usuarios WHERE id = $id";
        $result= mysqli_query($conex,$query);
       

        if (mysqli_num_rows($result) == 1) {
            $row= mysqli_fetch_array($result);
            $id= $row['id'];
            $nombre= $row['nombre'];
            $last_name= $row['apellido'];
            $email= $row['email'];
            $user= $row['usuario'];
            $birth = $row['nacimiento'];
            $phone= $row['telefono'];
            $password= $row['password'];
            $user_type= $row['rol'];
            $imagen= $row['imagen'];
            $pais= $row['pais'];
            $pokemon = $row['pokemon'];
            $cargo = $row['cargo'];
        }

    }
    

    if (isset($_POST['enter'])) {
        $last_id = mysqli_query($conex, "SELECT MAX(id) FROM datos_usuarios");
        $last_id = mysqli_fetch_array($last_id);

        $directorio ="../../images/images_users/";
        $aleatorio = mt_rand(100, 999);
        $nombre_archivo = $_FILES['imagen']['name'];
        $ruta = "images/images_users/".$aleatorio.$nombre_archivo."";
        //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $imagen= $_FILES['imagen']['tmp_name'];
        $image= "../../".$row['imagen'];
        //$consulta = "UPDATE datos_usuarios SET imagen='$imagen' where id='$nombre'";
        $consulta = "UPDATE datos_usuarios SET imagen='$ruta' WHERE id='$id'";
    
        $resultado = mysqli_query($conex,$consulta);
        If (unlink($image)) {
            echo "file was successfully deleted";
          } else {
            echo "there was a problem deleting the file";
          }
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
         
            var_dump($ruta);
         
        }
        header("Location: /backend/component/modify/edit_user.php?id=$id");
    }



    if (isset($_POST['update'])) {
        $id2 = $_GET['id'];
        $alter_name= trim($_POST['name']);
        $alter_last_name= trim($_POST['last_name']);
        $alter_user= trim($_POST['user']);
        $alter_phone= trim($_POST['phone']);
        $alter_country= trim($_POST['country']);
        $alter_email= trim($_POST['email']);
        $alter_cargo= trim($_POST['cargo']);
        $alter_birth= trim($_POST['birth']);
        $alter_password= trim($_POST['password']);
        $alter_pokemon= $_POST['id_pokemon'];

        $query2 = "UPDATE `datos_usuarios` SET `nombre`='$alter_name',`apellido`='$alter_last_name',`usuario`='$alter_user',`email`='$alter_email',`telefono`='$alter_phone',`pais`='$alter_country',`nacimiento`='$alter_birth',`pokemon`='$alter_pokemon',`password`='$alter_password' WHERE id=$id2";

        $resultado_query=mysqli_query($conex, $query2);
        $error_a = mysqli_errno($conex). " Message ".mysqli_error($conex);
        if (!$resultado_query) {
            echo "Error al actualizar";
            echo $error_a;
        }else{
        //echo "Usuario actualizado";
        header("Location:/backend/dashboard.php");
        }
        
    }
    $previous = "javascript:history.go(-1)";
    //if(isset($_SERVER['HTTP_REFERER'])) {
    //$previous = $_SERVER['HTTP_REFERER'];
    //}

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/menu.php';?>

<div class="content shadow box box_register">

<form id="form_img"  action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="form">
            <h1>Actualizar imagen</h1>
            <div class="right">
                <img src="../../<?php echo $row['imagen']?>" alt="imagen" width="100px" height="100px">
            </div>
            <div class="right">
                <input type="file" name="imagen" class="inputfile" required> 
            <button type="submit" class="button" name="enter">Actualizar</button>
            </div>
        </div>
        </form>
<form id="form" action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="post">
        <!--
            <div class="form">
            <h1>Modificar usuario</h1>
            <div class="right">
                <input type="text" name="name" id="nombre" placeholder="Nombre" value="<?php echo $name?>"><span class="line"></span>
                <label for="" class="my_label" >Nombre</label>
            </div>
            <div class="right">
                <input type="text" name="user" placeholder="Usuario" value="<?php echo $user?>"><span class="line"></span>
                <label for="" class="my_label" >Usuario</label>
            </div>
            <div class="group">
                <input type="email" name="email" placeholder="Email" value="<?php echo $email?>"><span class="line" ></span>
                <label for="" class="my_label" >Email</label>
            </div>
            <div class="right-bottom">
                <input type="text" name="password" id="password" placeholder="Password" value="<?php echo $password?>"><span class="line"></span>
                <label for="" class="my_label" >Contraseña</label>
            </div>
            <div class="right-bottom">
                <input type="text" name="user_type"  placeholder="user_type" value="<?php echo $user_type?>"><span class="line"></span>
                <label for="" class="my_label" >Tipo de usuario</label>
            </div>
            
            <button type="submit" class="button" name="update">Actualizar</button>
            <a class="button"  href="/backend/sites/setup.php">Cancelar</a>
        </div>
        -->
        <div class="form">
            <h1>Modificar usuario</h1>
        
        <div class="grupo">
            <div class="pokemon-container right">
            <!--<select id="id_pokemon" name="pokemon" class="selectpicker" data-show-subtext="true" data-live-search="true">
                <option value='' selected="true">Seleccionar un pokemon</option>
                </select>  -->
                <input id="buscador-pokemon" type="search" class="buscador_pokemon" placeholder="Buscar Pokemon..." value="<?php echo $row['pokemon']?>">
                <span class="barra"></span>
                <button id="btn-pokemon" type="button" class="button">Buscar</button>
                </div>
                <div class="right">
                    <img src="" class='img_pokemon' id="img_pokemon" alt="">
                </div>
                <div class="right">
                <p id="info_pokemon"></p>
                </div>
            <div clas="content shadow box">
    <input type="hidden" name="pokemon_selec" id="pokemon_selec" placeholder="" value="<?php echo $row['pokemon']?>">
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
            <script>
                $(document).ready(function(){
                    $("#btn-pokemon").click(function(){
                        var pokemon = $("#buscador-pokemon").val();
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
                });


            </script>


            </div>
            <div class="grupo">
            <div class="right">
                <input type="text" name="name" id="nombre" placeholder="Nombre" value="<?php echo $nombre?>"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="text" name="last_name" id="last_name" placeholder="Apellido" value="<?php echo $last_name?>"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="text" name="user" placeholder="Usuario" value="<?php echo $user?>"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="text" name="phone" placeholder="Teléfono" value="<?php echo $phone?>"><span class="barra"></span>
            </div>
            </div>
            <div class="grupo">
            <div class="right">
                <input type="text" name="country" placeholder="Pais" value="<?php echo $pais?>"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="email" name="email" placeholder="Email" value="<?php echo $email?>"><span class="barra"></span>   
                <span class="barra"></span>
            </div>
            <div class="right">
                <select name="cargo" class="selectpicker"  data-show-subtext="true" data-live-search="true">
                    <option value="<?php echo $cargo?> selected="true"><?php echo $cargo?></option>
                    <option value='Gerente'>Gerente</option>
                    <option value='Contador'>Contador</option>
                    <option value='Vendedor'>Vendedor</option>
                </select>  
                <span class="barra"></span>
            </div>

            <div class="right">
                <input type="date" name="birth" placeholder="Nacimiento" value="<?php echo $birth?>"><span class="barra"></span>
            </div>
            </div>
            <div class="grupo">
            <div class="right">
                <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password?>"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="password" name="confirm_password" id="name" placeholder="Repeat Password" required><span class="barra"></span>
            </div>
            </div>
            <button type="submit" class="button" name="update">Actualizar</button>
            <a class="button"  href="/backend/sites/setup.php">Cancelar</a>
        </div>
        </div>
    </form>
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
            <th>Cumpleaños</th>
            <th>User type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($_SESSION['use_typ_id'] == 1) {
            $query = "SELECT * from datos_usuarios";
        } else {
            $query = "SELECT * from datos_usuarios where id = ".$_SESSION['use_typ_id'];
        }
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


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/backend/site/footer.php';?>

