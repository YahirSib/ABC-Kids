<?php
require_once('Modelo/Class.conexion.php');
require_once('Modelo/Class.usuario.php');
require_once('Controlador/leccion.php');
session_start();
if(!isset($_SESSION['IdUsuario'])){
    header("location: index.html");
}
$uid = $_SESSION['IdUsuario'];
$UserClass = new UserClass();
$UserDetails = $UserClass->rango($uid);
if($UserDetails->LeccionAsignada != ""){
  $leccion = leccion($UserDetails->LeccionAsignada);
  $url = url($UserDetails->LeccionAsignada,$UserDetails->completas);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="recursos/icon.png" sizes="16x16"/>
    <title>ABC-Kids</title>
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
        </ul>
      </div>
    </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</nav>
<div class="container-fluid" id="principal">
  <div class="contenedor-caja">
      <h1>Bienvenido</h1>
      <h3><?php echo $UserDetails->NombreUsuario; ?></h3>
      <div class="caja1-borde">
        <div class="caja1">
          <?php
          if($UserDetails->LeccionAsignada == ""){
           echo "<br><img src='img/correctas.png' id='imgGood'><br><h3>Estás al día con tus lecciones</h3><br><br>";
          }
          else{
            echo "<h2>Lección de hoy</h2><p>".$leccion."</p>";
          ?>
          <div class="caja-boton">
            <a href=<?php echo $url . "?link=true"; ?>>Comenzar</a>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
  </div>
</div>
<footer>
  <div class="footer-content">
      <h3>ABC-Kids ®</h3>
      <p>¡Aprende a leer divirtiéndote!</p>
      <ul class="socials">
          <li><a href="https://www.facebook.com/donbosco.elsalvador"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/donboscosv"><i class="fa fa-twitter"></i></a></li>
          <li><a href="mailto:donbosco@cdb.edu.sv"><i class="far fa-envelope"></i></a></li>
          <li><a href="https://www.instagram.com/donboscosv/"><i class="fab fa-instagram"></i></a></li>
          <li><a href="https://www.youtube.com/user/DonBoscoSAL"><i class="fab fa-youtube"></i></a></li>
      </ul>
  </div>
</footer>
</body>
</html>
