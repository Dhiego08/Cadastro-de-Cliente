<!-- CRIANDO UM ARQUIVO DE EDITAR -->
<!DOCTYPE html>
<html>
    <head>
        <title>Editar Dados</title>
    </head>
<body>

<script>
    function alterar(){
        if (confirm("Deseja realmente atualizar o cadastro?")) {
            // Verifica se todos os campos obrigatórios foram preenchidos
            var inputs = document.querySelectorAll('input[required], select[required]');
            for (var i = 0; i < inputs.length; i++) {
                if (!inputs[i].value) {
                    alert("Por favor, preencha todos os campos obrigatórios.");
                    return false;
                }
            }
            document.forms[0].submit();
        } else {
            return false;
        }
    }
</script>

<!-- VINCULANDO O BANCO DE DADOS COM O ARQUIVO EDITAR.PHP -->
<?php
include_once "ConexãoMysql.php";

$id = $_GET['id'];
$sql = "SELECT * FROM Cadastro WHERE id=$id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $linha = mysqli_fetch_assoc($result);
    $data = date('d/m/Y', strtotime($linha['data_cadastro'])); // Converte a data para o formato brasileiro
    $nome = $linha['nome'];
    $genero = $linha['genero'];
    $responsavel = $linha['responsavel'];
    $cpf = $linha['cpf']; // Mudei de cnpj para cpf
    $rg = $linha['rg'];
    $endereco = $linha['endereco'];
    $num = $linha['num'];
    $numcomp = $linha['numcomp'];
    $bairro = $linha['bairro'];
    $cidade = $linha['cidade'];
    $estado = $linha['estado'];
    $celular =$linha['celular'];
    $email = $linha['email'];
    $statu = $linha['statu'];

} else {
    
}

mysqli_close($con);
?>

<!-- VINCULANDO O ARQUIVO TOP.PHP COM O ARQUIVO EDTAR.PHP. -->
<div class="container-fluid">
    <?php include_once "Top.php";?>
    
    <div class="navigation-links">
        <a href="Home.php?id"><i class="btn btn-primary"> Página Inicial <i class="bi bi-house-door-fill"></i> </i></a>  <br> <br>  
        <a href="Lista_Cadastro.php?id"><i class="btn btn-warning">lista de Cadastro <i class="bi bi-pencil-square"></i> </i></a>  
    </div>

    <!-- CRIANDO A ESTRUTURA DO ARQUIVO EDITAR. -->
    <br> <br> <br>
    <form action="Atualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form col-md-2">
            Data: <input class="form-control" type="text"  name="data_cadastro" id="data_cadastro" value="<?php echo $data; ?>" required><br>
        </div>

        <div class="form col-md-6">
            Nome: <input class="form-control" type="text" name="nome" required maxlength="150" value="<?php echo $nome; ?>"><br>
        </div>

        <div class="form col-md-2">
            <label>Gênero</label>
            <select class="form-control"  name="genero" required maxlength="150" required>
            <option value=""></option>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
            </select>
        </div>

        <div class="form col-md-5">
            Responsável pela alteração: <input class="form-control" type="text"  name="responsavel" required  value="<?php echo $responsavel; ?>"><br>
        </div>

        <!-- Adicionei o atributo 'required' ao campo CPF -->
        <div class="form col-md-2">
            CPF: <input class="form-control" type="text"  name="cpf" id="cpf" value="<?php echo $cpf; ?>" required><br>
        </div>  

        <div class="form col-md-2">
            RG: <input class="form-control" type="text" name="rg" id="rg" required value="<?php echo $rg; ?>"><br>
        </div>

        <div class="form col-md-5">
            Endereço: <input class="form-control" type="text" name="endereco" required value="<?php echo $endereco; ?>"><br>
        </div>

        <div class="form col-md-1">
            Número: <input class="form-control" type="text" name="numero" value="<?php echo $num; ?>"><br>
        </div>

        <div class="form col-md-1">
            Complemento: <input class="form-control" type="text" name="numcomp" value="<?php echo $numcomp; ?>"><br>
        </div>

        <div class="form col-md-5">
            Bairro: <input class="form-control" type="text" name="bairro" value="<?php echo $bairro; ?>"><br>
        </div>

        <div class="form col-md-4">
            Cidade: <input class="form-control" type="text" name="cidade" value="<?php echo $cidade; ?>"><br>
        </div>

        <div class="form col-md-2">
            Estado: <input class="form-control" type="text" name="estado" value="<?php echo $estado; ?>"><br>
        </div>

        <div class="form col-md-2">
            Celular: <input class="form-control" type="text" name="celular" id="celular" value="<?php echo $celular; ?>"><br>
        </div>

        <div class="form col-md-4">
            E-mail: <input class="form-control" type="text" name="email" value="<?php echo $email; ?>"><br>
        </div>

        <div class="form col-md-2">
            <label>Status</label>
            <select class="form-control"  name="statu" maxlength="150" required>
            <option value=""></option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
            </select>
            <br><br>
        </div>

        <div class="form col-md-10">
            <input  onclick="return alterar();" type="submit" value="Salvar" class="btn btn-primary" class="bi bi-floppy"></i>
        </div>
    </form>
</div>

</body>
</html>
