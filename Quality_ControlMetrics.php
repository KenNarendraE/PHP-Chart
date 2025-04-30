<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Control Metrics - Bar Chart</title>
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
        <p>Menampilkan metrik Quality Control per bulan dalam bentuk grafik batang.</p>

        <!-- Container Chart -->
        <div id="qc-bar-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('qc-bar-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Quality Control Metrics - 2024'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                crosshair: true,
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Persentase (%)'
                },
                labels: {
                    format: '{value}%'
                }
            }, {
                min: 0,
                title: {
                    text: 'Jumlah Rework'
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: true,
                    shadow: false,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Defect Rate (%)',
                data: [2.5, 3.0, 2.0, 2.2, 3.5, 2.8, 2.1, 2.7, 2.4, 3.1, 2.6, 2.3],
                yAxis: 0,
                color: '#dc3545'
            }, {
                name: 'Yield (%)',
                data: [97.0, 96.5, 98.0, 97.5, 96.0, 97.0, 98.2, 97.8, 97.6, 96.9, 97.3, 97.7],
                yAxis: 0,
                color: '#28a745'
            }, {
                name: 'Rework Count',
                data: [15, 20, 10, 13, 25, 18, 11, 19, 14, 22, 17, 13],
                yAxis: 1,
                color: '#007bff'
            }]
        });
    </script>
</body>
</html>
