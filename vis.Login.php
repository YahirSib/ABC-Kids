<?php
require_once('Controlador/login.php');

$errorMsgLogin='';

if (!empty($_POST['loginSubmit']))
{
	$codigo=$_POST['codigo'];
	$password=$_POST['password'];
	if(strlen(trim($codigo))>1 && strlen(trim($password))>1 )
	{
		$errorMsgLogin = login($codigo,$password);
	}else{
		$errorMsgLogin= "<h2>Por favor llene los campos</h2>";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
	  <!-- Bootstrap CSS -->
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" type="image/png" href="recursos/icon.png" sizes="16x16"/>
	<script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid" id="contenedor">
		<div id="contenedor-formulario">
			<div id="caja-fondo">
			<img src='img/fondo-login.jpg' alt="Fondo de niños con tablet" id="fondo-login">
			<img src="img/logoPrin.png" alt="Logo de ABC-Kids" id="logo-login">
			<p id="circulo"><i class="fas fa-chevron-down"></i></p>
			</div>

	<form method="post" action="vis.login.php" id="content" name="login">
			<h1 class="head">Inicio de sesión</h1>
			<input type="text" class="texto" id="txtusername" placeholder="👤 | Carnet de estudiante" name="codigo" autocomplete="off"/>
			<input type="password" class="texto" id="password" placeholder="🔒 | Contraseña" name="password" autocomplete="off"/>
			<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
			<input type="submit" class="button" name="loginSubmit" value="Ingresar">
			<p>¿Eres un docente? Inicia sesión <a id="enlace" href="vis.loginMaestra.php">aquí</a></p>
	</form>
	</div>
	</div>

</body>
</html>
