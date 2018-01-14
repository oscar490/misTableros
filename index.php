<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8' />
		<link rel="stylesheet" href="estilos.css">
		<script src='jquery-3.2.1.js'></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('div .tablero').on('click', function() {

				})

				function mostrarFormulario() {
					$('#formulario').fadeIn();
				}

				$('input').on('click', function() {
					mostrarFormulario();
				});

				$('#crear').on('click', function() {
					let nombre = $('input:text')[0].value;
					$('#formulario').fadeOut();

					let tablero = $(`<div>${nombre}</div>`);
					tablero.addClass('tablero');
					tablero.appendTo($(`.contenedor`));

				});

			})

		</script>
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
