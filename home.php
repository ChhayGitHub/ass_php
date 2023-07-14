<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="component/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</head>
<?php
include("./component/connection.php");
$sql = "select * from tbproducts";
$result = $con->query($sql);

//
$sell = "select * from tbtempsell";
$resultsell = $con->query($sell);
//
$count = "SELECT COUNT(proName) as count FROM tbtempsell";
$resultcount = $con->query($count);
$row = $resultcount->fetch_assoc();
//
$sum = "SELECT SUM(price) as total FROM tbtempsell";
$resultsum = $con->query($sum);
$rowsum = $resultsum->fetch_assoc();
// print_r($rowsum);

// exit();
?>



<?php
include($_SERVER['DOCUMENT_ROOT'] . '/ass_php/component/headerHome.php');
?>

<body>
    <div class="container">

        <div class="list grid grid-cols-4">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<div class='item'>
                <img src='component/image/$row[image]'>
                <div class='title'>$row[proName]</div>
                <div class='price'>$row[price]</div>
                <button><a href='./function/fnAddToCard.php?img=$row[image]&name=$row[proName]&price=$row[price]'>Add To Card</a> </button>
            </div>";
            }
            ?>

        </div>
    </div>
    <div class="card">
        <h1>Card</h1>
        <ul class="listCard overscroll">
            <?php
            while ($row = $resultsell->fetch_assoc()) {
                echo "<li>
                <div><img src='component/image/$row[image]' /></div>
                <div>$row[proName]</div>
                <div class='listprice'>$row[price]</div>
                <div >
                    <button onclick='discrement(this)' class='flex justify-center items-center rounded-lg'>
                        <div class='bg-red-500 rounded-lg px-2 text-white active:scale-95 '>
                            -
                        </div>
                    </button>
                    <div class='count'>1</div>
                    <button onclick='Increment(this)' class='rounded-lg'>
                        <div class='bg-blue-500 rounded-lg px-2 text-white active:scale-95'>
                        +
                        </div>
                    </button>
                    <div style ='display:none'>$row[price]</div>
                </div>
            </li>";
            }


            ?>
            <span class="flex gap-2 text-white text-2xl font-semibold">Total:

                <div class="total ">  <?php echo $rowsum["total"] ?></div>
            </span>
        </ul>
        <div class="checkOut">
            <div class="text-white">Buy now</div>
            <div class="closeShopping">Close</div>
        </div>
    </div>

    <script>
        let openShopping = document.querySelector('.shopping');
        let closeShopping = document.querySelector('.closeShopping');
        let body = document.querySelector('body');

        let a = ""
        openShopping.addEventListener('click', () => {
            if (a == "active") {
                body.classList.remove('active');
                a = ""
                window.location.replace("home.php")
            } else {
                body.classList.add('active');
                a = "active";
            }

        })
        closeShopping.addEventListener('click', () => {
            body.classList.remove('active');
            window.location.replace("home.php")
        })

        function discrement(e) {
            let count = e.parentElement.children[1].innerHTML
            let price = e.parentElement.children[3].innerHTML
            if (parseInt(count) > 1) {
                e.parentElement.children[1].innerHTML = parseInt(count) - 1;
                e.parentElement.parentElement.children[2].innerHTML = parseInt(price) * (parseInt(count) - 1);
            }
            Total();
        }

        function Increment(e) {
            let count = e.parentElement.children[1].innerHTML
            let price = e.parentElement.children[3].innerHTML


            e.parentElement.children[1].innerHTML = parseInt(count) + 1;

            e.parentElement.parentElement.children[2].innerHTML = parseInt(price) * (parseInt(count) + 1);

            Total();
        }

        function Total() {
            let total = 0;
            let item = document.querySelectorAll(".listprice");
            for (let i = 0; i < item.length; i++) {
                total += parseInt(item[i].innerHTML)
            }

            document.querySelector(".total").innerHTML = total;
        }
    </script>

</body>


</html>