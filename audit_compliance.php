<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit & Compliance Reports</title>
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
        <p>Menampilkan jumlah audit yang dilakukan serta tingkat kepatuhan setiap bulannya.</p>
        
        <!-- Container Chart -->
        <div id="audit-compliance-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Inisialisasi Highcharts untuk Audit & Compliance Reports
        Highcharts.chart('audit-compliance-chart', {
            chart: {
                type: 'column' // Menggunakan bar chart (vertical bars)
            },
            title: {
                text: 'Audit & Compliance Reports'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Audit & Kepatuhan (%)'
                }
            },
            series: [{
                name: 'Audit Dilakukan',
                data: [5, 7, 9, 6, 8, 10, 12, 15, 14, 13, 11, 9],
                color: '#0367fc'
            }, {
                name: 'Kepatuhan (%)',
                data: [75, 80, 78, 85, 88, 90, 92, 95, 93, 91, 89, 87],
                color: '#28a745'
            }]
        });
    </script>
</body>
</html>
