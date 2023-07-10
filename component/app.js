let  openShopping = document.querySelector(".shopping");
let closeShopping = document.querySelector(".closeShopping");
let list = document.querySelector(".list");
let listCard = document.querySelector(".listCard");
let body = document.querySelector("body");
let total = document.querySelector(".total");
let quantity = document.querySelector(".quantity");

openShopping.addEventListener("click", () => {
  body.classList.add("active");
});
closeShopping.addEventListener("click", () => {
  body.classList.remove("active");
  window.location.replace("home.php");
});

let products = [
  {
    id: 1,
    name: "PRODUCT NAME 1",
    image: "image/1.PNG",
    price: 12,
  },
  {
    id: 2,
    name: "PRODUCT NAME 2",
    image: "image/2.PNG",
    price: 12,
  },
  {
    id: 3,
    name: "PRODUCT NAME 3",
    image: "image/3.PNG",
    price: 22,
  },
  {
    id: 4,
    name: "PRODUCT NAME 4",
    image: "image/4.PNG",
    price: 12,
  },
  {
    id: 5,
    name: "PRODUCT NAME 5",
    image: "image/5.PNG",
    price: 32,
  },
  {
    id: 6,
    name: "PRODUCT NAME 6",
    image: "image/6.PNG",
    price: 12,
  },
  {
    id: 7,
    name: "PRODUCT NAME 6",
    image: "image/5.PNG",
    price: 5,
  },
];
function reloadCard() {
  listCard.innerHTML = "";
  let count = 0;
  let totalPrice = 0;
  listCards.forEach((value, key) => {
    totalPrice = totalPrice + value.price;
    count = count + value.quantity;
    if (value != null) {
      let newDiv = document.createElement("li");
      newDiv.innerHTML = `
                <div><img src="component/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button class="px-2" onclick="changeQuantity(${key}, ${
        value.quantity-1
      })">-</button>
                    <div class="count">${value.quantity}</div>
                    <button class="px-2" onclick="changeQuantity(${key}, ${
        value.quantity+1
      })">+</button>
                </div>`;
      listCard.appendChild(newDiv);
    }
  });
  total.innerText = totalPrice.toLocaleString();
  quantity.innerText = count;
}
let listCards = [];
function initApp() {
  products.forEach((value, key) => {
    let newDiv = document.createElement("div");
    newDiv.classList.add("item");
    newDiv.innerHTML = `
            <img src="component/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
    list.appendChild(newDiv);
  });
}
initApp();
function addToCard(key) {
  if (listCards[key] == null) {
    listCards[key] = products[key];
    listCards[key].quantity = 1;
  }
  reloadCard();
}
function changeQuantity(key, quantity) {
  // console.log(key, quantity);
  if (quantity == 0) {
    delete listCards[key];
  } else {
    listCards[key].quantity = quantity;
    let newPrice = quantity * products[key].price
    listCards[key].price = newPrice



  }
  reloadCard();
}
