
<!-- VINCULANDO O  BANCO DE DADOS COM ARQUIVO DELETAR.PHP -->
<?php
include_once "ConexãoMysql.php";

// CRIANDO UM ARQUIVO DE DELETAR
$id = $_GET['id'];
$sql = "delete from Cadastro where id='$id'";
if (mysqli_query($con, $sql)) {
    header ("location: Cadastro.php");

}else{
    echo ' Deu erro';
}
?>