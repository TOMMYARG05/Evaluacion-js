<?php include('db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Validación de Formulario con Javascript</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
            $usuario ="";
            $nombre = "";
            $dni="";
            $correo ="";

            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $query = "SELECT * FROM formulario WHERE $id=id";
                $result = mysqli_query ($conn ,$query);
                if (mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    $usuario = $row['usuario'];
                    $nombre = $row['nombre'];
                    $dni= $row['dni'];
                    $correo =$row['correo'];

                }
            }

            if (isset($_POST['update_user'])) {
                $id = $_GET['id'];
                $usuario = $_POST['usuario'];
                $nombre = $_POST['nombre'];
                $dni = $_POST['dni'];
                $correo = $_POST['correo'];

                $query = "UPDATE formulario set usuario = '$usuario' , nombre = '$nombre' , dni='$dni' , correo='$correo' WHERE $id=id";
                mysqli_query($conn , $query);
                $SESSION ['message'] = 'Device Updated';
                $SESSION ['message_type'] = 'warning';

                header('Location:ver.php');
            }
        ?>
        
	<?php include('includes/header.php'); ?>
	<main>
    <div class="card" style=" margin-left:50%; margin-top:5%; width:50rem;">
        <div class="card-body">
		<h4 style="margin-left:35%;">Guardar usuario</h4><hr>
          <form class="formulario" id="formulario" action="edit.php?id=<?php echo $_GET['id'];?> "method="POST">
			<!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El nombre solo puede contener letras</p>
			</div>

			<!-- Grupo: Dni -->
			<div class="formulario__grupo" id="grupo__dni">
				<label for="dni" class="formulario__label">dni</label>
				<div class="formulario__grupo-input">
					<input type="dni" class="formulario__input" name="dni" id="dni">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ea dni tiene que ser unicamente Numerico</p>
			</div>

			<!-- Grupo: Dni 2 -->
			<div class="formulario__grupo" id="grupo__dni2">
				<label for="dni2" class="formulario__label">Repetir dni</label>
				<div class="formulario__grupo-input">
					<input type="dni" class="formulario__input" name="dni2" id="dni2">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambos dni deben ser iguales.</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="panchovilla@gmail.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
            </div>
			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
			<hr>
			<hr>
			<hr>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<input class="btn btn-dark" name="update_user" style="width:100%;" type="submit" value="Save Product">
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</form>
         
        </div>
    </div>
		
	</main>

	<script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>