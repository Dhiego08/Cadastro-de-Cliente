<?php include_once "ConexãoMysql.php";?>


<?php
    $usuario_f = $_POST['usuario'];
    $senha_f = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $senha_confirmacao = password_hash($_POST['senha_confirmacao'], PASSWORD_DEFAULT);

    // Adiciona a confirmação de senha
    if ($_POST['senha'] !== $_POST['senha_confirmacao']) {
        echo "<script>alert('As senhas não coincidem!'); window.location = 'LoginCadastar.php'</script>";
        exit();
    }

    $sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario_f'";
    $result = mysqli_query($con, $sql);

    while ($linha = mysqli_fetch_assoc($result)){
        $usuario = $linha['usuario'];
    }

    if ($usuario === $usuario_f){
        echo "<script>alert('Usuário já existe!'); window.location = 'LoginCadastar.php'</script>";
        exit();
    } else {
        $sql2 = "INSERT INTO Usuarios (usuario, senha) VALUES ('$usuario_f', '$senha_f')";
        mysqli_query($con, $sql2);
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location = 'Index.php'</script>";
        exit();
    }
?>
