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

if($userDetails->puesto != "Alumno"){
	header("location: vis.modificarMaestra.php?IdUsuario=".$uid);
}

if (isset($_POST['confirm']))
{
    $codigo=$_POST['codigo'];
	$nombre = $_POST['nombre'];
	$grado = $_POST['grado'];
	if(strlen(trim($codigo))>0 && strlen(trim($nombre))>0 && strlen(trim($grado))>0)
	{
		if($grado != "Grado"){
			$errorMsgReg= $userClass->actualizar($codigo, $nombre, $grado, $uid);
			echo '<div class="modiBx">';
			echo '<h2>Modificación realizada correctamente</h2>';
			echo '<a href="vis.informacion.php?IdUsuario='.$uid.'"><i class="fas fa-arrow-left"></i></a>';
			echo '</div>';
		}
		else{
			$errorMsgReg = "<h2>Por favor seleccione una de las opciones del grado</h2>";
		}
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
    <link rel="stylesheet" href="css/modificar.css">
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
    <title>Modificar informacion</title>
</head>
<body>
<section>
        <div class="imgBx">
            <img src="img/carousel-1.jpg" alt="">

        </div>
        <div class="contentBx">
            <div class="formBx">
<?php
	if(!isset($_POST['confirm'])){
?>
<form method="post" action="vis.modificar.php?IdUsuario=<?php echo $uid; ?>" name="signup" id="content" enctype="multipart/form-data">
			<h2>Modificar información de <?php echo $userDetails->NombreUsuario; ?> </h2>

			<div class="inputBx">
			<span>Nombre completo</span>
			<input type="text" name="nombre"  placeholder="nombre completo" autocomplete="off" value="<?php echo $userDetails->NombreUsuario; ?>" required/><br>
			<div class="underline"></div>
             </div>

			 <div class="inputBx">
			 <span>Código</span>
            <input type="text" name="codigo"  placeholder="Codigo" autocomplete="off" value="<?php echo $userDetails->CodigoUsuario; ?>" required/><br>
            <div class="underline"></div>
             </div>

			 <div class="inputBx" id="select">
			<select name="grado" required>
                        <option <?php if($userDetails->Grado == "Kinder 4") echo 'selected' ?>>Kinder 4</option>
                        <option <?php if($userDetails->Grado == "Kinder 5") echo 'selected' ?>>Kinder 5</option>
                        <option <?php if($userDetails->Grado == "Kinder 6") echo 'selected' ?>>Kinder 6</option>
            </select>
			<br>
			</div>

			<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
            <a id="modiContra" href="vis.password.php?IdUsuario=<?php echo $uid; ?>">Modificar contraseña</a><br>
			<input type="submit" name="confirm" value="Aplicar cambios" id="confirmBtn"><a id="btnBack" href="vis.informacion.php?IdUsuario=<?php echo $uid; ?>"><i class="fas fa-arrow-left"></i></a><br>
		</form>
	<?php
	}
	?>
</body>
</html>
