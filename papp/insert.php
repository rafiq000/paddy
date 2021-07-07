<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "paddy_info";

        //Values from user:
        $Customer = $_POST['fname'];
        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $wight = $_POST['wight'];
        $amount = $price*$wight;

        //echo $Customer;

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);

        $sql = "INSERT INTO `info` ( `Customer_name`, `Paddy_name`, `Price`, `Wight`,`Amount`) VALUES ('$Customer', '$pname', '$price', '$wight','$amount');";
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