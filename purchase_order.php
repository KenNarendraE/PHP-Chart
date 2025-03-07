<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order Tracking</title>
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
        <p>Menunjukkan jumlah pesanan pembelian (Purchase Orders) yang dibuat dan diselesaikan selama periode waktu tertentu (per bulan)r</p>
        
        <!-- Container Chart -->
        <div id="purchase_order" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk supplier performance analysis
        Highcharts.chart('purchase_order', {
            chart: {
                type: 'line' // Bisa diganti ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Purchase Order Tracking'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Pesanan'
                }
            },
            series: [{
                name: 'Orders Created',
                data: [120, 150, 170, 160, 180, 190],
                color: '#0000FF' 
            }, {
                name: 'Orders Completed',
                data: [100, 140, 160, 150, 170, 185],
                color: '#FF0000', 
                dashStyle: 'Dash' // Mengubah garis menjadi putus-putus
            }]
        });
    </script>

</body>
</html>
