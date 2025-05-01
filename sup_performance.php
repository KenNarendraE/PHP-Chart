<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Performance Analysis</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">MyWebsite</h1>
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
        <p>Grafik ini membandingkan dua metrik utama performa supplier</p>
        
        <!-- Container Chart -->
        <div id="sup_performance" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk supplier performance analysis
        Highcharts.chart('sup_performance', {
            chart: {
                type: 'line' // Bisa diganti ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Supplier Performance Analysis'
            },
            xAxis: {
                categories: ['Supplier A', 'Supplier B', 'Supplier C', 'Supplier D', 'Supplier E'],
                title: {
                    text: 'Supplier'
                }
            },
            yAxis: {
                title: {
                    text: 'Performance Metrics'
                }
            },
            series: [{
                name: 'On-time Delivery (%)',
                data: [93, 87, 90, 84, 91],
                color: '#145A32' // Warna hijau tua
            }, {
                name: 'Quality Rating (1-5)',
                data: [4.9, 4.4, 4.6, 4.1, 4.7],
                color: '#F1C40F', // Warna kuning
                dashStyle: 'Dash' // Mengubah garis menjadi putus-putus
            }]
        });
    </script>

</body>
</html>
