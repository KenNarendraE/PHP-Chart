<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downtime & Maintenance - Line Chart</title>
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
        <p>Menampilkan tren downtime dan aktivitas maintenance tiap bulan 2024.</p>

        <!-- Container Chart -->
        <div id="line-chart-downtime-maintenance" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('line-chart-downtime-maintenance', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Downtime & Maintenance Tracking - 2024'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                shared: true,
                crosshairs: true
            },
            series: [{
                name: 'Downtime (jam)',
                data: [10, 12, 8, 14, 11, 9, 7, 13, 10, 15, 9, 8],
                color: '#dc3545', // Merah
                marker: {
                    symbol: 'circle'
                }
            }, {
                name: 'Jumlah Maintenance',
                data: [2, 3, 1, 4, 2, 3, 2, 5, 3, 2, 4, 3],
                color: '#007bff', // Biru
                marker: {
                    symbol: 'square'
                }
            }]
        });
    </script>
</body>
</html>
