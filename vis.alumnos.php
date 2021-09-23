<?php

	require_once('Controlador/tabla.php');

	$accion = $_GET['accion'];

	if(isset($_POST['submit'])){
		$IdUsuario = $_POST['IdUsuario'];
		$leccion = $_POST['leccion'];
		$userClass = new UserClass();
		if($leccion != "Lecciones"){
			$userClass->asignar($IdUsuario, $leccion);
		}
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/progreso.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" href="recursos/icon.png" sizes="16x16"/>
		<title>Alumnos</title>
	</head>
	<body>
	<nav class="navbar navbar-light bg-light fixed-top" id="nav">
  <div class="container-fluid">
    <a href="dashboard-maestra.php"><img src="img/logoPrin.png" alt="Logo de ABC-kids" id="logoPrin"></a>
    <button id="boton-nav" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span id="rayitas" class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ABC-Kids</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="controlador/salir.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</nav>
<div class="container-fluid" id="contenedor">
<?php
		if(isset($_GET['filtro'])){
			echo '<div class="modiBx">';
			echo '<h2>No se han encontrado resultados para el filtro solicitado</h2>';
			echo '<a href="vis.alumnos.php?accion='.$accion.'"><i class="fas fa-arrow-left"></i></a>';
			echo '</div>';
		}
		else{
	?>
		<form action="vis.alumnos.php?accion=<?php echo $accion;?>" name="fmrFiltro" method="post" id="form-filtro">
					<div id="select">
						<select name="filtro" id="filtro">
						<option value="Ninguno">Seleccione un grado</option>
						<option value="Kinder 4">Kinder 4</option>
						<option value="Kinder 5">Kinder 5</option>
						<option value="Kinder 6">Kinder 6</option>
				</select>
					</div>

			<input type="submit" name="filtrar" id="btnFiltro" value="Filtrar">
		</form>

		<?php if ($accion == "l"){
			echo '<h1 id="titulo1">Asignar<span> lecciones</span></h1>';
		} ?>
		<?php if ($accion == "p"){
			echo '<h1 id="titulo1">Progreso de<span> los alumnos </span></h1>';
		} ?>

						<?php if(isset($_POST['filtrar'])){
												if($_POST['filtro'] != "Ninguno"){
														echo '<h1 id="titulo1"> de '.$_POST['filtro'].'</h1>';
												}
										}
						?>
				 <div id="tabla">
		<table>
			<?php
				if($accion == "l"){

 			?>

				 <tr id="titulos">
					<th>Alumno</th>
 					<th>Sección</th>
 					<th>L. actual</th>
 					<th>Progreso</th>
 					<th>L. asignada</th>
				</tr>


			<?php
			}
			else if($accion == "p"){
			?>

					<tr id="titulos">
						<th>Alumno</th>
						<th>Sección</th>
						<th>L. actual</th>
						<th>Progreso</th>
						<th></th>
					</tr>


				</div>
			 </div>
			<?php
			}
			?>
			<?php
				if(!isset($_POST['filtrar'])){
					GenerarTabla($accion, "Ninguno");
				}
				else{
					$filtro = $_POST['filtro'];
					GenerarTabla($accion, $filtro);
				}
 			?>
		</table>
		<?php } ?>
	</body>
</html>
