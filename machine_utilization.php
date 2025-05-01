<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, utilization_rate FROM machine_utilization 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$utilization = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $utilization[] = (float)$row['utilization_rate'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Utilization Rate</title>
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
            <li><a href="machine_utilization.php">Utilization</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan persentase pemanfaatan mesin setiap bulan tahun 2024.</p>

    <div id="machine-utilization-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display:flex; gap:20px; margin-top:30px; flex-wrap:wrap;">
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Utilization Rate (%):
<?php print_r($utilization); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('machine-utilization-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Machine Utilization Rate 2024'
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
        max: 100,
        title: {
            text: 'Utilization (%)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat:
            '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}%</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Utilization Rate',
        data: <?= json_encode($utilization) ?>,
        color: 'blue'
    }]
});
</script>

</body>
</html>
