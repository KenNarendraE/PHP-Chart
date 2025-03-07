<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Conversion Rate</title>
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
        <p>Menampilkan tingkat konversi pelanggan setiap bulan.</p>
        
        <!-- Container Chart -->
        <div id="conversion-rate-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Customer Conversion Rate
        Highcharts.chart('conversion-rate-chart', {
            chart: {
                type: 'line' // Menggunakan line chart untuk tren konversi
            },
            title: {
                text: 'Customer Conversion Rate'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Conversion Rate (%)'
                },
                labels: {
                    format: '{value}%'
                }
            },
            series: [{
                name: 'Conversion Rate',
                data: [5.2, 6.1, 7.0, 8.3, 9.5, 10.2, 11.8, 12.5, 13.0, 12.2, 11.0, 9.8],
                color: '#28a745'
            }],
            tooltip: {
                valueSuffix: '%'
            }
        });
    </script>
</body>
</html>
