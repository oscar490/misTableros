
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tablero</title>
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
    </body>
</html>
