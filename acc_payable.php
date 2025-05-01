<?php
// Include koneksi database
include 'koneksi.php';

// Ambil data dari DB
$year = 2025;
$query = "SELECT bulan, accounts_receivable, accounts_payable 
          FROM financial_data 
          WHERE tahun = $year 
          ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

// Siapkan array kosong
$receivable = [];
$payable = [];
$bulanLabels = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $receivable[] = (int) $row['accounts_receivable'];
    $payable[] = (int) $row['accounts_payable'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Payable & Receivable</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Accounts Payable & Receivable</h1>
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
        <p>Menampilkan perbandingan antara akun yang harus dibayar (Accounts Payable) dan akun yang harus diterima (Accounts Receivable).</p>
        
        <div id="payable-receivable-chart" style="width:100%; height:400px;"></div>

        <!-- Debug Output (tengah) -->
        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
            <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Receivable:
<?php print_r($receivable); ?>
            </pre>
            <pre style="background:#f1f1f1; border:1px solid #ccc; padding:10px; max-width: 300px;">
Payable:
<?php print_r($payable); ?>
            </pre>
        </div>
    </div>

    <!-- Highcharts -->
    <script>
    Highcharts.chart('payable-receivable-chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Accounts Payable & Receivable'
        },
        xAxis: {
            categories: <?= json_encode($bulanLabels) ?>,
            title: { text: 'Bulan' }
        },
        yAxis: {
            title: { text: 'Jumlah (Juta IDR)' }
        },
        series: [{
            name: 'Accounts Receivable',
            data: <?= json_encode($receivable) ?>,
            color: '#28a745'
        }, {
            name: 'Accounts Payable',
            data: <?= json_encode($payable) ?>,
            color: '#dc3545'
        }]
    });
    </script>
</body>
</html>
