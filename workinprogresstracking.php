<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIP Tracking</title>
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
        <p>Menampilkan jumlah unit Work-In-Progress (WIP) tiap bulan pada tahun 2024.</p>

        <!-- Container Chart -->
        <div id="wip-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('wip-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Work-In-Progress (WIP) Tracking 2024'
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
                    text: 'Jumlah Unit WIP'
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
                name: 'Jumlah WIP',
                data: [320, 280, 350, 370, 340, 390, 410, 400, 380, 360, 370, 390],
                color: '#6f42c1' // Ungu
            }]
        });
    </script>
</body>
</html>
