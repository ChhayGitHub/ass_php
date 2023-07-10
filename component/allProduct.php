<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="component/style.css">
</head>

<body class="active">

    <div class="container">
        <header>
            <h1>Your Shopping Cart</h1>
            <div class="shopping">
                <img src="image/shopping.svg">
                <span class="quantity"><?php echo $row['count'] ?></span>
            </div>
        </header>

        <div class="list">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<div class='item'>
                <img src='image/$row[image]'>
                <div class='title'>$row[proName]</div>
                <div class='price'>$row[price]</div>
                <button><a href='tmpsell.php?img=$row[image]&name=$row[proName]&price=$row[price]'>Add To Card</a> </button>
                
            </div>";
            }
            ?>

        </div>
    </div>
    <div class="card">
        <h1>Card</h1>
        <ul class="listCard">
            <?php
            while ($row = $resultsell->fetch_assoc()) {
                echo "<li>
                <div><img src='image/$row[imagename]' /></div>
                <div>$row[name]</div>
                <div class='listprice'>$row[price]</div>
                <div>
                    <button onclick='discrement(this)'>-</button>
                    <div class='count'>1</div>
                    <button onclick='Increment(this)'>+</button>
                    <div style ='display:none'>$row[price]</div>
                </div>
            </li>";
            }


            ?>

        </ul>
        <div class="checkOut">
            <div class="total"><?php echo $rowsum["total"] ?></div>
            <div class="closeShopping">Close</div>
        </div>
    </div>

    <!-- <script src="app.js"></script> -->

    <script>
        let openShopping = document.querySelector('.shopping');
        let closeShopping = document.querySelector('.closeShopping');
        let body = document.querySelector('body');
        openShopping.addEventListener('click', () => {
            body.classList.add('active');
        })
        closeShopping.addEventListener('click', () => {
            body.classList.remove('active');
        })

        function discrement(e) {
            let count = e.parentElement.children[1].innerHTML
            let price = e.parentElement.children[3].innerHTML
            if (parseInt(count) > 1) {
                e.parentElement.children[1].innerHTML = parseInt(count) - 1;
                e.parentElement.parentElement.children[2].innerHTML = parseInt(price) * (parseInt(count) - 1);
            }
            // console.log(e.parentElement.children[1].innerHTML);

            // console.log(e);
            Total();
        }

        function Increment(e) {
            let count = e.parentElement.children[1].innerHTML
            let price = e.parentElement.children[3].innerHTML

            // console.log(e.parentElement.children[1].innerHTML);
            e.parentElement.children[1].innerHTML = parseInt(count) + 1;

            e.parentElement.parentElement.children[2].innerHTML = parseInt(price) * (parseInt(count) + 1);
            // count = parseInt(count) + 1;
            // console.log(e.parentElement.parentElement.children);
            // console.log(Total());
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
 <script src="https://cdn.tailwindcss.com"></script>
  <script src="component/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>


</html>