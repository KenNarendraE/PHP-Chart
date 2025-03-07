<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit & Loss Overview</title>
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
        <p>Menampilkan gambaran keuntungan dan kerugian bulanan berdasarkan Revenue dan Expenses.</p>
        
        <!-- Container Chart -->
        <div id="profit-loss-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Data Revenue & Expenses
        let revenueData = [150, 180, 200, 220, 250, 270, 300, 320, 310, 290, 280, 260];
        let expensesData = [100, 110, 130, 140, 160, 180, 200, 210, 200, 190, 180, 170];

        // Hitung Profit (Revenue - Expenses)
        let profitData = revenueData.map((rev, index) => rev - expensesData[index]);

        // Inisialisasi Highcharts untuk Profit & Loss Overview
        Highcharts.chart('profit-loss-chart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Profit & Loss Overview (2024)'
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
                name: 'Revenue (Pendapatan) → Hijau',
                data: revenueData,
                color: '#28a745'
            }, {
                name: 'Expenses (Pengeluaran) → Merah',
                data: expensesData,
                color: '#dc3545'
            }, {
                name: 'Profit',
                data: profitData,
                color: '#ffc107'
            }]
        });
    </script>

</body>
</html>
