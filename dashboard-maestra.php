
<?php
  require_once("Modelo/class.conexion.php");
  require_once("Modelo/class.usuario.php");

  session_start();
  if(!isset($_SESSION['IdUsuario'])){
    header("location: index.html");
  }
  $uid = $_SESSION['IdUsuario'];
  $userClass = new userClass();
  $userDetails = $userClass->rango($uid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard-maestra.css">
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
    <title>Maestros</title>
</head>
<body>

<nav class="navbar navbar-light bg-light fixed-top" id="nav">
  <div class="container-fluid">
    <img src="img/logoPrin.png" alt="Logo de ABC-kids" id="logoPrin">
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
          <?php
            if($userDetails->puesto == "Coordinadora"){
               echo ' <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="vis.maestras.php">Administrar maestras</a>
                      </li>';
            }
          ?>
        </ul>
      </div>
    </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</nav>
<div class="container-fluid" id="cajas-container">
  <div class="card" style="width: 18rem;">
    <div class="estrellas">
      <img src="img/ico1.png" alt="alumno">
    </div>
      <div class="card-body">
        <span class="card-title">Agregar</span>
        <?php
          if($userDetails->puesto == "Coordinadora"){
             echo '<span class="card-title">maestra</span>';
          }else{
             echo '<span class="card-title">alumno</span>';
          }
        ?>
        <a href="vis.Registro.php" id="flecha"><i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <div class="estrellas">
        <img src="img/ico2.png" alt="Asignar lección">
      </div>
        <div class="card-body">
          <span class="card-title">Asignar</span>
          <span class="card-title">lección</span>

          <a href="vis.alumnos.php?accion=l" id="flecha"><i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <div class="estrellas">
         <img src="img/ico3.png" alt="Ver progreso de alumnos">
        </div>
          <div class="card-body">
            <span class="card-title">Ver progreso</span>
            <span class="card-title">de alumnos</span>
            <a href="vis.alumnos.php?accion=p" id="flecha"><i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
        </div>
</div>
</body>
</html>
