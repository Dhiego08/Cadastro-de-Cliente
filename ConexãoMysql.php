<?php
$servidor = "localhost";
$username = "root";
$password = "diego238563";
$database = "Sistema_de_Gerenciamento";

$con = mysqli_connect($servidor, $username, $password, $database);

if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
