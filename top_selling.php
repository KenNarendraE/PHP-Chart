<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Selling Products/Services</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Bussiness Chart</h1>
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
        <p>Produk/layanan terlaris berdasarkan jumlah unit yang terjual</p>
        
        <!-- Container Chart -->
        <div id="top-selling-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Top Selling Products/Services
        Highcharts.chart('top-selling-chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Top Selling Products/Services'
            },
            xAxis: {
                categories: ['Produk A', 'Produk B', 'Produk C', 'Produk D', 'Produk E'],
                title: {
                    text: 'Produk / Layanan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Terjual'
                }
            },
            series: [{
                name: 'Unit Terjual',
                data: [500, 450, 400, 350, 300],
                color: '#007bff'
            }]
        });
    </script>
</body>
</html>
