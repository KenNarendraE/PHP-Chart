<?php
include 'koneksi.php';

$bulan = 'Apr';
$tahun = 2024;

$query = "SELECT nama_barang, stock_saat_ini, reorder_point, minimum_stock 
          FROM stock_reorder 
          WHERE bulan = '$bulan' AND tahun = $tahun";
$result = mysqli_query($koneksi, $query);

$barang = [];
$stock = [];
$rop = [];
$minstock = [];

while ($row = mysqli_fetch_assoc($result)) {
    $barang[] = $row['nama_barang'];
    $stock[] = (int)$row['stock_saat_ini'];
    $rop[] = (int)$row['reorder_point'];
    $minstock[] = (int)$row['minimum_stock'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Reorder Point</title>
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
            <li><a href="stock_reorder_point.php">Reorder Point</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan posisi stok dibandingkan dengan Reorder Point (ROP) untuk setiap item bulan <?= $bulan ?> <?= $tahun ?>.</p>

    <!-- Grafik -->
    <div id="reorder-point-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Barang:
<?php print_r($barang); ?>
        </pre>
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Stock:
<?php print_r($stock); ?>
        </pre>
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
ROP:
<?php print_r($rop); ?>
        </pre>
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Minimum Stock:
<?php print_r($minstock); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('reorder-point-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Stock Reorder Point - <?= $bulan ?> <?= $tahun ?>'
    },
    xAxis: {
        categories: <?= json_encode($barang) ?>,
        crosshair: true,
        title: {
            text: 'Nama Barang'
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
        valueSuffix: ' unit'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Stock Saat Ini',
        data: <?= json_encode($stock) ?>,
        color: 'blue'
    }, {
        name: 'Reorder Point',
        data: <?= json_encode($rop) ?>,
        color: 'gold'
    }, {
        name: 'Minimum Stock',
        data: <?= json_encode($minstock) ?>,
        color: 'red'
    }]
});
</script>

</body>
</html>
