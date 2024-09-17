<?php include_once "ConexãoMysql.php"; ?>

<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Status');
            data.addColumn('number', 'Quantidade');

            <?php
                $query = "SELECT statu, COUNT(*) as quantidade FROM Cadastro GROUP BY statu";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $statu = $row['statu'];
                    $quantidade = $row['quantidade'];

                    // Adiciona uma linha para cada status
                    echo "data.addRow(['$statu', $quantidade]);";
                }
            ?>

            var options = {
                title: 'Estatísticas do Cadastro - Status',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div_statu'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div_statu" style="width: 450px; height: 500px;"></div>
</body>
</html>
