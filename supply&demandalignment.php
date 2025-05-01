<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply & Demand Alignment</title>
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
        <p>Menampilkan perbandingan antara pasokan dan permintaan tiap bulan pada tahun 2024.</p>

        <!-- Container Chart -->
        <div id="supply-demand-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('supply-demand-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Supply & Demand Alignment - 2024'
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
                headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
                pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: <b>{point.y} unit</b><br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Supply',
                data: [1000, 1100, 1200, 1300, 1250, 1350, 1400, 1380, 1300, 1250, 1200, 1300],
                color: '#28a745' // Hijau
            }, {
                name: 'Demand',
                data: [950, 1150, 1180, 1270, 1300, 1280, 1370, 1320, 1280, 1230, 1190, 1350],
                color: '#dc3545' // Merah
            }]
        });
    </script>
</body>
</html>
