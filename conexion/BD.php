<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graficas";
$con = mysqli_connect($servername, $username, $password, $dbname) or die("Conexion fallida: " . mysqli_connect_error());
$con-> set_charset("utf8");
if (mysqli_connect_errno()) {
    printf("La conexion ha fallado: %s\n", mysqli_connect_error());
    exit();
}






?>
