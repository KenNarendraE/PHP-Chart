<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Order Management</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Business Chart</h1>
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
        <p>Menampilkan jumlah Work Order berdasarkan status tiap bulan tahun 2024.</p>

        <!-- Container Chart -->
        <div id="work-order-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        Highcharts.chart('work-order-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Work Order Management - 2024'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                crosshair: true,
                title: {
                    text: 'Bulan'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Work Order'
                }
            },
            tooltip: {
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: true,
                    shadow: false,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Completed',
                data: [20, 25, 22, 30, 28, 32, 35, 33, 30, 31, 29, 34],
                color: '#28a745' // Hijau
            }, {
                name: 'In Progress',
                data: [10, 12, 14, 13, 15, 14, 13, 12, 11, 13, 14, 12],
                color: '#007bff' // Biru
            }, {
                name: 'Pending',
                data: [5, 6, 4, 7, 6, 5, 6, 7, 8, 6, 5, 4],
                color: '#ffc107' // Kuning
            }, {
                name: 'Cancelled',
                data: [2, 1, 3, 2, 2, 1, 1, 2, 1, 2, 2, 1],
                color: '#dc3545' // Merah
            }]
        });
    </script>
</body>
</html>
