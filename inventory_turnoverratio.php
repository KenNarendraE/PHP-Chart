<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Turnover Ratio</title>
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
        <p>Menampilkan rasio perputaran persediaan (Inventory Turnover) per bulan tahun 2024.</p>

        <!-- Container Chart -->
        <div id="inventory-turnover-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('inventory-turnover-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Inventory Turnover Ratio 2024'
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
                    text: 'Turnover Ratio'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
                pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: <b>{point.y} kali</b><br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Inventory Turnover',
                data: [5.1, 4.8, 5.4, 5.6, 6.0, 5.9, 6.2, 5.8, 5.5, 5.7, 6.1, 6.3],
                color: '#17a2b8' // Biru muda
            }]
        });
    </script>
</body>
</html>
