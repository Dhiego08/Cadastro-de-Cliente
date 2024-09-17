<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login do Sistema</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/signin.css">
        
    </head>
    <body>
        <div> 
            <div class="container">
                <div class="form-signin" style="background: whit;">
                    <h3 class="text-center"><img src="Imagens/Imagem.jpg" width="300" height="300"> <br>
                    <h3 class="text-center">Cadastrar Login <br><br>
                    <form method="post" action="Novo_Usuario.php">
                        <input type="text" name="usuario" placeholder="Digite seu novo usuário" class="form-control"><br>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua nova senha" class="form-control">
                        <!-- Adiciona campo de confirmação de senha -->
                        <input type="password" name="senha_confirmacao" placeholder="Confirme sua senha" class="form-control"><br>
                        <!-- Adiciona olho para mostrar/esconder a senha -->
                        <input type="checkbox" onclick="mostrarSenha()"> Mostrar Senha<br><br>
                        <button type="submit" name="btnLogin" value="Cadastrar" class="btn btn-light" style="font-size: 16px;">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Adiciona script para mostrar/esconder a senha -->
        <script>
    // Esta linha define uma função chamada mostrarSenha.
    function mostrarSenha() {
        // Esta linha obtém o elemento HTML com o id "senha" e armazena na variável x.
        var x = document.getElementById("senha");
        
        // Esta linha verifica se o tipo do elemento com id "senha" é "password".
        if (x.type === "password") {
            // Se o tipo for "password", muda para "text" para tornar a senha visível.
            x.type = "text";
        } else {
            // Se o tipo não for "password", muda para "password" para ocultar a senha.
            x.type = "password";
        }
    }
        </script>
    </body>
</html>
