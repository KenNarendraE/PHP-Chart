<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Chart</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Hubungkan ke CSS -->
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
        <h2>Daftar Chart</h2>
        <div class="chart-list">
            <?php
            $charts = [
                "Cash Flow Analysis" => "cashflow.php",
                "Revenue vs. Expenses"=> "revenue.php",
                "Budget vs. Actual"=> "cashflow.php",
                "Profit & Loss Overview"=> "cashflow.php",
                "Financial Forecasting"=> "cashflow.php",
                "Accounts Payable & Receivable"=> "cashflow.php",
                "General Ledger Summary"=> "cashflow.php",
                "Expense Breakdown"=> "cashflow.php",
                "Tax Compliance Status"=> "cashflow.php",
                "Audit & Compliance Reports"=> "cashflow.php",
                "Monthly Sales Performance"=> "cashflow.php",
                "Customer Conversion Rate"=> "cashflow.php",
                "Sales Pipeline & Forecasting"=> "cashflow.php",
                "Top Selling Products/Services"=> "cashflow.php",
                "Sales Rep Performance"=> "cashflow.php",
                "Supplier Performance Analysis"=> "cashflow.php",
                "Purchase Order Tracking"=> "cashflow.php",
                "Cost Savings & Spend Analysis"=> "cashflow.php",
                "Lead Time & Delivery Status"=> "cashflow.php",
                "Inventory Purchase Trends"=> "cashflow.php",
                "Machine Utilization Rate"=> "cashflow.php",
                "Production Output vs. Target"=> "cashflow.php",
                "Downtime & Maintenance Tracking"=> "cashflow.php",
                "Quality Control Metrics"=> "cashflow.php",
                "Work Order Management"=> "cashflow.php",
                "Demand Forecasting & Planning"=> "cashflow.php",
                "Inventory Turnover Ratio"=> "cashflow.php",
                "Work-In-Progress (WIP) Tracking"=> "cashflow.php",
                "Supply & Demand Alignment"=> "cashflow.php",
                "Stock Reorder Point"=> "cashflow.php",
                "Delivery Performance & Status"=> "cashflow.php",
                "Freight & Transportation Costs"=> "cashflow.php",
                "Warehouse Capacity Utilization"=> "cashflow.php",
                "Order Fulfillment Cycle Time"=> "cashflow.php",
                "Supplier Lead Time Analysis"=> "cashflow.php"
            ];

            foreach ($charts as $chartName => $chartFile) {
                echo "<a href='$chartFile' class='chart-item'>$chartName</a>";
            }
            ?>
        </div>
    </div>

</body>
</html>
