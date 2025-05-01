<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, leads, qualified_leads, proposals, deals_closed, forecast 
          FROM sales_pipeline 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$leads = [];
$qualified = [];
$proposals = [];
$deals = [];
$forecast = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $leads[] = (int) $row['leads'];
    $qualified[] = (int) $row['qualified_leads'];
    $proposals[] = (int) $row['proposals'];
    $deals[] = (int) $row['deals_closed'];
    $forecast[] = (int) $row['forecast'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Pipeline & Forecasting</title>
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
    <p>Menampilkan Sales Pipeline & Forecasting per bulan.</p>

    <div id="sales-pipeline-chart" style="width:100%; height:500px;"></div>

    <!-- DEBUG OUTPUT SEJAJAR -->
    <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Leads:
<?php print_r($leads); ?>
        </pre>
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Qualified Leads:
<?php print_r($qualified); ?>
        </pre>
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Proposals:
<?php print_r($proposals); ?>
        </pre>
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Deals Closed:
<?php print_r($deals); ?>
        </pre>
        <pre style="flex: 1; min-width: 200px; background: #f1f1f1; border: 1px solid #ccc; padding: 10px;">
Forecast:
<?php print_r($forecast); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('sales-pipeline-chart', {
    chart: { type: 'column' },
    title: { text: 'Sales Pipeline & Forecasting' },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Unit/Pelanggan)' }
    },
    tooltip: { shared: true },
    series: [
        {
            name: 'Leads (Calon pelanggan)',
            data: <?= json_encode($leads) ?>,
            color: 'blue'
        },
        {
            name: 'Leads yang memenuhi syarat',
            data: <?= json_encode($qualified) ?>,
            color: 'green'
        },
        {
            name: 'Proposal yang dikirim',
            data: <?= json_encode($proposals) ?>,
            color: 'orange'
        },
        {
            name: 'Kesepakatan yang berhasil ditutup',
            data: <?= json_encode($deals) ?>,
            color: 'red'
        },
        {
            name: 'Perkiraan penjualan di masa depan',
            type: 'line',
            data: <?= json_encode($forecast) ?>,
            color: 'teal',
            dashStyle: 'ShortDash'
        }
    ]
});
</script>

</body>
</html>
