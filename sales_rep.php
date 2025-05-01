<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT nama_sales, total_penjualan FROM sales_rep_performance WHERE tahun = $tahun ORDER BY total_penjualan DESC";
$result = mysqli_query($koneksi, $query);

$namaSales = [];
$totalSales = [];

while ($row = mysqli_fetch_assoc($result)) {
    $namaSales[] = $row['nama_sales'];
    $totalSales[] = (int)$row['total_penjualan'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Rep Performance</title>
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
            <li><a href="sales_rep_performance.php">Sales Rep</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Grafik ini menunjukkan kinerja perwakilan penjualan berdasarkan total penjualan yang mereka capai.</p>

    <div id="sales-rep-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output Sejajar -->
    <div style="display:flex; gap:20px; margin-top:30px;">
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Nama Sales:
<?php print_r($namaSales); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Total Penjualan:
<?php print_r($totalSales); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('sales-rep-chart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Sales Rep Performance'
    },
    xAxis: {
        categories: <?= json_encode($namaSales) ?>,
        title: {
            text: 'Sales Representatives'
        }
    },
    yAxis: {
        title: {
            text: 'Total Sales (in Juta IDR)'
        }
    },
    series: [{
        name: 'Total Sales',
        data: <?= json_encode($totalSales) ?>,
        color: 'blue'
    }]
});
</script>

</body>
</html>
