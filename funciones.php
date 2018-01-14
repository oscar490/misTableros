
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
