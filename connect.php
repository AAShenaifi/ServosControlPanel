<?php 

    if(isset($_POST['M1']) || isset($_POST['M2']) || isset($_POST['M3']) || isset($_POST['M4']) || isset($_POST['M5'])) { 
        $M1 = $_POST["M1"]; 
        $M2 = $_POST["M2"]; 
        $M3 = $_POST["M3"]; 
        $M4 = $_POST["M4"]; 
        $M5 = $_POST["M5"]; 
    } 

    $conn = new mysqli('localhost', 'root', '', 'robot_arm_joints'); 

    if($conn->connect_error){ 
        die('Connection Failed : '.$conn->connect_error); 
    }else{ 
        $stmt = $conn->prepare("insert into motors(M1,M2,M3,M4,M5) values(?,?,?,?,?)"); 
        $stmt->bind_param("iiiii", $M1, $M2, $M3, $M4, $M5); 
        $stmt->execute(); 
        echo "Done"; 
        $stmt->Close(); 
        //$conn->Close(); 
    } 

    $sql = "SELECT * FROM motors"; 
    $result = $conn->query($sql); 

    while ($fetch = mysqli_fetch_assoc($result)) { 

        echo "<br> M1:".$fetch['M1']; 
        echo "  M2:".$fetch['M2']; 
        echo "  M3:".$fetch['M3']; 
        echo "  M4:".$fetch['M4']; 
        echo "  M5:".$fetch['M5']; 
    } 

?>
