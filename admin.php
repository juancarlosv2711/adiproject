<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if($varsesion == null || $varsesion =='' ){
    echo'<script type="text/javascript">
        alert("Por Favor Inicie Sesión");
        </script>';
    echo ("<script>location.href='index.html'</script>");
    die();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="estilosadmi.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!---------Ajax---------->
    <script type="text/javascript" src="funcionesadmi.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>
    <!---------Ajax---------->

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href=""></a>
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="cargarlistauser.php">Lista Usuarios<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="PresentarVideos()">Eliminar Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="Guardararchivo()">Guardar Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="GuardarVideo()">Guardar Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="Guardarenlace()">Guardar Enlaces</a>
                    </li>

                </ul>


                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a>
                    </li>
                </ul>


            </div>
        </nav>
    </header>
    <br>
    <div class="container">
        <div id="Datos">

        </div>
    </div>
    <script src="confirmacion.js"></script>
</body>

</html>
