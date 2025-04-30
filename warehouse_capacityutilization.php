<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Capacity Utilization</title>
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
        <p>Menampilkan persentase pemanfaatan kapasitas gudang per bulan selama tahun 2024.</p>

        <!-- Container Chart -->
        <div id="warehouse-capacity-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('warehouse-capacity-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Warehouse Capacity Utilization - 2024'
            },
            subtitle: {
                text: 'Pemanfaatan kapasitas gudang dalam persen tiap bulan'
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
                max: 100,
                title: {
                    text: 'Persentase Kapasitas Terpakai (%)'
                },
                labels: {
                    format: '{value}%'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: '%'
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}%'
                    }
                }
            },
            series: [{
                name: 'Utilisasi Kapasitas Gudang',
                data: [78, 82, 85, 90, 87, 88, 92, 89, 86, 83, 80, 81],
                color: '#6f42c1' // Ungu
            }]
        });
    </script>
</body>
</html>
