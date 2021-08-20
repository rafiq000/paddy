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
        <a class="active" href="">Transaction</a>
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
                $dis = $_POST['dis'];
                $price1 = $_POST['price'];
                $ty = $_POST['select'];
                $price2 = $price1/$ty; //33.33
                $wight = $_POST['wight'];//400
                $amount = $price2*$wight;

                $query = "INSERT INTO `trans_list` (`date`, `mobile`, `s_description`, `price`, `wight`, `amount`) VALUES ( now(), '$moba', '$dis', '$price2', '$wight ', '$amount') ;";

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
              <label for="fname">Mobile No:</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="moba" placeholder="Enter Costomer Mobile No">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Goods Name:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="dis" placeholder="Enetre Paddy name here">
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname">Price:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="price" placeholder="Enter Price Per MON">
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname">Select price type:</label>
            </div>
            <div class="col-75">
                <select id="country" name="select">
                    <option value="40">In Kg 40 kg = 1 mon</option>
                    <option value="37.5">In Bangla 37.5kg = 1 mon</option>
                </select>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname">Wight:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="wight" placeholder="Enter Wight In KG">
            </div>
          </div>

<!-- improve -->
          <div class="row">
            <input type="submit" name="submit" value="Enter">
          </div>
        </form>
      </div>
    </div>
</body>
</html>