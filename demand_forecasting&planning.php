<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, actual_demand, forecasted_demand, planned_production FROM demand_forecasting 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$actual = [];
$forecast = [];
$planned = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $actual[] = (int) $row['actual_demand'];
    $forecast[] = (int) $row['forecasted_demand'];
    $planned[] = (int) $row['planned_production'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demand Forecasting & Planning</title>
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
            <li><a href="demand_forecasting.php">Forecast</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan perbandingan permintaan aktual, forecast, dan produksi rencana dalam bentuk grafik batang.</p>

    <!-- Chart -->
    <div id="demand-bar-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:30px;">
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Actual Demand:
<?php print_r($actual); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Forecasted Demand:
<?php print_r($forecast); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Planned Production:
<?php print_r($planned); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('demand-bar-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Demand Forecasting & Planning 2024'
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
        shared: true
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Actual Demand',
        data: <?= json_encode($actual) ?>,
        color: 'blue'
    }, {
        name: 'Forecasted Demand',
        data: <?= json_encode($forecast) ?>,
        color: 'gold'
    }, {
        name: 'Planned Production',
        data: <?= json_encode($planned) ?>,
        color: 'green'
    }]
});
</script>

</body>
</html>
