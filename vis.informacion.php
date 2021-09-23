<?php
	require_once('Modelo/Class.conexion.php');
	require_once('Modelo/Class.usuario.php');
	require_once('Controlador/leccion.php');
	$id = $_GET['IdUsuario'];
	$UserClass = new UserClass();
	$UserDetails = $UserClass->rango($id);
	$tiempo = round($UserDetails->tiempo / 60, 2);
	$minutos = round($UserDetails->tiempo / 60, 0);
	$segundos = ($tiempo - $minutos) * 60;
	$segundos = round($segundos,0);
	$porcentaje = ($UserDetails->completas*100) /5;

	if($minutos < 10){
		$minutos = "0".$minutos;
	}
	if($segundos < 10){
		$segundos = "0".$segundos;
	}


	if(isset($_GET['eliminar'])){
		$eliminar = $UserClass->eliminar($id);
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/infoalumno.css">
	<link rel="icon" type="image/png" href="recursos/icon.png" sizes="16x16"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
		<title>Información del alumno</title>
	</head>
	<?php
		if(isset($_GET['eliminar'])){
			if($eliminar)
				echo '<div id="container"><h2>El alumno ha sido eliminado correctamente</h2> <a href="vis.informacion.php"></div>';
			else
				echo '<div id="container"><h2>No se ha podido eliminar el alumno</h2></div>';
		}
		else{

	?>
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
				 <h1 id="titulo1">Alumno:</h1>
				 <h2 id="titulo2"><?php echo $UserDetails->NombreUsuario ?></h2>
				 <div id="tabla">
		<table>
			<tr id="titulos">
				<th>Grado</th>
				<th>Lecciones completadas</th>
				<th>Lección actual</th>
				<th>Porcentaje completado</th>
				<th>Tiempo demorado</th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td data-titulo="Grado:"><?php echo $UserDetails->Grado ?></td>
				<td data-titulo="Lecciones completadas:"><?php echo $UserDetails->totalCompletas ?></td>
				<td data-titulo="Lección actual:"><?php echo Leccion($UserDetails->Leccion); ?></td>
				<td data-titulo="Porcentaje completado:"><div class="progress">
						<div class="progress-bar" role="progressbar" style="width: <?php echo $porcentaje ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentaje ?></div>
						</div></td>
				<td data-titulo="Tiempo demorado:"><?php echo $minutos.":".$segundos ?></td>
				<td><a href="vis.informacion.php?eliminar=true&IdUsuario=<?php echo $id;  ?>"><i class="fas fa-trash"></i></a></td>
				<td><a href="vis.modificar.php?IdUsuario=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></td>
			</tr>
		</table>
</div>
</div>
	<?php
	 }
	?>
	</body>
</html>
