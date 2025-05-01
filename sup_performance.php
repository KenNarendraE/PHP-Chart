<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT nama_supplier, on_time_delivery, quality_rating FROM supplier_performance 
          WHERE tahun = $tahun 
          ORDER BY nama_supplier ASC";
$result = mysqli_query($koneksi, $query);

$suppliers = [];
$onTime = [];
$quality = [];

while ($row = mysqli_fetch_assoc($result)) {
    $suppliers[] = $row['nama_supplier'];
    $onTime[] = (float) $row['on_time_delivery'];
    $quality[] = (float) $row['quality_rating'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Performance Analysis</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <h1 class="logo">MyWebsite</h1>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Charts</a></li>
            <li><a href="supplier_performance.php">Supplier</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Grafik ini membandingkan dua metrik utama performa supplier</p>
    
    <div id="sup_performance" style="width:100%; height:400px;"></div>

    <!-- Debug Output Sejajar -->
    <div style="display:flex; gap:20px; margin-top:30px;">
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Supplier:
<?php print_r($suppliers); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
On-time Delivery (%):
<?php print_r($onTime); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Quality Rating:
<?php print_r($quality); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('sup_performance', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Supplier Performance Analysis'
    },
    xAxis: {
        categories: <?= json_encode($suppliers) ?>,
        title: {
            text: 'Supplier'
        }
    },
    yAxis: {
        title: {
            text: 'Performance Metrics'
        }
    },
    series: [{
        name: 'On-time Delivery (%)',
        data: <?= json_encode($onTime) ?>,
        color: 'darkgreen'
    }, {
        name: 'Quality Rating (1-5)',
        data: <?= json_encode($quality) ?>,
        color: 'gold',
        dashStyle: 'Dash'
    }]
});
</script>

</body>
</html>
