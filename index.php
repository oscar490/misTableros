<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8' />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" href="estilos.css">

		<script src='jquery-3.2.1.js'></script>
		<script src='aplicacion.js'></script>
		</head>
		<body>
		<?php
			require 'funciones.php';

			$pdo = iniciar();
			$nombre = filter_input(INPUT_GET, 'nombre');
			if (count($_GET) != 0) {
				addTablero($nombre, $pdo);
				$id = getTablero($nombre, $pdo);
				header("Location: tablero.php?id=$id");
			}

			$consulta = $pdo->query("SELECT * FROM tableros");
			$filas = $consulta->fetchAll();

		?>

			<div class="contenedor">
				<?php foreach ($filas as $valor): ?>
					<a href="tablero.php?id=<?= $valor['id'] ?>">
						<div class='tablero'>
							<?= $valor['nombre'] ?>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
			<div id='formulario'>
				<form>
					Nombre <input type='text' name='nombre'>
					<input type='submit' value='Crear' id='crear'>
				</form>
			</div>

			<input type="button" name="" value="Crear tablero ...">



		</body>

	</html>
