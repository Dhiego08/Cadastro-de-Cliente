
<?php include_once "Sessao.php";?>

    <!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estatistica</title>
        
        <!-- Links para importação de bibliotecas e estilos externos -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <!-- Estilos personalizados -->

    
        <style>
            body {
                margin-top: 0px;
                padding: 5;
                margin: 5;
                font-family: 'inter', sans-serif;
                align-items: center;
            }

            header {
                background-color: #000;
                padding: 1rem 5rem;
                display: flex;
                justify-content: space-between;
            }

            .nav-list ul {
                list-style-type: none;
                color: #fff;
                padding: 0;
                margin: 0;
                display: flex;
                align-items: center;
            }

            .nav-list ul {
                padding: 2;
                margin: 0;
                display: flex;
                flex-wrap: wrap;
            }

            .nav-item {
                margin: 0 10px;
            }

            .login-button {
                background-color: #0187a7;
                padding: 5px;
                border-radius: 5px;
                padding: 10px;
                margin: 30px;
            }

            .login button {
                color: #fff;
                font-weight: 300;
                font-size: 2.1rem;
            }

            .container {
                width: 100%;
                height: 80vh;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .form-image {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #fde3a7d7;
                padding: 5rem;
            }

            .form-image img {
                width: 35rem;
            }

            .form {
                width: 70%;
                justify-content: center;
                align-items: center;
                background-color: #fff;
                padding: 2rem;
            }

            .form-header h1::after {
                content: '';
                display: block;
                width: 5rem;
                height: 0.3rem;
                background-color: #6c63ff;
                margin: 0 auto;
                position: absolute;
                border-radius: 8px;
            }

            @media screen and (max-width: 1330px) {
                .form-image {
                    display: none;
                }
            }

            .chart-title {
                text-align: center;
                margin-bottom: 20px;
            }
        </style>


    </head>

<body>
    <!-- Cabeçalho -->
    <header>
        <!-- Lista de navegação -->
        <div class="nav-list">
            <ul>
                <img src="Imagens/Imagem.jpg" width="100" height="100;"> 
                <li class="nav-item">E-mail: Texv.LTDA@outlok.com</li>
                <li class="nav-item">Twiter: @Texv</li>
                <li class="nav-item">Instagram: @texv.soluções</li>
                <li class="nav-item">Soluções em desenvolvimento de sistema</li>
                <li class="nav-item">Whatsapp: (11) 94568-5268</li>
            </ul>
        </div>
        <!-- Botão de login -->
        <div class="login-button">
                <a href="Index.php?id" class="btn btn-danger">Sair <i class="bi bi-box-arrow-left"></i></a>
        </div>
    </header>
    <div>
      <?php include_once "Formulario_Pesquisa.php";?>
      </di>
    <!-- Contêiner principal -->
    <div class="container">
        <!-- Conteúdo principal -->
        <div class="content">
            <!-- Links de navegação -->
            <nav class="navigation">
                <ul>
                    <a href="Lista_Cadastro.php?id"><i class="btn btn-warning">lista de Cadastro <i class="bi bi-pencil-square"></i> </i></a>  
                    <a href="Cadastro.php?id" class="btn btn-danger">Novo Cadastro<i class="bi bi-window-stack"></i></i></a> 
                    
                </ul>
            </nav>
        
            <!-- Imagem no formulário -->
            <div class="form-image">
                <img src="Imagens/undraw_shopping_re_3wst.svg" alt="">
            </div>
        
            <!-- Formulário -->
            <div class="form">
                <div class="form-header">
                    <div class="title">
                        <h1>Demonstrativo de Cadastro de Clientes</h1>
                    </div>
                </div>
            </div>
            
            <!-- Gráficos lado a lado -->
            <div class="row">
                <!-- Gráfico de Gênero -->
                <div class="col-md-4">
                    <div class="chart-title">
                        <div>Gênero</div>
                    </div>
                    <?php include_once "GraficoGenero.php"; ?>
                </div>

                <!-- Gráfico de Estado -->
                <div class="col-md-4">
                    <div class="chart-title">
                        <div>Estado</div>
                    </div>
                    <?php include_once "GraficoEstado.php"; ?>
                </div>

                <!-- Gráfico de Status -->
                <div class="col-md-4">
                    <div class="chart-title">
                        <div>Status</div>
                    </div>
                    <?php include_once "GraficoStatu.php"; ?>
                </div>
            </div>
        </div>
    </div>
    
    

</body>
</html>
