<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demand Forecasting & Planning</title>
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
        <p>Menampilkan perbandingan permintaan aktual, forecast, dan produksi rencana dalam bentuk grafik batang.</p>

        <!-- Container Chart -->
        <div id="demand-bar-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('demand-bar-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Demand Forecasting & Planning 2024'
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
                    text: 'Jumlah Unit'
                }
            },
            tooltip: {
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Actual Demand',
                data: [1000, 1150, 980, 1300, 1250, 1280, 1200, 1100, 1050, 1180, 1120, 1250],
                color: '#007bff' // Biru
            }, {
                name: 'Forecasted Demand',
                data: [1020, 1120, 1000, 1270, 1220, 1300, 1220, 1150, 1070, 1170, 1100, 1240],
                color: '#ffc107' // Kuning
            }, {
                name: 'Planned Production',
                data: [1050, 1100, 990, 1250, 1230, 1290, 1250, 1130, 1080, 1190, 1110, 1260],
                color: '#28a745' // Hijau
            }]
        });
    </script>
</body>
</html>
