<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts Payable & Receivable</title>
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
        <p>Menampilkan perbandingan antara akun yang harus dibayar (Accounts Payable) dan akun yang harus diterima (Accounts Receivable).</p>
        
        <!-- Container Chart -->
        <div id="payable-receivable-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Accounts Payable & Receivable
        Highcharts.chart('payable-receivable-chart', {
            chart: {
                type: 'column' // Bisa diubah ke 'line' atau 'bar' sesuai kebutuhan
            },
            title: {
                text: 'Accounts Payable & Receivable'
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
                name: 'Accounts Receivable',
                data: [120, 140, 160, 180, 200, 220, 250, 270, 260, 240, 230, 210],
                color: '#28a745' // Hijau
            }, {
                name: 'Accounts Payable',
                data: [100, 110, 130, 140, 150, 170, 190, 210, 200, 180, 160, 150],
                color: '#dc3545' // Merah
            }]
        });
    </script>
</body>
</html>