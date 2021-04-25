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

require('enlacebd.php');
$Tipo=$_POST['Tipo'];

$Conn = new ConexionBD();
$Apertura = $Conn->AperturaConexion();
switch ($Tipo) {
    case "Legal":
        
        $ListVideos = "CALL SelectVideo('1')";
        $Resultado = mysqli_query($Apertura,$ListVideos);
        break;
    case "Financiero":
        $ListVideos = "CALL SelectVideo('2')";
        $Resultado = mysqli_query($Apertura,$ListVideos);
        break;
    case "Diseño y Mercadeo":
        $ListVideos = "CALL SelectVideo('3')";
        $Resultado = mysqli_query($Apertura,$ListVideos);
        break;
    case "Administracion":
        $ListVideos = "CALL SelectVideo('4')";
        $Resultado = mysqli_query($Apertura,$ListVideos);
        break;
}

 $Conn->CierreConexion();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="estilosh.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!----------Ajax------>
    <script type="text/javascript" src="funcionHe.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>

    <!------------------->

</head>

<body>

    <!---------------Inicio header ----------------------->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#"><img src="Imagenes/LogoPadi.png" width="55px" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $Tipo ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cerrar_sesion.php">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar">
                        <li><a href="https://www.facebook.com/adisr.org/" target="_blank"><img id="imgHeader" src="Imagenes/facebook2.ico" alt=""></a></li>
                        <li><a href="https://instagram.com/adisanrafael" target="_blank"><img id="imgHeader" src="Imagenes/Intagram2.ico" alt=""></a></li>
                        <li><a href="admin.html"></a></li>
                    </ul>
                </form>
            </div>
        </nav>
    </header>
    <!------------- Fin header ------------------------>

    <div class="container">
        <div class="row">

            <!---------------Inicio Carrusel ----------------------->
            <div class="col-sm-12 col-md-12">
                <div id="Contenedor">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <?php 
                        $i=0;
                        foreach($Resultado as $row)
                        {
                            $active='';
                            if($i == 0)
                            {
                                $active = 'active';
                            }
                        
                        ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo "$i"; ?>" class="<?php echo "$active"; ?>"></li>
                            <?php $i++; } ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php 
                        $i=0;
                        foreach($Resultado as $row)
                        {
                            $active='';
                            if($i == 0)
                            {
                                $active = 'active';
                            }
                        
                        ?>
                            <div class="carousel-item <?php echo "$active"; ?>">
                                <iframe id="Estilo_iframe" src="<?php echo "$row[URL]"; ?>" frameborder="0"></iframe>

                            </div>
                            <?php $i++;}  ?>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="" aria-hidden="true"><img src="Imagenes/Previous.ico" width="65px"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="" aria-hidden="true"><img src="Imagenes/next.ico" width="65px"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!------------- Fin Carrusel ------------------------>

        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 m-b=2">
                <h3><?php echo $Tipo; ?></h3>
            </div>
            <div class="col-sm-12 col-md-12 m-t=5">
                <button type="button" class="btn btn-danger" onclick="CargarDocumentos('<?php echo $Tipo ?>')">Descargables</button>
                <button type="button" id="enlace" class="btn btn-danger" onclick="CargarUrl('<?php echo $Tipo ?>')">Enlaces</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div id="Datos">

                </div>
            </div>
        </div>
    </div>

</body>

</html>
