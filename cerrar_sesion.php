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

session_destroy();
header("Location:index.html");

?>
