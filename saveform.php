<?php include('db.php');

if (isset($_POST['save_user'])) {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    
    $query = "INSERT INTO formulario(usuario, nombre , dni, correo) VALUES ('$usuario', '$nombre', '$dni','$correo')";
    $result = mysqli_query($conn ,$query);
    
    if (!$result) {
        die('No se Guardo el usuario');
    }
    $SESSION['message'] = 'Usuario Guardado con Exito';
    $SESSION['message_type'] = 'success';

    header('Location: ver.php');
    
}
?>