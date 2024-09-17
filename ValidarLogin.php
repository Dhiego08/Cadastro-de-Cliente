
<?php include_once "ConexãoMysql.php";?>
<?php
    session_start();
    
    $usuario_f = $_POST['usuario'];
    $senha_f = $_POST['senha'];
    
    $sql = "SELECT * FROM Usuarios WHERE BINARY usuario = '$usuario_f'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $linha = mysqli_fetch_assoc($result);
        $senha = $linha['senha'];
        
        if (password_verify($senha_f, $senha)) {
            $_SESSION['usuario'] = $linha['usuario'];
            header("Location: Home.php");
            exit();
        } else {
            echo "<script>alert('Senha incorreta'); window.location.href='Index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Usuário incorreto'); window.location.href='Index.php';</script>";
        exit();
    }
?>

