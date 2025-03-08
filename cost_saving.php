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
            <h1 class="logo">Cost Savings & Spend Analysis</h1>
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
        <p>Grafik ini memperlihatkan hubungan antara penghematan biaya (Cost Savings) dan total pengeluaran (Total Spend) selama periode waktu tertentu (per bulan).</p>
        
        <!-- Container Chart -->
        <div id="cost_saving" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('cost_saving', {
            chart: {
                type: 'line' // Bisa diganti ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Cost Savings & Spend Analysis'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Amount ($)'
                }
            },
            series: [{
                name: 'Cost Savings ($)',
                data: [5000, 6200, 7000, 6800, 7200, 7500],
                color: '#145A32' // Warna hijau tua
            }, {
                name: 'Total Spend ($)',
                data: [15000, 14000, 15500, 16000, 15800, 16500],
                color: '#F1C40F', // Warna kuning
                dashStyle: 'Dash' // Mengubah garis menjadi putus-putus
            }]
        });
    </script>

</body>
</html>
