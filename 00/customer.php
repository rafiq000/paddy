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
        <a class="active" href="">Customer list</a>
        <a href="report.php">Report</a>
        <a href="trans.php">Transaction</a>
        <a href="search.php">Search</a>

    </div>
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
            echo "</div>";

            if (isset($_POST['submit'])) {
                $moba = $_POST['moba'];
                $name = $_POST['name'];
                $addr = $_POST['addr'];

                $query = "INSERT INTO `customer_list` (`mobile`, `name`, `address`, `time`) VALUES ('$moba', '$name', '$addr', now());";

              if (mysqli_query($connection, $query)) {
                echo "Inserted Successfully<br>";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
              }

        ?>
        </div>
        <br><br>
        <div class="container">
      <h1>Cash-In</h1>
        <form action="" method="POST">
          <div class="row">
            <div class="col-25">
              <label for="fname">Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="name" placeholder="Name of Customer....">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Mobile NO</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="moba" placeholder="Mobile No....">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="addr" placeholder="Address....">
            </div>
          </div>
<!-- improve -->
          <div class="row">
            <input type="submit" name="submit" value="Enter">
          </div>
        </form>
      </div>
    </div>
    </div>
</body>
</html>