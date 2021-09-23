<?php
require_once('Controlador/registro.php');
require_once('Modelo/Class.conexion.php');

$errorMsgReg='';
session_start();
if(!isset($_SESSION['IdUsuario'])){
    header("location: index.html");
}
$userClass = new userClass();
$uid = $_SESSION['IdUsuario'];
$userDetails = $userClass->rango($uid);
if (!empty($_POST['signupSubmit']))
{
    $codigo=$_POST['codigo'];
    $contrasena=$_POST['contrasena'];
	$puesto=$_POST['puesto'];
	$nombre = $_POST['nombre'];
	if($userDetails->puesto == "Maestra"){
		$grado = $_POST['grado'];
		$seccion = $_POST['seccion'];
	}
	else{
		$grado = "Maestra";
		$seccion = "";
	}
	if(strlen(trim($codigo))>0 && strlen(trim($contrasena))>0 && strlen(trim($puesto))>0 && strlen(trim($nombre))>0 && strlen(trim($grado))>0)
	{
		if($puesto != "Puesto"){
				if($grado != "Grado"){
					if($seccion != "Sección"){
						$errorMsgReg=registro($codigo,$contrasena,$puesto, $nombre, $grado, $seccion);
					}
					else{
						$errorMsgReg = "<h2>Por favor seleccione una de las opciones de sección</h2><a id='btn-regresar' href='vis.Registro.php'><i class='fas fa-arrow-circle-left'></i></a>";
					}
				}
				else{
					$errorMsgReg = "<h2>Por favor seleccione una de las opciones del grado</h2><a id='btn-regresar' href='vis.Registro.php'><i class='fas fa-arrow-circle-left'></i></a>";
				}
		}
		else{
			$errorMsgReg = "<h2>Por favor seleccione una de las opciones del puesto</h2><a id='btn-regresar' href='vis.Registro.php'><i class='fas fa-arrow-circle-left'></i></a>";
		}

	}
	else{
		$errorMsgReg = "<h2>Por favor llene los campos</h2><a id='btn-regresar' href='vis.Registro.php'><i class='fas fa-arrow-circle-left'></i></a>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registro</title>
	<link rel="icon" type="image/png" href="recursos/icon.png" sizes="16x16"/>
	<link rel="stylesheet" href="css/registro.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
<section>
        <div class="imgBx">
            <img src="img/carousel-1.jpg" alt="">

        </div>
        <div class="contentBx">
            <div class="formBx">
            <?php if(!isset($_POST['signupSubmit'])){?>
<form method="post" action="" name="signup" id="content" enctype="multipart/form-data">
<?php
            if($userDetails->puesto == "Maestra"){
            ?>
			<h2>Registrar nuevo alumno: </h2>
			<?php
            }
            else{
            ?>
            <h2>Registrar nuevo integrante: </h2>
            <?php
            }
            ?>
			<div class="inputBx">
                        <span>Nombre completo</span>
                        <input type="text" name="nombre" autocomplete="off" required /><br>
                        <div class="underline"></div>
                    </div>

			 <div class="inputBx">
                        <span>Código</span>
                        <input type="text" name="codigo" autocomplete="off" required /><br>
                    </div>

			<div class="inputBx">
            <span>Contraseña</span>
			<input type="password" name="contrasena" required autocomplete="off" /><br>
                    </div>


            <?php
            if($userDetails->puesto == "Maestra"){
            ?>
			<div class="inputBx" id="select">
			<select name="grado" required>
            		<option>Grado</option>
            		<option>Kinder 4</option>
            		<option>Kinder 5</option>
            		<option>Kinder 6</option>
            	</select>
            	<br>
			</div>
           	<div class="inputBx" id="select">
			<select name="seccion" required>
            		<option>Sección</option>
            		<option>A</option>
            		<option>B</option>
            		<option>C</option>
            	</select>
            	<br>
			</div>
            <?php
            }
            ?>
			<div class="inputBx" id="select">
			<select name="puesto" required>
			<option>Puesto</option>
			<?php if($userDetails->puesto == "Maestra"){ echo '<option>Alumno</option>'; }
			else{echo '<option>Maestra</option>';}?>
            </select>
			<br>
			</div>
			<div class="inputBx">

			<input type="submit" name="signupSubmit" value="Registrarse">
		</div>
		</section>
		</form>
		<?php }?>
		<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
</body>
</html>
