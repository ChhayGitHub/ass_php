<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="component/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
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
        <ul id="listCard" class="listCard overscroll">
            <?php
            while ($row = $resultsell->fetch_assoc()) {
                echo "<li id='items'>
                <div><img src='component/image/$row[image]' /></div>
                <div>$row[proName]</div>
                <div class='listprice'>$row[price]</div>
                <div >
                    <button onclick='discrement(this)'
                    id='discrement'
                     class='flex justify-center items-center rounded-lg'>
                        <div class='bg-red-500 rounded-lg px-2 text-white active:scale-95 '>
                            -
                        </div>
                    </button>
                    <div class='count' id='count'>
                        1
                    </div>
                    <button onclick='Increment(this)' class='rounded-lg ' id='increment'>
                        <input type='hidden' name='decrement' value='$row[proId]'>
                        <div class='bg-blue-500 rounded-lg px-2 text-white active:scale-95'>
                        +
                        </div>
                    </button>
                    <div style ='display:none'>$row[price]</div>
                    <svg xmlns='http://www.w3.org/2000/svg' class=' delete text-red-500 ml-2 cursor-pointer'
                    width='32' height='32' viewBox='0 0 24 24'>
                    <path fill='currentColor' d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12l1.41 1.41L13.41 14l2.12 2.12l-1.41 1.41L12 15.41l-2.12 2.12l-1.41-1.41L10.59 14l-2.13-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z'/></svg>
                </div>
            </li>";
            }


            ?>
            <span class="flex gap-2 text-white text-2xl font-semibold pt-5 justify-end pr-5">Total:

                <div class="total "> <?php echo $rowsum["total"] ?></div>
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
        let items;

        let a = "";
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
            let total = e.parentElement.children[2].innerHTML
            let price = e.parentElement.children[3].innerHTML

            localStorage.setItem('count', parseInt(count));
            localStorage.setItem('price', parseInt(price));
            e.parentElement.children[1].innerHTML = parseInt(JSON.parse(localStorage.getItem('count'))) - 1;
            localStorage.setItem('total', (parseInt(JSON.parse(localStorage.getItem('count'))) - 1) * parseInt(JSON.parse(localStorage.getItem('price'))));
            e.parentElement.parentElement.children[2].innerHTML = localStorage.getItem('total');
            Total();
        }

        function Increment(e) {

            let count = e.parentElement.children[1].innerHTML
            let price = e.parentElement.children[3].innerHTML


            localStorage.setItem('count', parseInt(count));
            localStorage.setItem('price', parseInt(price));
            e.parentElement.children[1].innerHTML = parseInt(JSON.parse(localStorage.getItem('count'))) + 1;
            localStorage.setItem('total', (parseInt(JSON.parse(localStorage.getItem('count'))) + 1) * parseInt(JSON.parse(localStorage.getItem('price'))))
            e.parentElement.parentElement.children[2].innerHTML = localStorage.getItem('total');
            Total();
        }

        function Total() {
            let total = 0;
            let item = document.querySelectorAll(".listprice");
            for (let i = 0; i < item.length; i++) {
                // total += parseInt(item[i].innerHTML)
                localStorage.setItem('total', parseInt(item[i].innerHTML));
                total += parseInt(localStorage.getItem('total'));
            }
            document.querySelector(".total").innerHTML = total;
        }

        function getItem() {
            let classListCart = document.getElementById("listCard")

            let localItem = localStorage.getItem("items")

            console.log(localItem)

            if (localItem) {
                items = JSON.parse(localItem)

                items.forEach(i => {
                    classListCart.innerHTML += `<li id='items'>
                <div><img src='component/image/${i.image}' /></div>
                <div>$row[proName]</div>
                <div class='listprice'>${i.price}</div>
                <div >
                    <button onclick='discrement(this)'
                    id='discrement'
                     class='flex justify-center items-center rounded-lg'>
                        <div class='bg-red-500 rounded-lg px-2 text-white active:scale-95 '>
                            -
                        </div>
                    </button>
                    <div class='count' id='count'></div>
                    <button onclick='Increment(this)' class='rounded-lg ' id='increment'>
                        <input type='hidden' name='decrement' value='${i.price}'>
                        <div class='bg-blue-500 rounded-lg px-2 text-white active:scale-95'>
                        +
                        </div>
                    </button>
                    <div style ='display:none'>${i.price}</div>
                    <svg xmlns='http://www.w3.org/2000/svg' class=' delete text-red-500 ml-2 cursor-pointer'
                    width='32' height='32' viewBox='0 0 24 24'>
                    <path fill='currentColor' d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12l1.41 1.41L13.41 14l2.12 2.12l-1.41 1.41L12 15.41l-2.12 2.12l-1.41-1.41L10.59 14l-2.13-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z'/></svg>
                </div>
            </li>`
                });

            } else {
                classListCart.innerHTML = "<div class='text-white text-center'> No Item on Your Cart</div>"
            }
        }

        getItem()
    </script>

</body>


</html>