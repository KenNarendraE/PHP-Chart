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
            <h1 class="logo">Dashboard</h1>
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
                "Budget vs. Actual"=> "budget.php",
                "Profit & Loss Overview"=> "profit.php",
                "Financial Forecasting"=> "financial_forecasting.php",
                "Accounts Payable & Receivable"=> "acc_payable.php",
                "General Ledger Summary"=> "general_ledger.php",
                "Expense Breakdown"=> "expense_breakdown.php",
                "Tax Compliance Status"=> "tax_compliance.php",
                "Audit & Compliance Reports"=> "audit_compliance.php",
                "Monthly Sales Performance"=> "monthly_sales.php",
                "Customer Conversion Rate"=> "customer_conversion.php",
                "Sales Pipeline & Forecasting"=> "sales_pipeline.php",
                "Top Selling Products/Services"=> "top_selling.php",
                "Sales Rep Performance"=> "sales_rep.php",
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
