<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, revenue, expenses FROM financial_forecast 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$bulanLabels = [];
$revenueActual = [];
$expensesActual = [];
$profitActual = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $revenueActual[] = (int)$row['revenue'];
    $expensesActual[] = (int)$row['expenses'];
    $profitActual[] = (int)$row['revenue'] - (int)$row['expenses'];
}

// Forecast: 3 bulan ke depan berdasarkan persentase kenaikan
$forecastMonths = ['Jan+1', 'Feb+1', 'Mar+1'];
$lastRevenue = end($revenueActual);
$lastExpenses = end($expensesActual);

$revenueForecast = [
    round($lastRevenue * 1.05),
    round($lastRevenue * 1.10),
    round($lastRevenue * 1.15)
];

$expensesForecast = [
    round($lastExpenses * 1.04),
    round($lastExpenses * 1.08),
    round($lastExpenses * 1.12)
];

$profitForecast = [];
foreach ($revenueForecast as $i => $rev) {
    $profitForecast[] = $rev - $expensesForecast[$i];
}

$allMonths = array_merge($bulanLabels, $forecastMonths);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Forecasting</title>
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
            <li><a href="financial_forecast.php">Forecast</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Grafik ini menampilkan data keuangan aktual dan proyeksi keuangan untuk bulan mendatang.</p>
    <div id="financial-forecast-chart" style="width:100%; height:400px;"></div>

    <!-- DEBUG OUTPUT -->
    <div style="display:flex; gap:20px; margin-top:20px;">
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Revenue:
<?php print_r($revenueActual); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Expenses:
<?php print_r($expensesActual); ?>
        </pre>
        <pre style="flex:1; background:#f1f1f1; padding:10px; border:1px solid #ccc;">
Profit:
<?php print_r($profitActual); ?>
        </pre>
    </div>
</div>

<!-- Highcharts -->
<script>
Highcharts.chart('financial-forecast-chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Financial Forecasting (Aktual & Prediksi)'
    },
    xAxis: {
        categories: <?= json_encode($allMonths) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Juta IDR)' }
    },
    series: [{
        name: 'Revenue (Actual)',
        data: <?= json_encode($revenueActual) ?>,
        color: '#28a745'
    }, {
        name: 'Expenses (Actual)',
        data: <?= json_encode($expensesActual) ?>,
        color: '#dc3545'
    }, {
        name: 'Profit (Actual)',
        data: <?= json_encode($profitActual) ?>,
        color: '#ffc107'
    }, {
        name: 'Revenue (Forecast)',
        data: <?= json_encode($revenueForecast) ?>,
        color: '#28a745',
        dashStyle: 'ShortDash'
    }, {
        name: 'Expenses (Forecast)',
        data: <?= json_encode($expensesForecast) ?>,
        color: '#dc3545',
        dashStyle: 'ShortDash'
    }, {
        name: 'Profit (Forecast)',
        data: <?= json_encode($profitForecast) ?>,
        color: '#ffc107',
        dashStyle: 'ShortDash'
    }]
});
</script>

</body>
</html>
