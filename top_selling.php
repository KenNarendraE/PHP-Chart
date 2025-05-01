<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT nama_produk, jumlah_terjual FROM top_selling WHERE tahun = $tahun ORDER BY jumlah_terjual DESC";
$result = mysqli_query($koneksi, $query);

$produk = [];
$jumlah = [];

while ($row = mysqli_fetch_assoc($result)) {
    $produk[] = $row['nama_produk'];
    $jumlah[] = (int)$row['jumlah_terjual'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Selling Products/Services</title>
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
            <li><a href="top_selling.php">Top Selling</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Produk/layanan terlaris berdasarkan jumlah unit yang terjual</p>
    
    <!-- Chart -->
    <div id="top-selling-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output Sejajar -->
    <div style="display:flex; gap:20px; margin-top:30px;">
        <pre style="flex:1; background:#f1f1f1; border:1px solid #ccc; padding:10px;">
Produk:
<?php print_r($produk); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; border:1px solid #ccc; padding:10px;">
Jumlah Terjual:
<?php print_r($jumlah); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('top-selling-chart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Top Selling Products/Services'
    },
    xAxis: {
        categories: <?= json_encode($produk) ?>,
        title: {
            text: 'Produk / Layanan'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Terjual'
        }
    },
    series: [{
        name: 'Unit Terjual',
        data: <?= json_encode($jumlah) ?>,
        color: 'blue'
    }]
});
</script>

</body>
</html>
