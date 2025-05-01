<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, turnover_ratio FROM inventory_turnover 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$ratio = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $ratio[] = (float)$row['turnover_ratio'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Turnover Ratio</title>
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
            <li><a href="inventory_turnover.php">Turnover</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan rasio perputaran persediaan (Inventory Turnover) per bulan tahun 2024.</p>

    <!-- Chart -->
    <div id="inventory-turnover-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
        <pre style="flex: 1; background: #f9f9f9; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex: 1; background: #f9f9f9; padding: 10px; border: 1px solid #ccc;">
Turnover Ratio:
<?php print_r($ratio); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('inventory-turnover-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Inventory Turnover Ratio 2024'
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
            text: 'Turnover Ratio'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
        pointFormat: '<span style="color:{series.color}">●</span> {series.name}: <b>{point.y} kali</b><br/>',
        shared: true
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Inventory Turnover',
        data: <?= json_encode($ratio) ?>,
        color: '#17a2b8'
    }]
});
</script>

</body>
</html>
