<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, supply, demand FROM supply_demand 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$supply = [];
$demand = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $supply[] = (int)$row['supply'];
    $demand[] = (int)$row['demand'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply & Demand Alignment</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <h1 class="logo">Business Chart</h1>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Charts</a></li>
            <li><a href="supply_demand.php">Supply & Demand</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan perbandingan antara pasokan dan permintaan tiap bulan pada tahun 2024.</p>

    <!-- Chart -->
    <div id="supply-demand-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Supply:
<?php print_r($supply); ?>
        </pre>
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Demand:
<?php print_r($demand); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('supply-demand-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Supply & Demand Alignment - 2024'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Unit'
        }
    },
    tooltip: {
        shared: true,
        headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
        pointFormat: '<span style="color:{series.color}">●</span> {series.name}: <b>{point.y} unit</b><br/>'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Supply',
        data: <?= json_encode($supply) ?>,
        color: 'green'
    }, {
        name: 'Demand',
        data: <?= json_encode($demand) ?>,
        color: 'red'
    }]
});
</script>

</body>
</html>
