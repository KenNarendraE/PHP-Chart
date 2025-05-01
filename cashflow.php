<?php
include 'koneksi.php';

$year = 2024;
$query = "SELECT bulan, pemasukan, pengeluaran FROM cashflow_analysis WHERE tahun = $year 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$pemasukan = [];
$pengeluaran = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $pemasukan[] = (int) $row['pemasukan'];
    $pengeluaran[] = (int) $row['pengeluaran'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow Analysis</title>
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
                <li><a href="cashflow_analysis.php">Cash Flow</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <p>Berikut adalah grafik analisis arus kas berdasarkan data bulanan.</p>
        <div id="cashflow-chart" style="width:100%; height:400px;"></div>

        <!-- Debug (opsional) -->
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
                <?php echo "Pemasukan:\n"; print_r($pemasukan); ?>
            </pre>
            <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
                <?php echo "Pengeluaran:\n"; print_r($pengeluaran); ?>
            </pre>
        </div>
    </div>

    <script>
    Highcharts.chart('cashflow-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Cash Flow Analysis 2024'
        },
        xAxis: {
            categories: <?= json_encode($bulanLabels) ?>
        },
        yAxis: {
            title: {
                text: 'Jumlah (Juta IDR)'
            }
        },
        series: [{
            name: 'Pemasukan',
            data: <?= json_encode($pemasukan) ?>,
            color: '#28a745'
        }, {
            name: 'Pengeluaran',
            data: <?= json_encode($pengeluaran) ?>,
            color: '#dc3545'
        }]
    });
    </script>

</body>
</html>
