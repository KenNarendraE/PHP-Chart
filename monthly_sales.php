<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Performance</title>
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
        <p>Menampilkan performa penjualan bulanan berdasarkan target dan pencapaian.</p>
        
        <!-- Container Chart -->
        <div id="sales-performance-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Monthly Sales Performance
        Highcharts.chart('sales-performance-chart', {
            chart: {
                type: 'line' // Menggunakan bar chart (vertical bars)
            },
            title: {
                text: 'Monthly Sales Performance'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Penjualan (Juta IDR)'
                }
            },
            series: [{
                name: 'Target Penjualan',
                data: [120, 130, 150, 170, 190, 210, 230, 250, 240, 220, 200, 180],
                color: '#0367fc'
            }, {
                name: 'Pencapaian Penjualan',
                data: [100, 110, 140, 160, 180, 200, 220, 230, 220, 200, 190, 170],
                color: '#28a745'
            }]
        });
    </script>
</body>
</html>
