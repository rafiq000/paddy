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
        <a class="active" href="">Report</a>
        <a href="trans.php">Transaction</a>
        <a href="search.php">Search</a>
    </div>
<!-- main -->
    <div class="content">
        <!-- Tab menu -->
        <div class="topnav">
            <a class="active" href="">Cash In List</a>
            <a href="report2.php">All transaction</a>
            <a href="report3.php">All Customer List</a>
        </div>




<!-- Tab content -->
        <div class="tab1">
        <div style="overflow:auto;">
        <table>
        <h1 style="text-align: center;">Cash In list</h1>
        <tr>
            <th>Serial no.</th>
            <th>Discription</th>
            <th>Amount (Taka)</th>
            <th>Time of Cash IN.</th>
        </tr>
        <?php
            $sql ="SELECT * FROM `cash_in_list`";
            $query =mysqli_query($connection, $sql);

            while ($row=mysqli_fetch_array($query)) {

            echo "<tr>
                    <td>".$row["no"]."</td>
                    <td>".$row["discription"]."</td>
                    <td>".$row["amount"]."</td>
                    <td>".$row["time"]."</td>
                </tr>";
        }
        ?>
        </table>
        </div>
        </div>
    </div>
</body>
</html>