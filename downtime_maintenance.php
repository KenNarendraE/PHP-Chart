<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, downtime_jam, jumlah_maintenance FROM downtime_maintenance 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$downtime = [];
$maintenance = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $downtime[] = (int) $row['downtime_jam'];
    $maintenance[] = (int) $row['jumlah_maintenance'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downtime & Maintenance - Line Chart</title>
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
            <li><a href="downtime_maintenance.php">Downtime</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan tren downtime dan aktivitas maintenance tiap bulan 2024.</p>

    <div id="line-chart-downtime-maintenance" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display:flex; gap:20px; margin-top:30px; flex-wrap:wrap;">
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Downtime (jam):
<?php print_r($downtime); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Jumlah Maintenance:
<?php print_r($maintenance); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('line-chart-downtime-maintenance', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Downtime & Maintenance Tracking - 2024'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        shared: true,
        crosshairs: true
    },
    series: [{
        name: 'Downtime (jam)',
        data: <?= json_encode($downtime) ?>,
        color: 'red',
        marker: {
            symbol: 'circle'
        }
    }, {
        name: 'Jumlah Maintenance',
        data: <?= json_encode($maintenance) ?>,
        color: 'blue',
        marker: {
            symbol: 'square'
        }
    }]
});
</script>

</body>
</html>
