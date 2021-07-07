<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Transtion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<div class="center">
    <a href="index.php" class="button">Home</a>
    <h1>Record of Customer:</h1>
    <?php
        echo "<table style='border: solid 1px black;overflow-y:auto;border-collapse: collapse;width: 100%;height: 70px;'>";
        echo "<tr><th>Id</th><th>Customer_name</th><th>Paddy_name</th><th>Price</th><th>Wight</th><th>Amount to be paid</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:150px;border:1px solid black;text-align: center;'>" . parent::current(). "</td>";
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
          $stmt = $conn->prepare("SELECT * FROM `info` ");
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
        <br><br>
       
        <div class="center">
          <h1>All cash</h1>
        <?php
        echo "<table style='border: solid 1px black;overflow:auto;border-collapse: collapse;width: 100%;height: 70px;'>";
        echo "<tr><th>No. </th><th>Discription</th><th>Taka</th></tr>";

        class TableRows1 extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:150px;border:1px solid black;text-align: center;'>" . parent::current(). "</td>";
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
          $stmt = $conn->prepare("SELECT * FROM `taka` ");
          $stmt->execute();

          // set the resulting array to associative
          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows1(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
          }

        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        ?>
        </div><br><br>
         <div class="center">
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