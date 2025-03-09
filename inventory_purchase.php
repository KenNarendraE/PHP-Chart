<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Purchase Trends</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Inventory Purchase Trends</h1>
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
        <p>menunjukkan tren pembelian dan penggunaan inventaris selama periode waktu tertentu.</p>
        
        <!-- Container Chart -->
        <div id="inventory_purchase" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('inventory_purchase', {
            chart: {
                type: 'line' // Bisa diganti ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Inventory Purchase Trends'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Inventaris'
                }
            },
            series: [{
                name: 'Inventory Purchased',
                data: [300, 350, 400, 380, 420, 450],
                color: '#008000'
            }, {
                name: 'Inventory Use',
                data: [280, 330, 390, 370, 400, 430],
                color: '#F1C40F', 
                dashStyle: 'Dash' // Mengubah garis menjadi putus-putus
            }]
        });
    </script>

</body>
</html>
