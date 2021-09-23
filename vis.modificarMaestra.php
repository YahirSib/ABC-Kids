<?php
require_once('Modelo/class.usuario.php');
require_once('Modelo/Class.conexion.php');

$errorMsgReg='';
session_start();
if(!isset($_SESSION['IdUsuario'])){
    header("location: index.html");
}
$userClass = new userClass();
$uid = $_GET['IdUsuario'];
$userDetails = $userClass->rango($uid);
if (isset($_POST['confirm']))
{
    $codigo=$_POST['codigo'];
	$nombre = $_POST['nombre'];
	if(strlen(trim($codigo))>0 && strlen(trim($nombre))>0)
		{
			$errorMsgReg= $userClass->actualizarM($codigo, $nombre, $uid);
			echo '<div class="modiBx">';
			echo '<div><h2>Modificación realizada correctamente</h2></div>';
			echo '<a href="vis.maestras.php?IdUsuario='.$uid.'"><i class="fas fa-arrow-left"></i></a>';
			echo '</div>';
	}
	else{
		$errorMsgReg = "<h2>Por favor llene los campos</h2>";
	}
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
    <link rel="stylesheet" href="css/modificar-maestra.css">
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
    <title>Modificar informacion</title>
</head>
<body>

<section>

        <div class="contentBx">
            <div class="formBx">
<?php
	if(!isset($_POST['confirm'])){
?>
<form method="post" action="vis.modificarMaestra.php?IdUsuario=<?php echo $uid; ?>" name="signup" id="content" enctype="multipart/form-data">
			<h2>Modificar información de <?php echo $userDetails->NombreUsuario; ?> </h2>

			<div class="inputBx">
			<span>Nombre:</span>
			<input type="text" name="nombre"  placeholder="nombre completo" autocomplete="off" value="<?php echo $userDetails->NombreUsuario; ?>" required/><br>
			<div class="underline"></div>
             </div>


			 <div class="inputBx">
			<span>Código:</span>
			<input type="text" name="codigo"  placeholder="Codigo" autocomplete="off" value="<?php echo $userDetails->CodigoUsuario; ?>" required/><br>
			<div class="underline"></div>
             </div>
			<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
            <a id="modiContra" href="vis.password.php?IdUsuario=<?php echo $uid; ?>">Modificar contraseña</a><br><br>
			<input id="confirmBtn" type="submit" name="confirm" value="Aplicar cambios">
			<a id="btnBack" href="vis.maestras.php"><i class="fas fa-arrow-left"></i></a>
		</form>
	<?php
	}
	?>
	</div>
</div>
<div class="imgBx">
            <img src="img/maestros.jpg" alt="">

        </div>
	</section>
</body>
</html>
