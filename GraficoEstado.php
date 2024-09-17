<?php include_once "ConexãoMysql.php"; ?>

<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Estado');
                data.addColumn('number', 'Quantidade');

                <?php
                    $query = "SELECT estado, COUNT(*) as quantidade FROM Cadastro GROUP BY estado";
                    $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($result)) {
                        $estado = $row['estado'];
                        $quantidade = $row['quantidade'];

                        // Adiciona uma linha para cada estado
                        echo "data.addRow(['$estado', $quantidade]);";
                    }
                ?>

                var options = {
                    title: 'Estatísticas do Cadastro - Estado',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('chart_div_estado'));
                chart.draw(data, options);
        }
        </script>
    </head>
<body>
    <div id="chart_div_estado" style="width: 450px; height: 500px;"></div>
</body>
</html>

