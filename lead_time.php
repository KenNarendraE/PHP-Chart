<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, lead_time, on_time_delivery FROM lead_time_delivery 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$lead_time = [];
$on_time = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $lead_time[] = (int) $row['lead_time'];
    $on_time[] = (float) $row['on_time_delivery'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Time & Delivery Status</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <h1 class="logo">Lead Time & Delivery Status</h1>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php">Charts</a></li>
            <li><a href="lead_time_delivery.php">Lead Time</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Grafik ini menunjukkan dua metrik penting dalam logistik dan pengadaan</p>

    <!-- Chart -->
    <div id="lead_time" style="width:100%; height:400px;"></div>

    <!-- Debug Output Horizontal -->
    <div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Lead Time (Day):
<?php print_r($lead_time); ?>
        </pre>
        <pre style="flex:1; min-width:200px; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
On-Time Delivery (%):
<?php print_r($on_time); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('lead_time', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Lead Time & Delivery Status'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Metrik Kinerja'
        }
    },
    series: [{
        name: 'Lead Time (Day)',
        data: <?= json_encode($lead_time) ?>,
        color: 'blue'
    }, {
        name: 'On-Time Delivery (%)',
        data: <?= json_encode($on_time) ?>,
        color: 'red',
        dashStyle: 'Dash'
    }]
});
</script>

</body>
</html>
