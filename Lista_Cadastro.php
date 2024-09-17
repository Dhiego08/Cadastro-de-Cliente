<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cadastro</title>
</head>
<body>
    <!-- VINCULANDO O BANCO DE DADOS COM O ARQUIVO INDEX.PHP -->
    <?php 
    include_once "ConexãoMysql.php";
    ?>

    <!-- CRIANDO UMA FUNÇÃO E CHAMANDO UMA VARIAVEL DELETAR. -->
    <script>
        function deletar(){
            if (confirm("Deseja realmente deletar esse cadastro?")) {
                document.forms[0].submit();
            } else {
                return false;
            }
        }
    </script>

    <!-- CRIANDO LINK DE NAVEGAÇÃO PARA OUTRA JANELA --> 
    <!-- VINCULANDO OS ARQUIVOS FORMULARIO_PESQUISA.PHP E TOP.PHP COM O ARQUIVO INDEX.PHP  -->
    <div class="container-fluid">
        <?php include_once "Sessao.php";?>
        <?php include_once "Top.php";?>
        <?php include_once "Formulario_Pesquisa.php";?>

        <a href="Home.php?id" class="btn btn-primary">Página Inicial <i class="bi bi-house-door-fill"></i></a><br><br>  
        <a href="Index.php?id" class="btn btn-danger">Sair <i class="bi bi-box-arrow-left"></i></a>
    </div>

    <br><br>
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
    
            <!-- CRIANDO VARIAVEL ONDE CONSIGA CHAMAR AS INFORMAÇÕES DO BANCO DE DADOS E ATRIBUIR NO AQUIVO INDEX.PHP -->
            <!-- E CRIANDO LINK DE NAVEGAÇÃO PARA OUTRA JANELA --> 
            <?php
                $result_nomes = "select * from Cadastro";
                $resultado = mysqli_query($con, $result_nomes);
                while($linha = mysqli_fetch_array($resultado)){
                    echo '<tr>
                            <td class="text-center">'.$linha['id'].'</td>
                            <td>'.date('d/m/Y', strtotime($linha['data_cadastro'])).'</td>
                            <td>'.$linha['nome'].'</td>
                            <td class="text-center">'.$linha['genero'].'</td>
                            <td>'.$linha['responsavel'].'</td>
                            <td>'.substr($linha['cpf'],0,7).'.***-**</td>
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
