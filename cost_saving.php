<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, cost_saving, total_spend FROM cost_savings 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulan = [];
$savings = [];
$spend = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulan[] = $row['bulan'];
    $savings[] = (int)$row['cost_saving'];
    $spend[] = (int)$row['total_spend'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cost Savings & Spend Analysis</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <h1 class="logo">Cost Savings & Spend Analysis</h1>
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
    <p>Grafik ini memperlihatkan hubungan antara penghematan biaya (Cost Savings) dan total pengeluaran (Total Spend) selama periode waktu tertentu (per bulan).</p>
    
    <!-- Chart -->
    <div id="cost_saving" style="width:100%; height:400px;"></div>

    <!-- Debug Output -->
    <div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Bulan:
<?php print_r($bulan); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Cost Savings:
<?php print_r($savings); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Total Spend:
<?php print_r($spend); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('cost_saving', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Cost Savings & Spend Analysis'
    },
    xAxis: {
        categories: <?= json_encode($bulan) ?>,
        title: {
            text: 'Bulan'
        }
    },
    yAxis: {
        title: {
            text: 'Amount ($)'
        }
    },
    series: [{
        name: 'Cost Savings ($)',
        data: <?= json_encode($savings) ?>,
        color: 'darkgreen'
    }, {
        name: 'Total Spend ($)',
        data: <?= json_encode($spend) ?>,
        color: 'gold',
        dashStyle: 'Dash'
    }]
});
</script>

</body>
</html>
