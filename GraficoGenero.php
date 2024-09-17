<?php include_once "ConexãoMysql.php"; ?>

<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Gênero');
            data.addColumn('number', 'Quantidade');

            <?php
                $query = "SELECT genero, COUNT(*) as quantidade FROM Cadastro WHERE genero IN ('Feminino', 'Masculino') GROUP BY genero";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $genero = $row['genero'];
                    $quantidade = $row['quantidade'];

                    // Adiciona uma linha para cada gênero
                    echo "data.addRow(['$genero', $quantidade]);";
                }
            ?>

            var options = {
                title: 'Estatísticas do Cadastro - Gênero',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_genero'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div_genero" style="width: 450px; height: 500px;"></div>
</body>
</html>



