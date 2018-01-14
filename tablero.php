
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tablero</title>
        <link rel="stylesheet" href="estilos.css">
        <script src='jquery-3.2.1.js'></script>
        <script src='aplicacion.js'>

        </script>
    </head>
    <body>
        <?php
        require 'funciones.php';

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $pdo = iniciar();

        $consulta = $pdo->prepare("SELECT nombre
                                   FROM tableros
                                   WHERE id = :id");

        $consulta->execute([':id'=>$id]);
        $nombre = $consulta->fetch()['nombre'];

        ?>

        <h1><?= $nombre ?></h1>
        <div class="contenedor">

        </div>
        <div id='formulario'>
            <form>
                Nombre <input type='text' name='nombre'>
                <input type='submit' value='Crear' id='crear'>
            </form>
        </div>
        <input type="button" name="" value="Añadir lista ...">

        <a href='index.php'>Volver</a>
    </body>
</html>
