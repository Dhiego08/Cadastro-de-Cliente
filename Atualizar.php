<?php
include_once "ConexãoMysql.php"; // Inclui o arquivo de conexão com o banco de dados.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário após o envio (método POST).
    $id = $_POST['id']; // Obtém o valor do campo 'id'.
    $data = $_POST['data_cadastro']; // Obtém o valor do campo 'data_cadastro'.
    $nome = $_POST['nome']; // Obtém o valor do campo 'nome'.
    $genero = $_POST['genero']; // Obtém o valor do campo 'genero'.
    $responsavel = $_POST['responsavel']; // Obtém o valor do campo 'responsavel'.
    $cpf = $_POST['cpf']; // Obtém o valor do campo 'cpf'.
    $rg = $_POST['rg']; // Obtém o valor do campo 'rg'.
    $endereco = $_POST['endereco']; // Obtém o valor do campo 'endereco'.
    $numero = $_POST['numero']; // Obtém o valor do campo 'numero'.
    $numcomp = $_POST['numcomp']; // Obtém o valor do campo 'numcomp'.
    $bairro = $_POST['bairro']; // Obtém o valor do campo 'bairro'.
    $cidade = $_POST['cidade']; // Obtém o valor do campo 'cidade'.
    $estado = $_POST['estado']; // Obtém o valor do campo 'estado'.
    $celular = $_POST['celular']; // Obtém o valor do campo 'celular'.
    $email = $_POST['email']; // Obtém o valor do campo 'email'.
    $statu = $_POST['statu']; // Obtém o valor do campo 'statu'.
    
    // FAZENDO O UPDATE PARA O BANCO DE DADOS, OU SEJA, ATUALIZANDO OS DADOS NA TABELA CADASTRO DO BANCO DE DADOS.
    $sql = "UPDATE Cadastro SET
        data_cadastro = STR_TO_DATE('$data', '%d/%m/%Y'),
        nome='$nome',  
        genero='$genero', 
        responsavel='$responsavel', 
        cpf='$cpf', 
        rg='$rg', 
        endereco='$endereco', 
        num='$numero', 
        numcomp='$numcomp', 
        bairro='$bairro', 
        cidade='$cidade', 
        estado='$estado', 
        celular='$celular', 
        email='$email', 
        statu='$statu'
        WHERE id=$id"; // Monta a query de atualização com os valores recebidos do formulário.

    if (mysqli_query($con, $sql)) {
        // Se a query for executada com sucesso, exibe uma mensagem.
        echo "Dados atualizados com sucesso!";
        echo "<script>alert('Alterado com sucesso!'); window.location = 'Lista_Cadastro.php?id=$id';</script>";
    } else {
        // Se houver algum erro na execução da query, exibe uma mensagem de erro.
        echo "Erro ao atualizar dados: " . mysqli_error($con);
    }

    mysqli_close($con); // Fecha a conexão com o banco de dados.
}
?>
