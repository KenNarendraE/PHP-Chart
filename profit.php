<?php
include 'koneksi.php';

$year = 2024;
$query = "SELECT bulan, revenue, expenses FROM profit_loss WHERE tahun = $year 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$revenue = [];
$expenses = [];
$profit = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $revenue[] = (int) $row['revenue'];
    $expenses[] = (int) $row['expenses'];
    $profit[] = (int) $row['revenue'] - (int) $row['expenses'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit & Loss Overview</title>
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
                <li><a href="profit_loss.php">Profit & Loss</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <p>Menampilkan gambaran keuntungan dan kerugian bulanan berdasarkan Revenue dan Expenses.</p>
        <div id="profit-loss-chart" style="width:100%; height:400px;"></div>

        <!-- Debug Output -->
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
                <?php echo "Revenue:\n"; print_r($revenue); ?>
            </pre>
            <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
                <?php echo "Expenses:\n"; print_r($expenses); ?>
            </pre>
            <pre style="flex:1; background:#f9f9f9; border:1px solid #ccc; padding:10px;">
                <?php echo "Profit:\n"; print_r($profit); ?>
            </pre>
        </div>
    </div>

    <script>
    Highcharts.chart('profit-loss-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Profit & Loss Overview (2024)'
        },
        xAxis: {
            categories: <?= json_encode($bulanLabels) ?>,
            title: {
                text: 'Bulan'
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah (Juta IDR)'
            }
        },
        series: [{
            name: 'Revenue (Pendapatan) → Hijau',
            data: <?= json_encode($revenue) ?>,
            color: '#28a745'
        }, {
            name: 'Expenses (Pengeluaran) → Merah',
            data: <?= json_encode($expenses) ?>,
            color: '#dc3545'
        }, {
            name: 'Profit',
            data: <?= json_encode($profit) ?>,
            color: '#ffc107'
        }]
    });
    </script>

</body>
</html>
