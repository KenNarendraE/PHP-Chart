<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Forecasting</title>
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
        <p>Grafik ini menampilkan data keuangan aktual dan proyeksi keuangan untuk bulan mendatang.</p>
        
        <!-- Container Chart -->
        <div id="financial-forecast-chart" style="width:100%; height:400px;"></div>
    </div>

    <script>
        // Data Revenue & Expenses (Aktual)
        let revenueActual = [150, 180, 200, 220, 250, 270, 300, 320, 310, 290, 280, 260];
        let expensesActual = [100, 110, 130, 140, 160, 180, 200, 210, 200, 190, 180, 170];

        // Hitung Profit (Revenue - Expenses)
        let profitActual = revenueActual.map((rev, index) => rev - expensesActual[index]);

        // Forecast (Prediksi) menggunakan rata-rata kenaikan sebelumnya
        let forecastMonths = ['Jan+1', 'Feb+1', 'Mar+1'];
        let lastRevenue = revenueActual[revenueActual.length - 1];
        let lastExpenses = expensesActual[expensesActual.length - 1];

        let revenueForecast = [
            lastRevenue * 1.05,  // +5%
            lastRevenue * 1.10,  // +10%
            lastRevenue * 1.15   // +15%
        ];

        let expensesForecast = [
            lastExpenses * 1.04,  // +4%
            lastExpenses * 1.08,  // +8%
            lastExpenses * 1.12   // +12%
        ];

        let profitForecast = revenueForecast.map((rev, index) => rev - expensesForecast[index]);

        // Gabungkan data aktual & forecast
        let categories = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'].concat(forecastMonths);
        let revenueData = revenueActual.concat(revenueForecast);
        let expensesData = expensesActual.concat(expensesForecast);
        let profitData = profitActual.concat(profitForecast);

        // Inisialisasi Highcharts untuk Financial Forecasting
        Highcharts.chart('financial-forecast-chart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Financial Forecasting (Aktual & Prediksi)'
            },
            xAxis: {
                categories: categories,
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
                name: 'Revenue (Actual)',
                data: revenueActual,
                color: '#28a745'
            }, {
                name: 'Expenses (Actual)',
                data: expensesActual,
                color: '#dc3545'
            }, {
                name: 'Profit (Actual)',
                data: profitActual,
                color: '#ffc107'
            }, {
                name: 'Revenue (Forecast)',
                data: revenueForecast,
                color: '#28a745',
                dashStyle: 'ShortDash'
            }, {
                name: 'Expenses (Forecast)',
                data: expensesForecast,
                color: '#dc3545',
                dashStyle: 'ShortDash'
            }, {
                name: 'Profit (Forecast)',
                data: profitForecast,
                color: '#ffc107',
                dashStyle: 'ShortDash'
            }]
        });
    </script>

</body>
</html>
