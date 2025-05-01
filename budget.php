<?php
include 'koneksi.php';

$year = 2025;
$query = "SELECT bulan, budget, actual FROM budget_actual WHERE tahun = $year 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$bulanLabels = [];
$budget = [];
$actual = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $budget[] = (int) $row['budget'];
    $actual[] = (int) $row['actual'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget vs. Actual</title>
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
        <p>Membandingkan anggaran yang direncanakan (Budget) dengan hasil keuangan sebenarnya (Actual).</p>
        <div id="budget-actual-chart" style="width:100%; height:400px;"></div>

        <!-- Debug Output (di tengah) -->
        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
            <pre style="border: 1px solid #ccc; padding: 10px; background: #f9f9f9; max-width: 300px;">
<?php
echo "Budget:\n";
print_r($budget);
?>
            </pre>

            <pre style="border: 1px solid #ccc; padding: 10px; background: #f9f9f9; max-width: 300px;">
<?php
echo "Actual:\n";
print_r($actual);
?>
            </pre>
        </div>
    </div>

    <!-- Highcharts -->
    <script>
    Highcharts.chart('budget-actual-chart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Budget vs. Actual'
        },
        xAxis: {
            categories: <?= json_encode($bulanLabels) ?>,
            title: { text: 'Bulan' }
        },
        yAxis: {
            title: { text: 'Jumlah (Juta IDR)' }
        },
        series: [{
            name: 'Anggaran (Budget)',
            data: <?= json_encode($budget) ?>,
            color: '#0367fc'
        }, {
            name: 'Realisasi (Actual)',
            data: <?= json_encode($actual) ?>,
            color: '#fcba03'
        }]
    });
    </script>
</body>
</html>
