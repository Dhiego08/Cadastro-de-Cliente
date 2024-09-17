<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planilha de Cadastro</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- VINCULANDO O BANCO DE DADOS COM O ARQUIVO PESQUISA.PHP -->
<?php 
    include_once "ConexãoMysql.php";

    //CRIANDO VARIAVEL PARA FAZER A PESQUISA DO BANCO DE DADOS DA TABELA CADASTRO, E FILTRANDO A PESQUISA DESEJADA NO ARQUIVO PESQUISA.PHP
    $busca = $_GET['busca'];
    $result_nomes = "select * from Cadastro where cpf like '%$busca%'";
    $resultado = mysqli_query($con, $result_nomes);
?>

<script>
    function deletar(){
        if (confirm("Deseja realmente excluir o cadastro?"))
            document.forms[0].submit();
          
        else
            return false
        
    }
</script>

<!-- VINCULANDO O ARQUIVO TOP.PHP COM O ARQUIVO PESQUISA.PHP  -->
<!-- CRIANDO LINK DE NAVEGAÇÃO PARA OUTRA JANELA --> 
<div  class= "container-fluid">
    <?php include_once "Top.php";?>
    <?php include_once "Formulario_Pesquisa.php";?>

    <a href="Lista_Cadastro.php?id"><i class="btn btn-warning">lista de Cadastro <i class="bi bi-pencil-square"></i> </i></a>  <br>   <br> 
    <a href="Home.php?id"><i class="btn btn-primary"> Página Inicial <i class="bi bi-house-door-fill"></i> </i></a>  <br> <br>  
    <br><br>
</div>
    

<!-- CRIANDO O CABEÇALHO DO ARQUIVO LISTA_CADASTRO.PHP -->
<div>
        <table class="excel-table">
            <thead>
                <tr> 
                    <th class="text-center">Id</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Gênero</th>
                    <th class="text-center">Responsável pelo cadastro</th>
                    <th class="text-center">CPF</th>
                    <th class="text-center">RG</th>
                    <th class="text-center">Endereço</th>
                    <th class="text-center">Número</th>
                    <th class="text-center">Bairro</th>
                    <th class="text-center">Cidade</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Opção</th>
                </tr>
            </thead>
    
    <!-- CRIANDO VARIAVEL ONDE CONSIGA CHAMAR AS INFORMAÇÕES DO BANCO DE DADOS E ATRIBUIR NO AQUIVO PESQUISA.PHP -->
    <!-- E CRIANDO LINK DE NAVEGAÇÃO PARA OUTRA JANELA --> 
        <?php
            while($linha = mysqli_fetch_array($resultado)){
                echo '<tr>
                            <td class="text-center">'.$linha['id'].'</td>
                            <td>'.$linha['data_cadastro'].'</td>
                            <td>'.$linha['nome'].'</td>
                            <td class="text-center">'.$linha['genero'].'</td>
                            <td>'.$linha['responsavel'].'</td>
                            <td>'.$linha['cpf'].'</td>
                            <td>'.$linha['rg'].'</td>
                            <td>'.$linha['endereco'].'</td>
                            <td>'.$linha['num'].'</td>
                            <td>'.$linha['bairro'].'</td>
                            <td>'.$linha['cidade'].'</td>
                            <td>'.$linha['estado'].'</td>
                            <td>'.$linha['celular'].'</td>
                            <td>'.$linha['email'].'</td>
                            <td>'.$linha['statu'].'</td>
                            <td>
                                <a href="Deletar.php?id='.$linha['id'].'" onclick="return deletar();"><i class="bi bi-trash3-fill"></i></a> | 
                                <a href="Editar.php?id='.$linha['id'].'"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>';
                }
            ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
