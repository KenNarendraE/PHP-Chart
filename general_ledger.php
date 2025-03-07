<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Ledger Summary</title>
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
        <p>Menampilkan ringkasan transaksi dalam General Ledger berdasarkan kategori utama.</p>
        
        <!-- Container Chart -->
        <div id="general-ledger-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk General Ledger Summary
        Highcharts.chart('general-ledger-chart', {
            chart: {
                type: 'column' // Bisa diubah ke 'bar' atau 'line' sesuai kebutuhan
            },
            title: {
                text: 'General Ledger Summary'
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
                name: 'Pendapatan (Revenue)',
                data: [200, 220, 250, 280, 300, 330, 350, 370, 360, 340, 320, 300],
                color: '#007bff' // Biru
            }, {
                name: 'Beban (Expenses)',
                data: [100, 120, 130, 140, 160, 180, 190, 200, 210, 220, 230, 240],
                color: '#dc3545' // Merah
            }, {
                name: 'Aset (Assets)',
                data: [500, 520, 540, 560, 580, 600, 620, 640, 660, 680, 700, 720],
                color: '#28a745' // Hijau
            }, {
                name: 'Liabilitas (Liabilities)',
                data: [300, 310, 320, 330, 340, 350, 360, 370, 380, 390, 400, 410],
                color: '#fd7e14' // Oranye
            }]
        });
    </script>
</body>
</html>
