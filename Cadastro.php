<?php include_once "Sessao.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
</head>
<body>
    
    <!-- VINCULANDO O ARQUIVO TOP.PHP, FORMULARIO_PESQUISA.PHP E BUSCAR_ENDERECO.PHP COM O ARQUIVO CADASTRO.PHP. -->
    <div class="container-fluid">
        
        <?php include_once "Top.php";?>
        <?php include_once "buscar_endereco.php";?>
        <?php include_once "Formulario_Pesquisa.php";?>
    </div>
        
     <!-- CRIANDO LINK DE NAVEGAÇÃO PARA OUTRA JANELA --> 
    <div class="navigation-links">
        <a href="Lista_Cadastro.php?id"><i class="btn btn-warning">lista de Cadastro <i class="bi bi-pencil-square"></i> </i></a>  <br>   <br> 
        <a href="Index.php?id"><i class="btn btn-danger">Sair <i  class="bi bi-box-arrow-left"></i> </i></a>
    </div>

        <br><br>

    <!-- CRIANDO A ESTRUTURA DO ARQUIVO CADASTRO.PHP -->
        <form method="post" action="processar_cadastro.php">
            <div class="form col-md-2">
                <label>Data:</label>
                <input class="form-control" type="text" name="data_cadastro" maxlength="15" value="<?php echo date('d/m/Y'); ?>" required>
            </div>

            <div class="form col-md-5">
                <label>Nome:</label>
                <input class="form-control" type="text" name="nome" maxlength="150" required>
            </div>

            <div class="form col-md-2">
                <label>Gênero</label>
                <select class="form-control"  name="genero" required maxlength="40" required>
                <option value=""></option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
                </select>
            </div>

            <div class="form col-md-4">
                <label>Responsável pelo cadastro:</label>
                <input class="form-control" type="text" name="responsavel" maxlength="150" >
            </div>

            <div class="form-group col-md-2">
                <label>CPF:</label>
                <input class="form-control" type="text" name="cpf" id="cpf" maxlength="14" required>
            </div>

            <div class="form-group col-md-2">
                <label>RG:</label>
                <input class="form-control" type="text" name="rg" id="rg" maxlength="13" required>
            </div>
            
            <div class="form col-md-2">
                <label>Cep:</label>
                <input class="form-control" type="text" name="cep" id="cep" maxlength="9" placeholder="Digite o cep a ser buscado." required onkeydown="if (event.keyCode === 13) buscarEndereco();">
            </div>
            
            <div class="form col-md-6">
                <label>Endereço:</label>
                <input class="form-control" type="text" name="endereco" id="endereco" maxlength="150">
            </div>

            <div class="form col-md-1">
                <label>Número:</label>
                <input class="form-control" type="text" name="num" maxlength="5" required >
            </div>

            <div class="form col-md-2">
                <label>Complemento:</label>
                <input class="form-control" type="text" name="numcomp" maxlength="5">
            </div>

            <div class="form col-md-5">
                <label>Bairro:</label>
                <input class="form-control" type="text" name="bairro" id="bairro" maxlength="100" >
            </div>

            <div class="form col-md-4">
                <label>Cidade:</label>
                <input class="form-control" type="text" name="cidade" id="cidade" maxlength="100" >
            </div>

            <div class="form col-md-2">
                <label>Estado:</label>
                <input class="form-control" type="text" name="estado" id="estado" maxlength="50" >
            </div>

            <div class="form col-md-2">
                <label>Celular:</label>
                <input class="form-control" type="text" name="celular" id="celular" maxlength="10">
            </div>

            <div class="form col-md-4">
                <label>E-mail:</label>
                <input class="form-control" type="text" name="email" maxlength="60">
            </div>

            <div class="form col-md-2">
                <label>Status</label>
                <select class="form-control"  name="statu" maxlength="150" required>
                    <option value=""></option>
                    <option value="Ativo">Ativo</option>
                    <option value="desativo">Desativo</option>
                </select>
                <br><br>
            </div>
            
            <div class="form col-md-10">
            <button class="btn btn-outline-secondary" type="submit">
             SALVAR <i class="bi bi-floppy-fill"></i>
            </button>
        </div>
    </div>
        </form>
    </div>

     <!-- CRIANDO UMA FUNÇÃO E VARIAVEIS PARA A BUSCA DE ENDEREÇO ATRAVES DO CEP -->
<script>
    function buscarEndereco() {
        // Obtém o valor do campo de input com id 'cep'
        var cep = document.getElementById('cep').value;

        // Substitui todos os caracteres não numéricos por uma string vazia
        cep = cep.replace(/\D/g, ''); // Remover caracteres não numéricos

        // Verifica se o CEP tem exatamente 8 dígitos
        if (cep.length == 8) {

            // Cria um novo objeto XMLHttpRequest para fazer requisições AJAX
            var xhr = new XMLHttpRequest();

            // Configura a requisição GET para o arquivo 'buscar_endereco.php' com o parâmetro 'cep'
            xhr.open('GET', 'buscar_endereco.php?cep=' + cep, true);

            // Define o que acontece quando a requisição está em andamento ou completa
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Converte a resposta JSON em um objeto JavaScript
                    var endereco = JSON.parse(xhr.responseText);

                    // Atualiza os campos de input com os dados do endereço
                    document.getElementById('endereco').value = endereco.logradouro;
                    document.getElementById('bairro').value = endereco.bairro;
                    document.getElementById('cidade').value = endereco.localidade;
                    document.getElementById('estado').value = endereco.uf;
                }
            };

            // Envia a requisição
            xhr.send();
        } else {
            // Se o CEP não tiver 8 dígitos, exibe um alerta
            alert('CEP inválido. Deve conter 8 dígitos.');
        }
    }
</script>

