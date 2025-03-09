<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cost Savings & Spend Analysis</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Lead Time & Delivery Status</h1>
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
        <p>Grafik ini menunjukkan dua metrik penting dalam logistik dan pengadaan</p>
        
        <!-- Container Chart -->
        <div id="lead_time" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('lead_time', {
            chart: {
                type: 'line' // Bisa diganti ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Lead Time & Delivery Status'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Metrik Kinerja'
                }
            },
            series: [{
                name: 'Lead TIme (Day)',
                data: [5, 7, 6, 8, 6, 7],
                color: '#0000FF'
            }, {
                name: 'On-Time Delivery (%)',
                data: [92, 88, 90, 85, 89, 91],
                color: '#FF0000', 
                dashStyle: 'Dash' // Mengubah garis menjadi putus-putus
            }]
        });
    </script>

</body>
</html>
