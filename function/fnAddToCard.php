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
    let localItem = localStorage.getItem("items")

    let items;

    if (localItem) {
        items = JSON.parse(localItem)
    } else {
        items = []
    }

    let item = {
        name: '<?= $name; ?>',
        image: '<?= $img; ?>',
        price: '<?= $price; ?>'
    }

    items.forEach(i => {
        if (i.name.includes(item.name)) {} else {
            items.push(item)

            let itemsString = JSON.parse(items)

            localStorage.setItem("items", itemsString)
        }
    });

    console.log(localStorage.getItem("items"))

    <?php header("Location: ../home.php") ?>
</script>