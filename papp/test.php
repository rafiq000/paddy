<?php 
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
          $sum = $row['total'];


          }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;

        echo $sum;


 ?>