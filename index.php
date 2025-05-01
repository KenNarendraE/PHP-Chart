<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bismillah</title>
    <style>
        /* Navbar styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            padding: 15px 0;
            color: white;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        .logo {
            float: left;
            margin: 0;
            font-size: 24px;
        }

        .nav-links {
            list-style: none;
            float: right;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            display: inline-block;
            margin-left: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        /* Clearfix */
        .navbar::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Table styling */
        h2 {
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #f2f2f2;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
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
