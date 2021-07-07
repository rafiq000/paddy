<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Paddy App</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="center">
        <a href="cash.php" class="button">Cash In</a>&nbsp;&nbsp;
        <a href="castomer.php" class="button">Costomer</a>&nbsp;&nbsp;
        <a href="view.php" class="button">All Record</a>&nbsp;&nbsp;
        <a href="delete_all.php" class="button" style="background-color: red;">Delete All</a>&nbsp;&nbsp;

        
    </div>
    <br>
    
    <div class="center">
        <h1>Last Record:</h1>
        <br>
    <?php
        echo "<table style='border: solid 1px black;overflow-x:auto;border-collapse: collapse;width: 100%;height: 70px;'>";
        echo "<tr><th>Id</th><th>Customer_name</th><th>Paddy_name</th><th>Price</th><th>Wight</th><th>Amount to be paid</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:auto;border:1px solid black;text-align: center'>" . parent::current(). "</td>";
          }

          function beginChildren() {
            echo "<tr>";
          }

          function endChildren() {
            echo "</tr>" . "\n";
          }
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "paddy_info";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM `info` ORDER BY ID DESC LIMIT 1");
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
          }
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        ?>
        </div>
        <br>
        <br>
        <div class="center">
          <h1>Sammary</h1>
          <?php
          //geeting total amount tobe paid: 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "paddy_info";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT SUM(`Amount`) as total FROM info ");
          $stmt->execute();

          // set the resulting array to associative
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $sum_of_paid = $row['total'];


          }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;

          //getting total cashin:

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "paddy_info";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT SUM(`taka`) as total FROM taka ");
          $stmt->execute();

          // set the resulting array to associative
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $totalCash = $row['total'];


          }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        $remin = $totalCash-$sum_of_paid;

        echo "Total Cash In:  ";
        echo $totalCash;
        echo " Taka";
        echo "<br>";
        echo "Total Paid Amount :  ";
        echo $sum_of_paid;
        echo " Taka";
        echo "<br>";
        echo "Total Paid Amount :  ";
        echo $remin;
        echo " Taka";


          ?>
        </div><br><br>
    
     
</body>
</html>