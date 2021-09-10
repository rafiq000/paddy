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
        <a class="active" href="">Home</a>
        <a href="cashin.php">Cash In</a>
        <a href="customer.php">New Customer</a>
        <a href="report.php">Report</a>
        <a href="trans.php">Transaction</a>
        <a href="search.php">Search</a>

    </div>
    <!-- main -->
    <div class="content">
        <div class="summary">
            <?php
            $sql = "SELECT SUM(`amount`) as total FROM cash_in_list ";
            $query = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($query);
            $totalCash = $row['total'];
            echo "<div class='sammary'>";
            echo "  Total Cash In :  " . $totalCash;

            $sql = "SELECT SUM(`amount`) as total FROM trans_list";
            $query = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($query);
            $sum_of_paid = $row['total'];
            echo "  Total Paid Amount :  " . $sum_of_paid;

            $remin = $totalCash - $sum_of_paid;
            echo "  Remaining Cash :  " . $remin;
            echo "</div>";

            ?>
        </div>
        <h1 style="text-align: center;">Last transaction</h1>
        <div class="table-responsive" style="overflow: auto;">
            <table>
                <tr>
                    <th>Serial no.</th>
                    <th>Date</th>
                    <th>Mobile</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price(kg)</th>
                    <th>Wight(kg)</th>
                    <th>Amount(Taka)</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `trans_list` ORDER BY no DESC LIMIT 1";
                $query = mysqli_query($connection, $sql);
                $row = mysqli_fetch_array($query);
                $s_moba = $row["mobile"];
                $sql2="SELECT name FROM customer_list WHERE `mobile`= '$s_moba';";
                $query2 = mysqli_query($connection, $sql2);
                $row2 = mysqli_fetch_array($query2);
                    echo "<tr>
                                <td>" . $row["no"] . "</td>
                                <td>" . $row["date"] . "</td>
                                <td>" . $row["mobile"] . "</td>
                                <td>" . $row2["name"] . "</td>
                                <td>" . $row["s_description"] . "</td>
                                <td>" . $row["price"] . "</td>
                                <td>" . $row["wight"] . "</td>
                                <td>" . $row["amount"] . "</td>
                            </tr>";
                ?>

            </table>
        </div>

    </div>

</body>

</html>