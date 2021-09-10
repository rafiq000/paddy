<?php
include "connect.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padday</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
            .topnav {
  overflow: hidden;
  background-color: #ebe8e8;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover:not(.active) {
    background-color: #555;
    color: white;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
        </style>
</head>
<body>
    <!-- sidebar -->
    <div class="sidebar">
        <a  href="index.php">Home</a>
        <a href="cashin.php">Cash In</a>
        <a href="customer.php">New Customer</a>
        <a class="active" href="report.php">Report</a>
        <a href="trans.php">Transaction</a>
        <a href="search.php">Search</a>
    </div>
<!-- main -->
    <div class="content">
<!-- Tab menu -->
        <div class="topnav">
            <a  href="report.php">Cash In</a>
            <a class="active" href="">All transaction List</a>
            <a  href="report3.php">All Customer List</a>
        </div>

<!-- Tab content -->
        <div class="tab2">

        <div style="overflow:auto;">
        <table>
        <h1 style="text-align: center;">All transaction List</h1>
        <tr>
            <th>Serial no.</th>
            <th>Date</th>
            <th>Mobile</th>
            <th>Description</th>
            <th>Price(kg)</th>
            <th>Wight(kg)</th>
            <th>Amount(Taka)</th>
        </tr>
        <?php
            $sql ="SELECT * FROM `trans_list`";
            $query =mysqli_query($connection, $sql);

            while ($row=mysqli_fetch_array($query)) {

            echo "<tr>
                    <td>".$row["no"]."</td>
                    <td>".$row["date"]."</td>
                    <td>".$row["mobile"]."</td>
                    <td>".$row["s_description"]."</td>
                    <td>".$row["price"]."</td>
                    <td>".$row["wight"]."</td>
                    <td>".$row["amount"]."</td>
                </tr>";
        }
        ?>

        </div>
        </div>
    </div>
</body>
</html>