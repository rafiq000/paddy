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
        <a href="customer.php">Customer list</a>
        <a class="active" href="report.php">Report</a>
        <a href="trans.php">Transaction</a>
        <a href="search.php">Search</a>
    </div>
<!-- main -->
    <div class="content">
<!-- Tab menu -->
        <div class="topnav">
            <a  href="report.php">Cash In</a>
            <a href="report2.php">All transaction</a>
            <a class="active" href="">All Customer List</a>
        </div>

<!-- Tab content -->


        <div style="overflow-x:auto;">
        <table>
        <h1 style="text-align: center;">All Customer List</h1>
        <tr>
            <th>Mobile No</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Time of Reg.</th>
        </tr>
        <?php
            $sql ="SELECT * FROM `customer_list`;";
            $query =mysqli_query($connection, $sql);

            while ($row=mysqli_fetch_array($query)) {

            echo "<tr>
                    <td>".$row["mobile"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["address"]."</td>
                    <td>".$row["time"]."</td>
                </tr>";
        }
        ?>

        </div>
        </div>
    </div>
</body>
</html>