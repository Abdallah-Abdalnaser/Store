let li2 = document.querySelector("header .contaner .links > ul > li:nth-child(2)");
let ul = document.querySelector("header .contaner .links > ul");
let ulMenu = document.querySelector("header .contaner .links ul li:nth-child(2) ul");
let bar = document.querySelector("header .contaner .links > i");
let cart = document.querySelector("header .contaner .links .card i");
let purchases = document.querySelector("header .contaner .links .card .purchases");
let loading = document.getElementById("loading")
//loading
window.addEventListener("load",()=>{
  loading.style.display="none";
  if (innerWidth <=811) {
    clearInterval(move);
    clearInterval(move2);
    clearInterval(move3);
    clearInterval(move4);
  }
});
//menu
window.addEventListener("click",function(i){
  if (i.target.classList.contains("menu")) {
    if (li2.classList.contains("show")) {
      if (innerWidth <= 700) {
        li2.style.marginBottom="0px";
      };
      ulMenu.style.transform="rotateX(90deg)";
      li2.classList.remove("show");
    } else {
      if (innerWidth <= 700) {
        li2.style.marginBottom="150px";
      };
      ulMenu.style.transform="rotateX(0deg)";
      li2.classList.add("show");
    };
  }else {
    ulMenu.style.transform="rotateX(90deg)";
    li2.style.marginBottom="0px";
  };
});
// bar
bar.addEventListener("click",function(i){
    if (!i.target.classList.contains("hidden")) {
      bar.style.transform="rotate(-90deg)";
      bar.style.color="#2196f3";
      ul.style.transform="rotateX(0deg)";
      bar.classList.toggle("hidden");
    }else {
      bar.style.transform="rotate(0deg)";
      ul.style.transform="rotateX(90deg)";
      bar.style.color="black";
      bar.classList.toggle("hidden");
    };
  });
// solve problem in responsef
window.addEventListener("resize",function(){
  if (innerWidth > 700) {
    ulMenu.style.transform="rotateX(90deg)";
    li2.style.marginBottom="0px";
    ul.style.transform="rotate(0deg)";
  }else {
    ul.style.transform="rotatex(90deg)";
    bar.style.transform="rotate(0deg)";
    bar.style.color="black";
  };
});
// cart Shopping
document.addEventListener("click",function(i) {
  if (i.target.classList.contains("fa-cart-shopping")) {
    if (!i.target.classList.contains("showCart")) {
      purchases.style.transform="rotate(0deg)";
      cart.style.color="#2196f3";
      cart.classList.toggle("showCart");
    }else {
      purchases.style.transform="rotatex(90deg)";
      cart.style.color="black";
      cart.classList.toggle("showCart");
    }
  }else {
    purchases.style.transform="rotatex(90deg)";
    cart.style.color="black";
    cart.classList.toggle("showCart");
  }
});
//icon angle
let cards = document.querySelectorAll(".product .contaner .cards");
let cardsArray=Array.from(cards);
// console.log(cardsArray);
document.addEventListener("click",function(e) {
  if (e.target.className === "fa-solid fa-angle-left one") {
    cardsArray[0].scrollBy({
      left:-290
    });
    clearInterval(move);
  } else if (e.target.className === "fa-solid fa-angle-right one") {
    cardsArray[0].scrollBy({
      left:290
    });
    clearInterval(move);
  } else if (e.target.className === "fa-solid fa-angle-left two") {
      cardsArray[1].scrollBy({
      left:-290
    });
    clearInterval(move2);
  } else if (e.target.className === "fa-solid fa-angle-right two") {
      cardsArray[1].scrollBy({
      left:290
    });
    clearInterval(move2);
  } else if (e.target.className === "fa-solid fa-angle-left three") {
      cardsArray[2].scrollBy({
      left:-290
    });
    clearInterval(move3);
  } else if (e.target.className === "fa-solid fa-angle-right three") {
      cardsArray[2].scrollBy({
      left:290
    });
    clearInterval(move3);
  } else if (e.target.className === "fa-solid fa-angle-left four") {
      cardsArray[3].scrollBy({
      left:-290
    });
    clearInterval(move4);
  } else if (e.target.className === "fa-solid fa-angle-right four") {
      cardsArray[3].scrollBy({
      left:290
    });
    clearInterval(move4);
  };
});
let move = setInterval(function(){
  if ((cardsArray[0].scrollLeft + cardsArray[0].clientWidth) < cardsArray[0].scrollWidth) {
    cardsArray[0].scrollBy({
      left:290
    });
  }else {
    cardsArray[0].scrollBy({
      left:-1730
    });
  };
},3000);
let move2 = setInterval(function(){
  if ((cardsArray[1].scrollLeft + cardsArray[1].clientWidth) < cardsArray[1].scrollWidth) {
    cardsArray[1].scrollBy({
      left:290
    });
  }else {
    cardsArray[1].scrollBy({
      left:-1730
    });
  };
},3200);
let move3 = setInterval(function(){
  if ((cardsArray[2].scrollLeft + cardsArray[2].clientWidth) < cardsArray[2].scrollWidth) {
    cardsArray[2].scrollBy({
      left:290
    });
  }else {
    cardsArray[2].scrollBy({
      left:-1730
    });
  };
},3400);
let move4 = setInterval(function(){
  if ((cardsArray[3].scrollLeft + cardsArray[3].clientWidth) < cardsArray[3].scrollWidth) {
    cardsArray[3].scrollBy({
      left:290
    });
  }else {
    cardsArray[3].scrollBy({
      left:-1730
    });
  };
},3600);

window.addEventListener("resize",function() {
  if (innerWidth <=811) {
    clearInterval(move);
    clearInterval(move2);
    clearInterval(move3);
    clearInterval(move4);
  }
});
