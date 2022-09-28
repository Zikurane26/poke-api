<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/backend/css/style_signup_login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/backend/complement/validate_sign_up.js">  </script>
    <script type="text/javascript" src="/backend/complement/pokemon_api.js">  </script>
    <title>Registro</title>
</head>

<body>
    <form id="form" method="post" enctype="multipart/form-data">
        <div class="form">
            <h1>Registrarse</h1>
            <div class="grupo_pokemon">
            <div class="pokemon-container right">
            <!--<select id="id_pokemon" name="pokemon" class="selectpicker" data-show-subtext="true" data-live-search="true">
                <option value='' selected="true">Seleccionar un pokemon</option>
                <?php 
                for ($i=1; $i <= 1; $i++) { 
                    $pokemon = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i");
                    $pokemon = json_decode($pokemon);
                    $name = $pokemon->name;
                    $id = $pokemon->id;
                    echo "<option value='$id'>$name</option>";
                }
                ?>
                </select>  -->
                <input id="buscador-pokemon" type="search" class="buscador_pokemon" placeholder="Buscar Pokemon..." value="">
                <span class="barra"></span>
                <button id="btn-pokemon" type="button" class="button">Buscar</button>
            </div>
                <div class="right-bottom">
                    <img src="" class='img_pokemon' id="img_pokemon" alt="">
                </div>
                <div class="right-bottom">
                <p id="info_pokemon"></p>
                </div>
            
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
                                $("#info_pokemon").html("<input type='hidden' name='id_pokemon' value='"+data.name+"'<p>ID: "+data.id+"</p>Nombre: "+data.name+"<br>Altura: "+data.height+"<br>Tipo: "+data.types[0].type.name+"<br>Peso: "+data.weight);
                            },
                            error: function(){
                                alert("No se ha podido obtener la información");
                            }
                        });
                    });
                });


            </script>

            
            </div>
            </div>
            <div class="grupo">
            <div class="right">
                <input type="text" name="name" id="nombre" placeholder="Nombre"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="text" name="last_name" id="last_name" placeholder="Apellido"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="text" name="user" placeholder="Usuario"><span class="barra"></span>
            </div>
            </div>
            <div class="grupo">
            <div class="right">
                <input type="text" name="phone" placeholder="Teléfono"><span class="barra"></span>
            </div>
            <div class="right">
                <input type="file" accept="image/*" name="imagen" class="inputfile" required><span class="barra"></span> 
                <label for="imagen">Imagen</label>
            </div>
            
            <div class="right-bottom">
                <input type="text" name="country" placeholder="Pais"><span class="barra"></span>
            </div>
            </div>
            <div class="grupo">
            <div class="right-bottom">
                <input type="email" name="email" placeholder="Email"><span class="barra"></span>   
                <span class="barra"></span>
            </div>
            <div class="right-bottom">

                <select name="cargo" class="selectpicker"  required data-show-subtext="true" data-live-search="true">
                    <option value='' selected="true">Seleccionar cargo</option>
                    <option value='Gerente'>Gerente</option>
                    <option value='Contador'>Contador</option>
                    <option value='Vendedor'>Vendedor</option>
                </select>  
                <span class="barra"></span>
            </div>

            <div class="right-bottom">
                <input type="text" onfocus="(this.type='date')" name="birth" placeholder="Nacimiento"><span class="barra"></span>
                <label for="birth">Fecha de cumpleaños</label>
            </div>
            </div>
            <div class="grupo">
            <div class="right-bottom">
                <input type="password" name="password" id="password" placeholder="Password"><span class="barra"></span>
            </div>
            <div class="right-bottom">
                <input type="password" name="confirm_password" id="name" placeholder="Repeat Password"><span class="barra"></span>
            </div>
            </div>
            <button type="submit" class="button" name="enter">Registrarse</button>
            <a class="button" href="/backend/index.php">Iniciar Sesion</a>
        </div>
    </form>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT'].'/backend/component/user/adm_user.php';
    ?>
</body>

</html>