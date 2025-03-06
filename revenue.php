<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue vs. Expenses</title>
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
        <p>Grafik perbandingan pendapatan dan pengeluaran berdasarkan data bulanan.</p>
        
        <!-- Container Chart -->
        <div id="revenue-expenses-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Revenue vs. Expenses
        Highcharts.chart('revenue-expenses-chart', {
            chart: {
                type: 'column' // Bisa diganti ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Revenue vs. Expenses 2024'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah (Juta IDR)'
                }
            },
            series: [{
                name: 'Revenue (Pendapatan)',
                data: [100, 120, 140, 160, 180, 200, 220, 250, 230, 210, 190, 170],
                color: '#2ecc71' // Warna hijau untuk revenue
            }, {
                name: 'Expenses (Pengeluaran)',
                data: [80, 90, 100, 110, 130, 140, 160, 180, 170, 150, 140, 120],
                color: '#e74c3c' // Warna merah untuk expenses
            }]
        });
    </script>

</body>
</html>
