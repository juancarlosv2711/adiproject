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
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilosSubMenu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="cajadeherramientas.php" method="post">

            <div class="row">
                <div class="col-12">
                    <div id="titulo">
                        <h1>Seleccione la caja de herramientas de su interés</h1>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div id="ContenedorImg">
                        <figure>
                            <button type="submit" value="Legal" name="Tipo">
                                <img src="Imagenes/herrmienta2.jpeg" alt="">
                            </button>
                        </figure>
                        <h2>Legal</h2>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div id="ContenedorImg">
                        <figure>
                            <button type="submit" value="Financiero" name="Tipo">
                                <img src="Imagenes/herrmienta1.jpeg" alt="">
                            </button>
                        </figure>
                        <h2>Financiero</h2>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div id="ContenedorImg">
                        <figure>
                            <button type="submit" value="Diseño y Mercadeo" name="Tipo">
                                <img src="Imagenes/herrmienta4.jpeg" alt="">
                            </button>
                        </figure>
                        <h2>Diseño y Mercadeo</h2>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div id="ContenedorImg">
                        <figure>
                            <button type="submit" value="Administracion" name="Tipo">
                                <img src="Imagenes/herrmienta3.jpeg" alt="">
                            </button>
                        </figure>
                        <h2>Administración</h2>
                    </div>
                </div>
            </div>
        </form>


    </div>

</body>

</html>
