
<?php

function iniciar()
{
    $pdo = new PDO('pgsql:host=localhost;dbname=misTableros','misTableros',
        'misTableros');

    return $pdo;
}

function addTablero($equipo, $nombre, $pdo)
{
    $tablero = $pdo->prepare("INSERT INTO tableros (nombre)
                                  VALUES  (?)");

    $tablero->execute([$nombre]);

    $add = $pdo
        ->prepare("INSERT INTO equipos_tableros (equipo_id, tablero_id)
                   SELECT e.id, t.id FROM equipos e, tableros t
                    WHERE t.nombre = :nombre AND e.nombre = :equipo");
    $add->execute([':nombre'=>$nombre, ':equipo'=>$equipo]);

    // $insertEquipo = $pdo
    //         ->prepare("INSERT INTO equipos_tableros (equipo_id, tablero_id)
    //                         VALUES SELECT")
}

function getTablero($nombre, $pdo)
{
    $consulta = $pdo->prepare("SELECT id
                               FROM tableros
                               WHERE nombre = :nombre");

    $consulta->execute([':nombre'=>$nombre]);
    $id = $consulta->fetch()['id'];

    return $id;

}

function getTableros($id, $pdo)
{


    $consulta = $pdo
    ->prepare("SELECT t.*
                 FROM (tableros t
                 JOIN equipos_tableros et
                   ON t.id = et.tablero_id)
                 JOIN equipos e
                   ON e.id = et.equipo_id
                WHERE e.id = :id
                ");

    $consulta->execute([':id'=>$id]);

    return $consulta->fetchAll();
}

function addEquipo($equipo, $pdo)
{

    $sentencia = $pdo->prepare("INSERT INTO equipos (nombre)
                                VALUES (?)");
    var_dump($sentencia->execute([$equipo]));
}
