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
                "Supplier Performance Analysis"=> "sup_performance.php",
                "Purchase Order Tracking"=> "purchase_order.php",
                "Cost Savings & Spend Analysis"=> "cost_saving.php",
                "Lead Time & Delivery Status"=> "lead_time.php",
                "Inventory Purchase Trends"=> "inventory_purchase.php",
                "Machine Utilization Rate"=> "machine_utilization.php",
                "Production Output vs. Target"=> "production_outputvstarget.php",
                "Downtime & Maintenance Tracking"=> "downtime_maintenance.php",
                "Quality Control Metrics"=> "Quality_ControlMetrics.php",
                "Work Order Management"=> "work_ordermanagement.php",
                "Demand Forecasting & Planning"=> "demand_forecasting&planning.php",
                "Inventory Turnover Ratio"=> "inventory_turnoverratio.php",
                "Work-In-Progress (WIP) Tracking"=> "workinprogresstracking.php",
                "Supply & Demand Alignment"=> "supply&demandalignment.php",
                "Stock Reorder Point"=> "stockreorderpoint.php",
                "Delivery Performance & Status"=> "delivery_performance.php",
                "Freight & Transportation Costs"=> "freight&transportationcosts.php",
                "Warehouse Capacity Utilization"=> "warehouse_capacityutilization.php",
                "Order Fulfillment Cycle Time"=> "order_fulfillmentcycletime.php",
                "Supplier Lead Time Analysis"=> "supplier_leadtimeanalysis.php"
            ];

            foreach ($charts as $chartName => $chartFile) {
                echo "<a href='$chartFile' class='chart-item'>$chartName</a>";
            }
            ?>
        </div>
    </div>

</body>
</html>
