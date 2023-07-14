<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "it113";
$conn = new mysqli($host,$username,$password,$dbname);

if($conn->connect_error){
	die("Error connecting...".$conn->connect_error);
}
$proName = $_GET['name'];
$sqlTempSell = "SELECT * FROM tbtempsell";
$result = $conn->query($sqlTempSell);
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()){
        // if ($proName != $row['proName']){
        //     // $sql = "INSERT INTO tbtempsell(image,proName,price) VALUES ('$_GET[img]','$_GET[name]','$_GET[price]')";
        //     // $conn->query($sql);
        //     echo "<script> console.log('not equal')</script>";
        // }else{
        //     echo "<script> console.log(' equal')</script>";
        // }
        echo $proName == $row['proName'];
        // echo $proName .'<br>'.  $row['proName'];
    }
}else{
    $sql = "INSERT INTO tbtempsell(image,proName,price) VALUES ('$_GET[img]','$_GET[name]','$_GET[price]')";
            $conn->query($sql);
}
// header("Location: ../home.php");