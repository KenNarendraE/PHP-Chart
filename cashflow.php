<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow Analysis</title>
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
        <p>Berikut adalah grafik analisis arus kas berdasarkan data bulanan.</p>
        
        <!-- Container Chart -->
        <div id="cashflow-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts
        Highcharts.chart('cashflow-chart', {
            chart: {
                type: 'line' // Jenis chart (line, column, bar, dll)
            },
            title: {
                text: 'Cash Flow Analysis 2024'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Jumlah (Juta IDR)'
                }
            },
            series: [{
                name: 'Pemasukan',
                data: [50, 60, 80, 90, 120, 130, 150, 170, 160, 140, 130, 110]
            }, {
                name: 'Pengeluaran',
                data: [30, 40, 50, 60, 70, 80, 90, 100, 95, 85, 75, 60]
            }]
        });
    </script>

</body>
</html>
