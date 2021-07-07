<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "paddy_info";

        //echo $Customer;

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);

        $sql = "TRUNCATE info;";
        // set the PDO error mode to exception
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // use exec() because no results are returned
              $conn->exec($sql);
            } catch(PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);

        $sql = "TRUNCATE taka;";
        // set the PDO error mode to exception
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // use exec() because no results are returned
              $conn->exec($sql);
            } catch(PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
            
            echo "<script>location.href='index.php'</script>";
?>