<!-- CRIANDO TELA DE LOGIN -->
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
            <h3 class="text-center">Login <br><br>
            <form method="post" action="ValidarLogin.php">
            <input type="text" name="usuario" placeholder="Digite seu usuário" class="form-control"><br>
            <input type="password" name="senha" placeholder="Digite sua senha" class="form-control"><br>
            <button type="submit" name="btnLogin" value="Acessar" class="btn btn-light" style="font-size: 16px;">Acessar</button> <br> <br>
            <p style="font-size: 14px;">Esqueceu sua senha ou usuário? <a href="LoginCadastrar.php?id" style="font-size: 15px;">Clique aqui!</a></p>
            <p style="font-size: 14px;">Criar um novo cadastro <a href="LoginCadastrar.php?id" style="font-size: 15px;">Clique aqui!</a></p>
            </h3>
        </div>
    </body>
</html>


        