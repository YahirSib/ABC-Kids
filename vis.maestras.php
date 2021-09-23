<?php

	require_once('Controlador/tablaMaestras.php');
	if(isset($_GET['eliminar'])){
		$id = $_GET['id'];
		$userClass = new userClass();
		$userClass->eliminar($id);
		echo '<div class="modiBx">';
		echo "<h2>Se ha eliminado exitosamente</h2>";
		echo "<a href='vis.maestras.php'><i class='fas fa-arrow-left'></i></a>";
		echo '</div>';
	}
	$uid = $_SESSION['IdUsuario'];
  $userClass = new userClass();
  $userDetails = $userClass->rango($uid);
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/maestras.css">
	<link rel="icon" type="image/png" href="img/icon.png">
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
    <title>Profesoras</title>
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
						<?php
	            if($userDetails->puesto == "Coordinadora"){
	               echo ' <li class="nav-item">
	                      <a class="nav-link active" aria-current="page" href="vis.maestras.php">Administrar maestras</a>
	                      </li>';
	            }
	          ?>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</nav>

<div class="container-fluid" id="contenedor">
	<h1 id="titulo1">Profesoras  registradas:</h1>
		<?php

		?>
		 <div id="tabla">
		<table>

			<tr id="titulos">
				<th>Nombre</th>
				<th>Código</th>
				<th>Puesto</th>
				<th></th>
				<th></th>
			</tr>

			<?php
				GenerarTabla();
 			?>
		</table>
</div>
		</div>
	</body>
</html>
