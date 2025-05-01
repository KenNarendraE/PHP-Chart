<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, defect_rate, yield_percentage, rework_count FROM quality_control_metrics 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$defect = [];
$yield = [];
$rework = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $defect[] = (float) $row['defect_rate'];
    $yield[] = (float) $row['yield_percentage'];
    $rework[] = (int) $row['rework_count'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Control Metrics - Bar Chart</title>
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
            <li><a href="quality_control_metrics.php">QC Metrics</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan metrik Quality Control per bulan dalam bentuk grafik batang.</p>

    <!-- Chart -->
    <div id="qc-bar-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Defect Rate (%):
<?php print_r($defect); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Yield (%):
<?php print_r($yield); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Rework Count:
<?php print_r($rework); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('qc-bar-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Quality Control Metrics - 2024'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        crosshair: true,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: [{
        min: 0,
        title: { text: 'Persentase (%)' },
        labels: { format: '{value}%' }
    }, {
        min: 0,
        title: { text: 'Jumlah Rework' },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: true,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Defect Rate (%)',
        data: <?= json_encode($defect) ?>,
        yAxis: 0,
        color: 'red'
    }, {
        name: 'Yield (%)',
        data: <?= json_encode($yield) ?>,
        yAxis: 0,
        color: 'green'
    }, {
        name: 'Rework Count',
        data: <?= json_encode($rework) ?>,
        yAxis: 1,
        color: 'blue'
    }]
});
</script>

</body>
</html>
