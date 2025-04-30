<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Reorder Point</title>
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
        <p>Menampilkan posisi stok dibandingkan dengan Reorder Point (ROP) untuk setiap item.</p>

        <!-- Container Chart -->
        <div id="reorder-point-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('reorder-point-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Stock Reorder Point - April 2024'
            },
            xAxis: {
                categories: ['Item A', 'Item B', 'Item C', 'Item D', 'Item E'],
                crosshair: true,
                title: {
                    text: 'Nama Barang'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Unit'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' unit'
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Stock Saat Ini',
                data: [60, 40, 20, 50, 80],
                color: '#007bff'
            }, {
                name: 'Reorder Point',
                data: [50, 50, 50, 50, 50],
                color: '#ffc107'
            }, {
                name: 'Minimum Stock',
                data: [30, 30, 30, 30, 30],
                color: '#dc3545'
            }]
        });
    </script>
</body>
</html>
