<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT kategori, jumlah FROM expense_breakdown WHERE tahun = $tahun";
$result = mysqli_query($koneksi, $query);

$data = [];
$colors = ['blue', 'green', 'orange', 'red', 'gray']; // pakai nama warna

$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'name' => $row['kategori'],
        'y'    => (int)$row['jumlah'],
        'color' => $colors[$i % count($colors)]
    ];
    $i++;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Breakdown</title>
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
    <p>Menampilkan pembagian pengeluaran berdasarkan kategori utama.</p>
    
    <!-- Container Chart -->
    <div id="expense-breakdown-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="margin-top: 20px;">
        <h3>Debug Output:</h3>
        <pre style="background: #f8f9fa; border: 1px solid #ddd; padding: 15px; overflow-x: auto;">
<?php print_r($data); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('expense-breakdown-chart', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Expense Breakdown'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Pengeluaran',
        colorByPoint: true,
        data: <?= json_encode($data) ?>
    }]
});
</script>

</body>
</html>
