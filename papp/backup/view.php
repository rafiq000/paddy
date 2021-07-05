<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Transtion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<a href="index.php" class="button">Home</a>
	<div class="info">
    <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Customer_name</th><th>Paddy_name</th><th>Price</th><th>Wight</th><th>Amount to be paid</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
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
        <div class="taka">
        <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Discription</th><th>Taka</th></tr>";

        class TableRows1 extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
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
        </div>
</body>
</html>