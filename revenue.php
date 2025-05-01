<?php
include 'koneksi.php';

$year = 2025;
$query = "SELECT bulan, revenue, expenses FROM revenue_expenses WHERE tahun = $year ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$revenue = [];
$expenses = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $revenue[] = (int) $row['revenue'];
    $expenses[] = (int) $row['expenses'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue vs. Expenses</title>
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
                <li><a href="revenue_expenses.php">Revenue vs Expenses</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container">
        <p>Grafik perbandingan pendapatan dan pengeluaran berdasarkan data bulanan.</p>
        
        <div id="revenue-expenses-chart" style="width:100%; height:400px;"></div>

        <!-- Debug Output -->
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
                <?php
                echo "Revenue:\n";
                print_r($revenue);
                ?>
            </pre>
            <pre style="flex: 1; background: #f1f1f1; padding: 10px; border: 1px solid #ccc;">
                <?php
                echo "Expenses:\n";
                print_r($expenses);
                ?>
            </pre>
        </div>
    </div>

    <script>
    Highcharts.chart('revenue-expenses-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Revenue vs. Expenses'
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
            name: 'Revenue (Pendapatan)',
            data: <?= json_encode($revenue) ?>,
            color: '#2ecc71'
        }, {
            name: 'Expenses (Pengeluaran)',
            data: <?= json_encode($expenses) ?>,
            color: '#e74c3c'
        }]
    });
    </script>

</body>
</html>
