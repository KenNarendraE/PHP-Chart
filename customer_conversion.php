<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, conversion_rate FROM customer_conversion 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$conversionRates = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $conversionRates[] = (float) $row['conversion_rate'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Conversion Rate</title>
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
    <p>Menampilkan tingkat konversi pelanggan setiap bulan.</p>
    
    <!-- Container Chart -->
    <div id="conversion-rate-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output (di tengah dan sejajar) -->
    <div style="margin-top: 20px; display: flex; justify-content: center;">
        <pre style="background:#f1f1f1; padding:10px; border:1px solid #ccc; max-width: 600px;">
Conversion Rate:
<?php print_r($conversionRates); ?>
        </pre>
    </div>
</div>

<!-- Highcharts Script -->
<script>
Highcharts.chart('conversion-rate-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Customer Conversion Rate'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Conversion Rate (%)' },
        labels: {
            format: '{value}%'
        }
    },
    series: [{
        name: 'Conversion Rate',
        data: <?= json_encode($conversionRates) ?>,
        color: 'green'
    }],
    tooltip: {
        valueSuffix: '%'
    }
});
</script>

</body>
</html>
