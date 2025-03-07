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
            <h1 class="logo">Bussiness Chart</h1>
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
        <p>Menampilkan status kepatuhan pajak berdasarkan kategori Wajib Pajak.</p>
        
        <!-- Container Chart -->
        <div id="tax-compliance-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Tax Compliance Status
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
                data: [{
                    name: 'Patuh',
                    y: 65,
                    color: '#28a745' // Hijau (Patuh)
                }, {
                    name: 'Terlambat',
                    y: 15,
                    color: '#ffc107' // Kuning (Terlambat)
                }, {
                    name: 'Tidak Patuh',
                    y: 20,
                    color: '#dc3545' // Merah (Tidak Patuh)
                }]
            }]
        });
    </script>
</body>
</html>
