<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, kapasitas_terpakai FROM warehouse_capacity 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$kapasitas = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $kapasitas[] = (int)$row['kapasitas_terpakai'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Capacity Utilization</title>
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
            <li><a href="warehouse_capacity.php">Warehouse</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan persentase pemanfaatan kapasitas gudang per bulan selama tahun <?= $tahun ?>.</p>

    <!-- Chart -->
    <div id="warehouse-capacity-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
        <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex: 1; background: #f8f8f8; padding: 10px; border: 1px solid #ccc;">
Kapasitas Terpakai:
<?php print_r($kapasitas); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('warehouse-capacity-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Warehouse Capacity Utilization - <?= $tahun ?>'
    },
    subtitle: {
        text: 'Pemanfaatan kapasitas gudang dalam persen tiap bulan'
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
        max: 100,
        title: {
            text: 'Persentase Kapasitas Terpakai (%)'
        },
        labels: {
            format: '{value}%'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: '%'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}%'
            }
        }
    },
    series: [{
        name: 'Utilisasi Kapasitas Gudang',
        data: <?= json_encode($kapasitas) ?>,
        color: 'purple'
    }]
});
</script>

</body>
</html>
