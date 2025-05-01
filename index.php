<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css"> 
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Dashboard</h1>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="chart.php">Chart</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <h2>Daftar Isi Chart</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Chart</th>
                    <th>Deskripsi</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Grafik Penjualan</td>
                    <td>Menampilkan data penjualan bulanan dalam bentuk diagram batang</td>
                    <td><a href="chart.php#penjualan">Lihat</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Grafik Pertumbuhan Pengguna</td>
                    <td>Visualisasi pertumbuhan jumlah pengguna dari waktu ke waktu</td>
                    <td><a href="chart.php#pengguna">Lihat</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Grafik Pendapatan</td>
                    <td>Diagram garis untuk menunjukkan fluktuasi pendapatan</td>
                    <td><a href="chart.php#pendapatan">Lihat</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
