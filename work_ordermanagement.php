<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, completed, in_progress, pending, cancelled FROM work_order 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$completed = [];
$in_progress = [];
$pending = [];
$cancelled = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $completed[] = (int) $row['completed'];
    $in_progress[] = (int) $row['in_progress'];
    $pending[] = (int) $row['pending'];
    $cancelled[] = (int) $row['cancelled'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Order Management</title>
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
            <li><a href="work_order_management.php">Work Order</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan jumlah Work Order berdasarkan status tiap bulan tahun 2024.</p>

    <div id="work-order-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Completed:
<?php print_r($completed); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
In Progress:
<?php print_r($in_progress); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Pending:
<?php print_r($pending); ?>
        </pre>
        <pre style="flex:1; background:#f9f9f9; padding:10px; border:1px solid #ccc;">
Cancelled:
<?php print_r($cancelled); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('work-order-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Work Order Management - 2024'
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
            text: 'Jumlah Work Order'
        }
    },
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
        name: 'Completed',
        data: <?= json_encode($completed) ?>,
        color: 'green'
    }, {
        name: 'In Progress',
        data: <?= json_encode($in_progress) ?>,
        color: 'blue'
    }, {
        name: 'Pending',
        data: <?= json_encode($pending) ?>,
        color: 'yellow'
    }, {
        name: 'Cancelled',
        data: <?= json_encode($cancelled) ?>,
        color: 'red'
    }]
});
</script>

</body>
</html>
