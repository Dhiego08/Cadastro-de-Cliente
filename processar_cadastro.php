<?php
include_once "ConexãoMysql.php";

$data = $_POST['data_cadastro'];
$nome = $_POST['nome'];
$genero = $_POST['genero'];
$responsavel = $_POST['responsavel'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$endereco = $_POST['endereco'];
$num = $_POST['num'];
$numcomp = $_POST['numcomp'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$statu = $_POST['statu'];

// Verifica se o CPF já existe no banco de dados.
$checkCPFQuery = "SELECT cpf FROM Cadastro WHERE cpf='$cpf'";
$result = mysqli_query($con, $checkCPFQuery);

if (mysqli_num_rows($result) > 0) {
    
    // Se o CPF já existe, exibe um alerta e redireciona para a página anterior.
    echo "<script>alert('CPF já cadastrado!'); window.history.back();</script>";
} else 
    // Se o CPF não existe, insere os dados na tabela Cadastro.
    $sql = "INSERT INTO Cadastro (data_cadastro, nome, genero, responsavel, cpf, rg, endereco, num, numcomp, bairro, cidade, estado, celular, email, statu) 
    VALUES (STR_TO_DATE('$data', '%d/%m/%Y'), '$nome', '$genero', '$responsavel', '$cpf', '$rg', '$endereco', '$num', '$numcomp', '$bairro', '$cidade', '$estado', '$celular', '$email', '$statu')";

    // Após a execução do INSERT, adicione estas linhas
if (mysqli_query($con, $sql)) {
    $id = mysqli_insert_id($con);
    echo "<script>alert('Cadastro salvo com sucesso!'); window.location = 'Lista_Cadastro.php?id=$id';</script>";
} else {
    echo "Deu erro" . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
