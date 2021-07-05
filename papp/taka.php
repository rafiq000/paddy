<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "paddy_info";

        //Values from user:
        $detail = $_POST['taka_detail'];
        $taka = $_POST['taka'];

        //echo $Customer;

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);

        $sql = "INSERT INTO `taka` ( `taka_detail`, `taka`) VALUES ('$detail', '$taka');";
        // set the PDO error mode to exception
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // use exec() because no results are returned
              $conn->exec($sql);
              echo "New record created successfully";
            } catch(PDOException $e) {
              echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
            
            echo "<script>location.href='index.php'</script>";
?>