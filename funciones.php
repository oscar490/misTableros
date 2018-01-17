
<?php

function iniciar()
{
    $pdo = new PDO('pgsql:host=localhost;dbname=misTableros','misTableros',
        'misTableros');

    return $pdo;
}

function addTablero($nombre, $pdo)
{
    $insert = $pdo->prepare("INSERT INTO tableros (nombre)
                   VALUES (?)");

    $insert->execute([$nombre]);
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

function getTableros($nombre, $pdo)
{


    $consulta = $pdo
    ->prepare("SELECT t.id, t.nombre
                 FROM (tableros t
                 JOIN equipos_tableros et
                   ON t.id = et.tablero_id)
                 JOIN equipos e
                   ON e.id = et.equipo_id
                WHERE e.nombre = :nombre
                ");

    $consulta->execute([':nombre'=>$nombre]);

    return $consulta->fetchAll();
}
