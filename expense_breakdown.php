<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Breakdown</title>
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
        <p>Menampilkan pembagian pengeluaran berdasarkan kategori utama.</p>
        
        <!-- Container Chart -->
        <div id="expense-breakdown-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Expense Breakdown
        Highcharts.chart('expense-breakdown-chart', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Expense Breakdown'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Pengeluaran',
                colorByPoint: true,
                data: [{
                    name: 'Gaji Karyawan',
                    y: 40,
                    color: '#007bff' // Biru
                }, {
                    name: 'Sewa',
                    y: 20,
                    color: '#28a745' // Hijau
                }, {
                    name: 'Utilitas (Listrik, Air, Internet)',
                    y: 15,
                    color: '#fd7e14' // Oranye
                }, {
                    name: 'Peralatan & Inventaris',
                    y: 15,
                    color: '#dc3545' // Merah
                }, {
                    name: 'Lainnya',
                    y: 10,
                    color: '#6c757d' // Abu-abu
                }]
            }]
        });
    </script>
</body>
</html>
