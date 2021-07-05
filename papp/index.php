<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Paddy App</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="center">
        <a href="cash.php" class="button">Cash In</a><br>
        <a href="castomer.php" class="button">Costomer</a><br>
        <a href="view.php" class="button">All Record</a>
    </div>
    <br>
    
    <div class="center">
        <h1>Last Record:</h1>
        <br>
    <?php
        echo "<table style='border: solid 1px black; width:auto'>";
        echo "<tr><th>Id</th><th>Customer_name</th><th>Paddy_name</th><th>Price</th><th>Wight</th><th>Amount to be paid</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }

          function current() {
            return "<td style='width:auto;border:1px solid black;'>" . parent::current(). "</td>";
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
    
     
</body>
</html>