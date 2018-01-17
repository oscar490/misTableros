<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8' />
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="estilos.css">

		<script src='jquery-3.2.1.js'></script>

		</head>
		<body>
		<?php
			require 'funciones.php';

			$pdo = iniciar();
			$nombre = filter_input(INPUT_GET, 'nombre');
			$equipo = filter_input(INPUT_GET, 'equipo');

			if (count($_GET) != 0) {
				if ($nombre === null) {
					addEquipo($equipo, $pdo);
				} else  {
					addTablero($equipo, $nombre, $pdo);
					$id = getTablero($nombre, $pdo);

				}
				// header("Location: tablero.php?id=$id");
			}

			$consulta = $pdo->query("SELECT * FROM equipos");
			$filas = $consulta->fetchAll();

			foreach ($filas as $valor) {
				$equipos[] = [
					'nombre' => $valor['nombre'],
					'id'=> $valor['id'],
				];
			}


			foreach ($equipos as $valor):

				$tabs = getTableros($valor['id'], $pdo);


		?>
				<p>
					<?= $valor['nombre'] ?>
					<a href="equipo.php?id=<?= $valor['id']?>">Tableros</a>
				</p>
					<div class="contenedor">
						<?php foreach ($tabs as $v): ?>
							<a href="tablero.php?id=<?= $v['id'] ?>">
								<div class='tablero'>
									<?= $v['nombre'] ?>
								</div>
							</a>
						<?php endforeach; ?>
						<div id='tablero_crear' >
							Crear un tablero nuevo...
						</div>
					</div>
					<div id='formulario'>
						<form>
							Nombre <input type='text' name='nombre'>
							<input type='hidden' name='equipo' value="<?= $valor['nombre'] ?>">
							<input type='submit' value='Crear' id='crear'>
						</form>
					</div>

			<?php endforeach ?>

			<div id='crear_equipo'>
				<div >
					Crear equipo nuevo ...
				</div>
				<div id='formulario'>
					<form>
						Nombre <input type='text' name='equipo'>
						<input type='submit' value='Crear' id='crear'>
					</form>
				</div>
			</div>

			<script src='aplicacion.js'></script>
		</body>

	</html>
