<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, target, pencapaian FROM sales_performance 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$target = [];
$pencapaian = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $target[] = (int) $row['target'];
    $pencapaian[] = (int) $row['pencapaian'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Performance</title>
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
    <p>Menampilkan performa penjualan bulanan berdasarkan target dan pencapaian.</p>

    <!-- Chart -->
    <div id="sales-performance-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output (sejajar dan di tengah) -->
    <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
        <pre style="background: #f8f9fa; border: 1px solid #ccc; padding: 10px; max-width: 300px;">
Target:
<?php print_r($target); ?>
        </pre>
        <pre style="background: #f8f9fa; border: 1px solid #ccc; padding: 10px; max-width: 300px;">
Pencapaian:
<?php print_r($pencapaian); ?>
        </pre>
    </div>
</div>

<!-- Highcharts -->
<script>
Highcharts.chart('sales-performance-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Sales Performance'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Penjualan (Juta IDR)'
        }
    },
    series: [{
        name: 'Target Penjualan',
        data: <?= json_encode($target) ?>,
        color: 'blue'
    }, {
        name: 'Pencapaian Penjualan',
        data: <?= json_encode($pencapaian) ?>,
        color: 'green'
    }]
});
</script>

</body>
</html>
