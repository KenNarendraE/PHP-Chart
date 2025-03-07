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
            <h1 class="logo">MyWebsite</h1>
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
        
        <!-- Container Chart -->
        <div id="sales-pipeline-chart" style="width:100%; height:500px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Sales Pipeline & Forecasting
        Highcharts.chart('sales-pipeline-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Sales Pipeline & Forecasting'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah (Unit/Pelanggan)'
                }
            },
            series: [{
                name: 'Leads (Calon pelanggan)',
                data: [50, 60, 70, 80, 90, 100, 110, 130, 120, 110, 100, 90],
                color: '#007bff'
            }, {
                name: 'Leads yang memenuhi syarat',
                data: [30, 35, 45, 50, 60, 70, 75, 85, 80, 75, 70, 60],
                color: '#28a745'
            }, {
                name: 'Proposal yang dikirim',
                data: [20, 25, 30, 40, 45, 55, 60, 70, 65, 60, 55, 50],
                color: '#ffc107'
            }, {
                name: 'Kesepakatan yang berhasil ditutup',
                data: [10, 15, 20, 25, 30, 35, 40, 50, 45, 40, 35, 30],
                color: '#dc3545'
            }, {
                name: 'Perkiraan penjualan di masa depan',
                type: 'line',
                data: [12, 18, 24, 28, 32, 38, 44, 52, 48, 42, 36, 32],
                color: '#17a2b8',
                dashStyle: 'ShortDash'
            }],
            tooltip: {
                shared: true
            }
        });
    </script>
</body>
</html>
