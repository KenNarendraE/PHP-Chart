<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Rep Performance</title>
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
        <p>Grafik ini menunjukkan kinerja perwakilan penjualan berdasarkan total penjualan yang mereka capai.</p>
        
        <!-- Container Chart -->
        <div id="sales-rep-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Sales Rep Performance
        Highcharts.chart('sales-rep-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Sales Rep Performance'
            },
            xAxis: {
                categories: ['ken', 'aji', 'bisma', 'kupluk', 'acyl'],
                title: {
                    text: 'Sales Representatives'
                }
            },
            yAxis: {
                title: {
                    text: 'Total Sales (in Juta IDR)'
                }
            },
            series: [{
                name: 'Total Sales',
                data: [150, 200, 180, 220, 170],
                color: '#007bff'
            }]
        });
    </script>
</body>
</html>
