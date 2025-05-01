<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, cycle_time FROM order_fulfillment 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$cycle_time = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $cycle_time[] = (float)$row['cycle_time'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Fulfillment Cycle Time</title>
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
            <li><a href="#">Reports</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan rata-rata waktu pemenuhan pesanan (dalam hari) tiap bulan selama tahun <?= $tahun ?>.</p>

    <!-- Chart -->
    <div id="order-fulfillment-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
        <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Cycle Time:
<?php print_r($cycle_time); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('order-fulfillment-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Order Fulfillment Cycle Time - <?= $tahun ?>'
    },
    subtitle: {
        text: 'Rata-rata waktu dari pesanan masuk hingga pengiriman selesai'
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
            text: 'Cycle Time (Hari)'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' hari'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y} hari'
            }
        }
    },
    series: [{
        name: 'Cycle Time',
        data: <?= json_encode($cycle_time) ?>,
        color: '#20c997'
    }]
});
</script>

</body>
</html>
