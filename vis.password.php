<?php 
    require_once('Modelo/Class.usuario.php');
    require_once('Modelo/Class.conexion.php');
    $id = $_GET['IdUsuario'];
    $userClass = new userClass();
    $userDetails = $userClass->rango($id);

    if(isset($_POST['confirm'])){
        $contra1 = $_POST['password1'];
        $contra2 = $_POST['password2'];
        if($contra1 == $contra2){
            $userClass->modificarContra($contra1, $id);
            echo '<div class="modiBx">';
            echo '<h2>La contraseña ha sido actualizada correctamente</h2>';
            echo '<a href="vis.modificar.php?IdUsuario='.$id.'"><i class="fas fa-arrow-left"></i></a>';
            echo '</div>';
        }
        else{
            echo '<div><h2>Las contraseñas ingresadas no coinciden</h2></div>';
            echo '<a href="vis.password.php?IdUsuario='.$id.'">Volver a intentarlo</a>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Modificar contraseña</title>
	<link rel="stylesheet" href="css/contraseña.css">
    <link rel="icon" type="image/png" href="recursos/icon.png" sizes="16x16"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/550843a4c7.js" crossorigin="anonymous"></script>
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
<form method="post" action="vis.password.php?IdUsuario=<?php echo $id; ?>" name="signup" id="content" enctype="multipart/form-data">
			<h2>Cambio de contraseña de <?php echo $userDetails->NombreUsuario; ?> </h2>
			
            <div class="inputBx">
            <span>Nueva contraseña</span>
            <input type="text" name="password1"  placeholder="Nueva contraseña" autocomplete="off" required/><br>
            <div class="underline"></div>
                    </div>

            <div class="inputBx">
            <span>Confirmar contraseña</span>      
            <input type="text" name="password2"  placeholder="Confirmar contraseña" autocomplete="off" required/><br>
                    </div>
            <div class="inputBx">
            <input type="submit" name="confirm" value="Aplicar cambios">
            </div>
</form>
	<?php
	}
	?>
    </section>
</body>
</html>