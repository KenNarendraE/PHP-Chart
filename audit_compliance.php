<?php
include 'koneksi.php';

$year = 2025;
$query = "SELECT bulan, audit_dilakukan, tingkat_kepatuhan FROM audit_compliance WHERE tahun = $year ORDER BY FIELD(bulan, 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des')";
$result = mysqli_query($koneksi, $query);

$audit = [];
$compliance = [];
$bulanLabels = [];

while ($row = mysqli_fetch_assoc($result)) {
    $bulanLabels[] = $row['bulan'];
    $audit[] = (int) $row['audit_dilakukan'];
    $compliance[] = (int) $row['tingkat_kepatuhan'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit & Compliance Reports</title>
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
                <li><a href="audit_compliance.php">Audit & Compliance</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <p>Menampilkan jumlah audit yang dilakukan serta tingkat kepatuhan setiap bulannya.</p>
        <div id="audit-compliance-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
    Highcharts.chart('audit-compliance-chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Audit & Compliance Reports'
        },
        xAxis: {
            categories: <?= json_encode($bulanLabels) ?>,
            title: {
                text: 'Bulan'
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah Audit & Kepatuhan (%)'
            }
        },
        series: [{
            name: 'Audit Dilakukan',
            data: <?= json_encode($audit) ?>,
            color: '#0367fc'
        }, {
            name: 'Kepatuhan (%)',
            data: <?= json_encode($compliance) ?>,
            color: '#28a745'
        }]
    });
    </script>

</body>
</html>
<pre>
<?php
echo 'Audit: ';
print_r($audit);
echo "\nCompliance: ";
print_r($compliance);
?>
</pre>
