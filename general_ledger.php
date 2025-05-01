<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT bulan, revenue, expenses, assets, liabilities FROM general_ledger 
          WHERE tahun = $tahun 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$revenue = [];
$expenses = [];
$assets = [];
$liabilities = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $revenue[] = (int) $row['revenue'];
    $expenses[] = (int) $row['expenses'];
    $assets[] = (int) $row['assets'];
    $liabilities[] = (int) $row['liabilities'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Ledger Summary</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    
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

<div class="container">
    <p>Menampilkan ringkasan transaksi dalam General Ledger berdasarkan kategori utama.</p>
    <div id="general-ledger-chart" style="width:100%; height:400px;"></div>

    <!-- Debug Output (ditengah) -->
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
        <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Revenue:
<?php print_r($revenue); ?>
        </pre>
        <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Expenses:
<?php print_r($expenses); ?>
        </pre>
        <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Assets:
<?php print_r($assets); ?>
        </pre>
        <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Liabilities:
<?php print_r($liabilities); ?>
        </pre>
    </div>
</div>

<script>
Highcharts.chart('general-ledger-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'General Ledger Summary'
    },
    xAxis: {
        categories: <?= json_encode($bulanLabels) ?>,
        title: { text: 'Bulan' }
    },
    yAxis: {
        title: { text: 'Jumlah (Juta IDR)' }
    },
    series: [{
        name: 'Pendapatan (Revenue)',
        data: <?= json_encode($revenue) ?>,
        color: '#007bff'
    }, {
        name: 'Beban (Expenses)',
        data: <?= json_encode($expenses) ?>,
        color: '#dc3545'
    }, {
        name: 'Aset (Assets)',
        data: <?= json_encode($assets) ?>,
        color: '#28a745'
    }, {
        name: 'Liabilitas (Liabilities)',
        data: <?= json_encode($liabilities) ?>,
        color: '#fd7e14'
    }]
});
</script>

</body>
</html>
