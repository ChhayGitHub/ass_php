<?php
// include("../component/connection.php");

// $proName = $_GET['name'];
// $sqlTempSell = "SELECT * FROM tbtempsell";
// $result = $con->query($sqlTempSell);
// if (mysqli_num_rows($result) > 0) {

//     $sql = "select * from tbtempsell where proName like '%$proName%'";

//     $result = $con->query($sql);

//     $data = $result->fetch_assoc();

//     if (!$data) {

//         $sql = "INSERT INTO tbtempsell(image,proName,price) VALUES ('$_GET[img]','$_GET[name]','$_GET[price]')";
//         $result = $con->query($sql);

//     }
// } else {
//     $sql = "INSERT INTO tbtempsell(image,proName,price) VALUES ('$_GET[img]','$_GET[name]','$_GET[price]')";
//     $con->query($sql);
// }
// header("Location: ../home.php");

extract($_GET);

?>

<script>

    // let items = JSON.parse(localStorage.getItem('items')) 

    // console.log(items);

    // let item = {
    //     image: '<?= $img;?>',
    //     proName: '<?= $name;?>',
    //     price: '<?= $price;?>'
    // }

    // for (let i = 0; i < items.length; i++) {
    //     if(items[i].name.includes(item.name)) {
    //         console.log("have")
    //     }else{
    //         console.log("Not Have")
    //     }
    // }


    // items.push(item);

    // localStorage.setItem("items", JSON.stringify(items));

    // console.log(localStorage.getItem("items"));
    // // <?php header("../home.php") ?>
</script>
