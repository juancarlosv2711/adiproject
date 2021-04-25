<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion == '') {
    echo '<script type="text/javascript">
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilosadmi.css">
</head>

<body>
    <div class="container-fluid" id="Datos">
        <div class="row align-items-start">
            <div class="col-auto">
                <br>
                <a href="exportar.php" class="myButton">Exportar a Excel</a>
                <br>
                <br>
            </div>
        </div>
        <div class="row">

            <div class="table-responsive-sm">

                <?php
                require('EnlaceBD.php');
                $Conn = new ConexionBD();
                $Apertura = $Conn->AperturaConexion();
                $Consulta = "CALL SelectUsuarios";
                $Resultado = mysqli_query($Apertura, $Consulta);
                echo '<table class="table" id="table2excel">';
                echo '<thead class="thead-dark">';
                echo '<tr>';
                echo '<th scope="col">Cedula</th>';
                echo '<th scope="col">Nombre</th>';
                echo '<th scope="col">Primer Apellido</th>';
                echo '<th scope="col">Telefono</th>';
                echo '<th scope="col">Correo Electronico</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($Resultado as $ver) {
                    echo '<tr>';
                    echo '<td>' . $ver["NumeroIdentificacion"] . '</td>';
                    echo '<td>' . $ver["Nombre"] . '</td>';
                    echo '<td>' . $ver["Apellido1"] . '</td>';
                    echo '<td>' . $ver["Telefono"] . '</td>';
                    echo '<td>' . $ver["CorreoElectronico"] . '</td>';
                }
                echo '</tbody>';
                echo '</table>';

                $Conn->CierreConexion();

                ?>

            </div>
        </div>
    </div>
</body>

</html>