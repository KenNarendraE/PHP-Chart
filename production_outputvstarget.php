<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Output vs Target</title>
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
        <p>Menampilkan perbandingan antara output produksi aktual dan target per bulan tahun 2024.</p>

        <!-- Container Chart -->
        <div id="production-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('production-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Production Output vs Target 2024'
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
                    text: 'Jumlah Produksi (Unit)'
                }
            },
            tooltip: {
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    grouping: true,
                    shadow: false,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Target',
                data: [1000, 1100, 1050, 1200, 1150, 1250, 1300, 1280, 1100, 1200, 1150, 1250],
                color: '#28a745' // Hijau
            }, {
                name: 'Actual Output',
                data: [950, 1150, 980, 1250, 1180, 1220, 1290, 1300, 1080, 1170, 1130, 1260],
                color: '#007bff' // Biru
            }]
        });
    </script>
</body>
</html>
