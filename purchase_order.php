<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, orders_created, orders_completed FROM purchase_order_tracking 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$created = [];
$completed = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $created[] = (int)$row['orders_created'];
    $completed[] = (int)$row['orders_completed'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order Tracking</title>
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
            <li><a href="purchase_order_tracking.php">PO Tracking</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menunjukkan jumlah pesanan pembelian (Purchase Orders) yang dibuat dan diselesaikan selama periode waktu tertentu (per bulan)</p>
    
    <div id="purchase_order" style="width:100%; height:400px;"></div>

    <!-- Debug Output Sejajar -->
    <div style="display:flex; gap:20px; margin-top:30px; flex-wrap: wrap;">
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Orders Created:
<?php print_r($created); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Orders Completed:
<?php print_r($completed); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('purchase_order', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Purchase Order Tracking'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah Pesanan'
        }
    },
    series: [{
        name: 'Orders Created',
        data: <?= json_encode($created) ?>,
        color: 'blue'
    }, {
        name: 'Orders Completed',
        data: <?= json_encode($completed) ?>,
        color: 'red',
        dashStyle: 'Dash'
    }]
});
</script>

</body>
</html>
