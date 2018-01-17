<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Equipo</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
        require 'funciones.php';

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $pdo = iniciar();

        $filas = getTableros($id, $pdo);

        var_dump($id);
        $consulta = $pdo->prepare("SELECT nombre
                                     FROM equipos
                                    WHERE id = :id");
        $consulta->execute([':id'=>$id]);

        $nombre = $consulta->fetch()['nombre'];

        ?>
        <h1><?= $nombre ?></h1>


        <div class='contenedor'>
            <?php foreach ($filas as $valor): ?>
                <a href="tablero.php?id=<?= $valor['id'] ?>">
                <div class='tablero'>
                    <?= $valor['nombre'] ?>
                </div>
                </a>
            <?php endforeach?>
        </div>






    </body>
</html>
