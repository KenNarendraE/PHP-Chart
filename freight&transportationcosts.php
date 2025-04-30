<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freight & Transportation Costs</title>
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
        <p>Menampilkan total biaya pengiriman dan transportasi per bulan sepanjang tahun 2024.</p>

        <!-- Container Chart -->
        <div id="freight-cost-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('freight-cost-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Freight & Transportation Costs - 2024'
            },
            subtitle: {
                text: 'biaya logistik per bulan'
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
                    text: 'Biaya (juta Rupiah)'
                },
                labels: {
                    formatter: function () {
                        return 'Rp ' + this.value + ' jt';
                    }
                }
            },
            tooltip: {
                shared: true,
                valuePrefix: 'Rp ',
                valueSuffix: ' jt'
            },
            plotOptions: {
                column: {
                    grouping: true,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Biaya Pengiriman',
                data: [45, 50, 48, 52, 55, 60, 58, 54, 56, 59, 57, 61],
                color: '#17a2b8' // Biru muda
            }]
        });
    </script>
</body>
</html>
