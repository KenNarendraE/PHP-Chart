<?php
include 'koneksi.php';

$tahun = 2024;
$query = "SELECT nama_supplier, lead_time FROM supplier_lead_time WHERE tahun = $tahun";
$result = mysqli_query($koneksi, $query);

$suppliers = [];
$leadTimes = [];

while ($row = mysqli_fetch_assoc($result)) {
    $suppliers[] = $row['nama_supplier'];
    $leadTimes[] = (float)$row['lead_time'];
}
?>

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
      <li><a href="#">Reports </a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
</nav>

<!-- Konten -->
<div class="container">
  <p>Analisis rata-rata waktu tunggu (lead time) dari berbagai supplier selama tahun <?= $tahun ?>.</p>

  <!-- Container Chart -->
  <div id="supplier-lead-time-chart" style="width:100%; height:400px;"></div>

  <!-- Debug Output -->
  <div style="display:flex;gap:20px;margin-top:30px;flex-wrap:wrap;">
    <pre style="flex:1;background:#f8f8f8;padding:10px;border:1px solid #ccc;">
Supplier:
<?php print_r($suppliers); ?>
    </pre>
    <pre style="flex:1;background:#f8f8f8;padding:10px;border:1px solid #ccc;">
Lead Time:
<?php print_r($leadTimes); ?>
    </pre>
  </div>
</div>

<script>
Highcharts.chart('supplier-lead-time-chart', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Supplier Lead Time Analysis - <?= $tahun ?>'
  },
  subtitle: {
    text: 'Rata-rata hari dari PO ke penerimaan barang'
  },
  xAxis: {
    categories: <?= json_encode($suppliers) ?>,
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
    data: <?= json_encode($leadTimes) ?>,
    color: 'orange'
  }]
});
</script>

</body>
</html>
