<body>
    <form id="form" method="post" enctype="multipart/form-data">
        <div class="form">
            <h1>Registrarse</h1>
                <input type="text" name="nombre" placeholder="Nombre de la imagen">
                <input type="file" name="imagen"> 
            <button type="submit" class="button" name="enter">Registrarse</button>
        </div>
    </form>

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/backend/PHP_img.php';
?>