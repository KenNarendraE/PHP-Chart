<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Performance & Status</title>
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
        <p>Menampilkan performa pengiriman berdasarkan ketepatan dan status per bulan di tahun 2024.</p>

        <!-- Container Chart -->
        <div id="delivery-performance-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('delivery-performance-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Delivery Performance & Status - 2024'
            },
            subtitle: {
                text: 'Jumlah pengiriman berdasarkan status tiap bulan'
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
                    text: 'Jumlah Pengiriman'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' pengiriman'
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'On Time',
                data: [80, 85, 78, 90, 88, 92, 89, 86, 87, 90, 91, 93],
                color: '#28a745' // Hijau
            }, {
                name: 'Late',
                data: [10, 8, 12, 7, 9, 6, 7, 9, 8, 7, 6, 5],
                color: '#ffc107' // Kuning
            }, {
                name: 'Pending',
                data: [5, 4, 6, 3, 2, 2, 3, 2, 3, 2, 2, 1],
                color: '#dc3545' // Merah
            }]
        });
    </script>
</body>
</html>
