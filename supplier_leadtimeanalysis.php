<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Supplier Lead Time Analysis</title>
  <link rel="stylesheet" href="assets/style.css" />
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
  <p>Analisis rata-rata waktu tunggu (lead time) dari berbagai supplier selama tahun 2024.</p>

  <!-- Container Chart -->
  <div id="supplier-lead-time-chart" style="width:100%; height:400px;"></div>
</div>

<script>
  Highcharts.chart('supplier-lead-time-chart', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Supplier Lead Time Analysis - 2024'
    },
    subtitle: {
      text: 'Rata-rata hari dari PO ke penerimaan barang'
    },
    xAxis: {
      categories: ['Supplier A', 'Supplier B', 'Supplier C', 'Supplier D', 'Supplier E'],
      crosshair: true,
      title: {
        text: 'Nama Supplier'
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Lead Time (Hari)'
      }
    },
    tooltip: {
      shared: true,
      valueSuffix: ' hari'
    },
    plotOptions: {
      column: {
        grouping: true,
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          format: '{point.y} hari'
        }
      }
    },
    series: [{
      name: 'Lead Time',
      data: [7, 10, 6, 9, 8],
      color: '#fd7e14' // Oranye
    }]
  });
</script>

</body>
</html>
