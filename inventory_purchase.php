<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, purchased, used FROM inventory_purchase 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$purchased = [];
$used = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $purchased[] = (int)$row['purchased'];
    $used[] = (int)$row['used'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Purchase Trends</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <h1 class="logo">Inventory Purchase Trends</h1>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Charts</a></li>
            <li><a href="inventory_purchase_trends.php">Inventory</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menunjukkan tren pembelian dan penggunaan inventaris selama periode waktu tertentu.</p>

    <!-- Chart -->
    <div id="inventory_purchase" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Inventory Purchased:
<?php print_r($purchased); ?>
        </pre>
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Inventory Used:
<?php print_r($used); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('inventory_purchase', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Inventory Purchase Trends'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Inventaris'
        }
    },
    series: [{
        name: 'Inventory Purchased',
        data: <?= json_encode($purchased) ?>,
        color: 'green'
    }, {
        name: 'Inventory Use',
        data: <?= json_encode($used) ?>,
        color: 'gold',
        dashStyle: 'Dash'
    }]
});
</script>

</body>
</html>
