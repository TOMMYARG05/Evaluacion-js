<?php error_reporting(0);
include('db.php');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver Usuarios</title>
    </head>
    <body>
        <?php include('includes/header.php');
        ?>
        <div class="col-md-8">
            <card class="card" style="width:100%; margin-left:20%; margin-top:5%">
            <br>
            <h4 style="margin-left:40%;">Ver Usuarios</h4>
            <br>
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>correo</th>
                            <th>Opciones</th>
                        <tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM formulario";
                            $result_save = mysqli_query($conn, $query);    

                            while($row = mysqli_fetch_array($result_save)) { ?>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['usuario']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['dni']; ?></td>
                                <td><?php echo $row['correo']; ?></td>
                                <td>
                                <a href="edit.php?id=<?php echo $row['id']?>"  class="btn btn-warning" value="Update Device">
                                    <i class="fas fa-marker">Edit User</i>
                                </a>
                                <br>
                                <br>
                                <a href="delete.php?id=<?php echo $row['id']?>"   class="btn btn-danger" value="Delete Device">
                                    <i class="far fa-trash-alt">Delete User</i>
                                </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </card>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
