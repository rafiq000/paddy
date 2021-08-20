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
</head>
<body>
    <!-- sidebar -->
    <div class="sidebar">
        <a  href="index.php">Home</a>
        <a href="cashin.php">Cash In</a>
        <a href="customer.php">Customer list</a>
        <a href="report.php">Report</a>
        <a href="trans.php">Transaction</a>
        <a class="active" href="">Search</a>

    </div>
<!-- main -->
    <!-- main -->
    <div class="content">
        <div class="summary">
        <?php
            $sql ="SELECT SUM(`amount`) as total FROM cash_in_list ";
            $query =mysqli_query($connection, $sql);
            $row=mysqli_fetch_array($query);
            $totalCash = $row['total'];
            echo "<div class='sammary'>";
            echo "  Total Cash In :  ".$totalCash;

            $sql ="SELECT SUM(`amount`) as total FROM trans_list";
            $query =mysqli_query($connection, $sql);
            $row=mysqli_fetch_array($query);
            $sum_of_paid = $row['total'];
            echo "  Total Paid Amount :  ".$sum_of_paid;

            $remin = $totalCash-$sum_of_paid;
            echo "  Remaining Cash :  ".$remin;
            echo "</div><br><br>";

        ?>
        </div>
        <div class="container">
        <div class="search-box">
            <form action="" method="post">
            <div class="row">
            <div class="col-25">
              <label for="lname">Mobile No:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="moba" placeholder="MObile NO....">
            </div>
          </div>
<!-- improve -->
          <div class="row">
            <input type="submit" name="submit" value="Search">
          </div>
            </form>
        </div>
        </div><br><br>
        <div class="">
            <?php

                if (isset($_POST['submit'])) {
                    $moba = $_POST['moba'];
                    $sql = "SELECT * FROM `customer_list`  WHERE `mobile`='$moba';";
                    $query =mysqli_query($connection, $sql);
                    $row=mysqli_fetch_array($query);
                    $db_moba = $row["mobile"];
                    if ($db_moba==$moba) {
                      echo "<div style='overflow-x:auto;'>
                            <table>
                            <h1>Record of:".$moba."</h1>
                            <tr>
                                <th>Mobile No</th>
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Time of Reg.</th>
                            </tr>";
                                $sql ="SELECT * FROM `customer_list`  WHERE `mobile`='$moba';";
                                $query =mysqli_query($connection, $sql);

                                while ($row=mysqli_fetch_array($query)) {

                                echo "<tr>
                                        <td>".$row["mobile"]."</td>
                                        <td>".$row["name"]."</td>
                                        <td>".$row["address"]."</td>
                                        <td>".$row["time"]."</td>
                                    </tr>";
                                }
                       echo "</div>";

                       echo "<div style='overflow-x:auto;'>
                            <table>
                            <h1>Record of:".$moba."</h1>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Discription</th>
                                <th>Price</th>
                                <th>Wight</th>
                                <th>Amount(taka)</th>
                            </tr>";
                                $sql ="SELECT * FROM `trans_list` WHERE `mobile`='$moba';";
                                $query =mysqli_query($connection, $sql);

                                while ($row=mysqli_fetch_array($query)) {

                                echo "<tr>
                                        <td>".$row["no"]."</td>
                                        <td>".$row["date"]."</td>
                                        <td>".$row["s_description"]."</td>
                                        <td>".$row["price"]."</td>
                                        <td>".$row["wight"]."</td>
                                        <td>".$row["amount"]."</td>
                                    </tr>";
                                }
                       echo "</div>";
                    } else {
                        echo "<h1>No such Customer</h1>";
                        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            ?>
        </div>

    </div>
</body>
</html>