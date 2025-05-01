<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, on_time, late, pending FROM delivery_performance 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$onTime = [];
$late = [];
$pending = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $onTime[] = (int)$row['on_time'];
    $late[] = (int)$row['late'];
    $pending[] = (int)$row['pending'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Performance & Status</title>
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
            <li><a href="delivery_performance.php">Delivery</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan performa pengiriman berdasarkan ketepatan dan status per bulan di tahun <?= $tahun ?>.</p>

    <!-- Chart -->
    <div id="delivery-performance-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
        <pre style="flex:1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
On Time:
<?php print_r($onTime); ?>
        </pre>
        <pre style="flex:1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Late:
<?php print_r($late); ?>
        </pre>
        <pre style="flex:1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Pending:
<?php print_r($pending); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('delivery-performance-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Delivery Performance & Status - <?= $tahun ?>'
    },
    subtitle: {
        text: 'Jumlah pengiriman berdasarkan status tiap bulan'
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
            text: 'Jumlah Pengiriman'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' pengiriman'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'On Time',
        data: <?= json_encode($onTime) ?>,
        color: 'green'
    }, {
        name: 'Late',
        data: <?= json_encode($late) ?>,
        color: 'gold'
    }, {
        name: 'Pending',
        data: <?= json_encode($pending) ?>,
        color: 'red'
    }]
});
</script>

</body>
</html>
