<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT kategori, jumlah FROM tax_compliance WHERE tahun = $tahun";
$result = mysqli_query($koneksi, $query);

$data = [];
$warna = [
    'Patuh' => 'green',
    'Terlambat' => 'yellow',
    'Tidak Patuh' => 'red'
];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'name' => $row['kategori'],
        'y' => (int) $row['jumlah'],
        'color' => $warna[$row['kategori']] ?? 'gray'
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Compliance Status</title>
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
            <li><a href="tax_compliance.php">Tax Compliance</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <p>Menampilkan status kepatuhan pajak berdasarkan kategori Wajib Pajak.</p>
    
    <div id="tax-compliance-chart" style="width:100%; height:400px;"></div>

    <!-- DEBUG OUTPUT -->
    <div style="margin-top: 30px;">
        <h3>Debug Output :</h3>
        <pre style="background:#f9f9f9; border:1px solid #ccc; padding:10px;">
<?php print_r($data); ?>
        </pre>
    </div>
</div>

<!-- Highcharts Script -->
<script>
Highcharts.chart('tax-compliance-chart', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Tax Compliance Status'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Status Pajak',
        colorByPoint: true,
        data: <?= json_encode($data) ?>
    }]
});
</script>

</body>
</html>
