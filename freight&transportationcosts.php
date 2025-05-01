<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, biaya_pengiriman FROM freight_costs 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$biaya = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $biaya[] = (int)$row['biaya_pengiriman'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freight & Transportation Costs</title>
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
            <li><a href="freight_cost.php">Freight</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan total biaya pengiriman dan transportasi per bulan sepanjang tahun <?= $tahun ?>.</p>

    <!-- Grafik -->
    <div id="freight-cost-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
Biaya Pengiriman (juta):
<?php print_r($biaya); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('freight-cost-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Freight & Transportation Costs - <?= $tahun ?>'
    },
    subtitle: {
        text: 'biaya logistik per bulan'
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
            text: 'Biaya (juta Rupiah)'
        },
        labels: {
            formatter: function () {
                return 'Rp ' + this.value + ' jt';
            }
        }
    },
    tooltip: {
        shared: true,
        valuePrefix: 'Rp ',
        valueSuffix: ' jt'
    },
    plotOptions: {
        column: {
            grouping: true,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Biaya Pengiriman',
        data: <?= json_encode($biaya) ?>,
        color: 'lightblue'
    }]
});
</script>

</body>
</html>
