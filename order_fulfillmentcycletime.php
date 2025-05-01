<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Fulfillment Cycle Time</title>
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
        <p>Menampilkan rata-rata waktu pemenuhan pesanan (dalam hari) tiap bulan selama tahun 2024.</p>

        <!-- Container Chart -->
        <div id="order-fulfillment-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('order-fulfillment-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Order Fulfillment Cycle Time - 2024'
            },
            subtitle: {
                text: 'Rata-rata waktu dari pesanan masuk hingga pengiriman selesai'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                crosshair: true,
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cycle Time (Hari)'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' hari'
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y} hari'
                    }
                }
            },
            series: [{
                name: 'Cycle Time',
                data: [5, 4.8, 5.2, 4.6, 4.9, 4.5, 4.7, 5.1, 4.8, 4.4, 4.6, 4.5],
                color: '#20c997' // Hijau muda
            }]
        });
    </script>
</body>
</html>
