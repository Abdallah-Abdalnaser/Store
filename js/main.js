let li2 = document.querySelector("header .contaner .links > ul > li:nth-child(2)");
let ul = document.querySelector("header .contaner .links > ul");
let ulMenu = document.querySelector("header .contaner .links ul li:nth-child(2) ul");
let bar = document.querySelector("header .contaner .links > i");
let cart = document.querySelector("header .contaner .links .card i");
let purchases = document.querySelector("header .contaner .links .card .purchases");
let loading = document.getElementById("loading");
//loading
window.addEventListener("load",()=>{
  loading.style.display="none";
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
cart.addEventListener("click",function(i) {
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
// Card shopping
// addCard Button
let addCard = document.querySelectorAll(".product .contaner .cards .card button");
let addCardArray = Array.from(addCard);
// cards
let Cards = document.querySelectorAll(".product .contaner .cards .card button");
let CardsArray = Array.from(Cards);
// All productName in page 
let productName = document.querySelectorAll(".product .contaner .cards .card p a");
let productNameArray = Array.from(productName);
// All price in page 
let price = document.querySelectorAll(".product .contaner .cards .card span");
let priceArray = Array.from(price);
// All src(img) in page 
let srcImg = document.querySelectorAll(".product .contaner .cards .card .image a img");
let srcImgArray = Array.from(srcImg);
//div
let div = document.querySelector("header .contaner .links .card .purchases")
// Array that will save Object
let Chosse = [];
//check if there is data in local storage or not to update the Array (chosse)
if (localStorage.getItem("product")) {
  Chosse = JSON.parse(localStorage.getItem("product"))
};
// getDataFromLocalStorage
getfromlocalstorage();
//if the card is empty you will see (the card is empty)
if (Chosse.length === 0) {
  div.innerHTML="";
  let p =document.createElement("p");
  p.innerHTML="Your Card Is Empity";
  div.appendChild(p);
}
if (Chosse.length === 0) {
  document.getElementById("NOP").style.display="none";
} else {
  document.getElementById("NOP").style.display="flex";
}
//Delet product
div.addEventListener("click",function(e){
  if (e.target.classList.contains("del")) {
    if (Chosse.length === 0) {
      document.getElementById("NOP").style.opacity="0";
    }
    // remove from localstorage
    let li = e.target.parentElement;
    DeletLocalStorage(li.parentElement.getAttribute("data-id"));
    // remove from body
    e.target.parentElement.remove();
    document.getElementById("NOP").innerHTML=Chosse.length;
    document.getElementById("delete").play();
    if (Chosse.length === 0) {
      document.getElementById("NOP").style.display="none";
    } else {
      document.getElementById("NOP").style.display="flex";
    }
  }
  //if the card is empty you will see (the card is empty)
  if (Chosse.length === 0) {
    div.innerHTML="";
    let p =document.createElement("p");
    p.innerHTML="Your Card Is Empity";
    div.appendChild(p);
  }
});
// looping in all card 
addCardArray.forEach(function(i,index) {
  i.onclick=function () {
    document.getElementById("add").play();
    let price = priceArray[index].innerHTML.slice(0,(priceArray[index].innerHTML.length - 3));
    addProductToCard(productNameArray[index].innerHTML,price,srcImgArray[index].getAttribute("src"));
  }
});
function addProductToCard(productName,productPrice,imgSrc) {
  //create Object
  let yourChosse ={
    id:Date.now(),
    pName:productName,
    pPrice:productPrice,
    pImg:imgSrc,
    pNumber:1
  };
  if (Chosse.length === 0) {
    // addObjectToArray
    Chosse.push(yourChosse);
    // createElementIBody
    addToBody(Chosse);
    // addtolocalstorage
    addtolocalstorage(Chosse);
  }else {
    for (let i = 0; i < Chosse.length; i++) {
      if (Chosse[i].pName === yourChosse.pName) {
        yourChosse.pNumber = (Chosse[i].pNumber + yourChosse.pNumber);
        yourChosse.pPrice=(Number(Chosse[i].pPrice) + Number(yourChosse.pPrice));
        Chosse.splice(i,1);
        // addObjectToArray
        Chosse.push(yourChosse);
        // createElementIBody
        addToBody(Chosse);
        // addtolocalstorage
        addtolocalstorage(Chosse);
        break;
      };
    };
    if (yourChosse.pNumber == 1) {
      // addObjectToArray
      Chosse.push(yourChosse);
      // createElementIBody
      addToBody(Chosse);
      // addtolocalstorage
      addtolocalstorage(Chosse);
    }
  }
}
// createElementIBody
function addToBody(Array) {
  div.innerHTML="";
  Array.forEach(function (task){
    let header=document.createElement("h3");
    header.appendChild(document.createTextNode(task.pName));
    let paragraph=document.createElement("p");
    paragraph.appendChild(document.createTextNode(task.pPrice));
    let incDec = document.createElement("div");
    incDec.setAttribute("class","in-dec");
    let span1 = document.createElement("span");
    span1.innerHTML="+";
    let span2 = document.createElement("span");
    span2.innerHTML=task.pNumber;
    let span3 = document.createElement("span");
    span3.innerHTML="-";
    incDec.appendChild(span1);
    incDec.appendChild(span2);
    incDec.appendChild(span3);
    let detail = document.createElement("div");
    detail.setAttribute("class","detail");
    detail.appendChild(header);
    detail.appendChild(paragraph);
    detail.appendChild(incDec);
    let img = document.createElement("img");
    img.setAttribute("src",task.pImg);
    let choose = document.createElement("div");
    choose.setAttribute("class","choose");
    choose.appendChild(img);
    choose.appendChild(detail);
    let Delete = document.createElement("span");
    Delete.setAttribute("class","del")
    Delete.innerHTML="x";
    let ul = document.createElement("ul");
    ul.setAttribute("data-id",task.id)
    let li = document.createElement("li");
    li.appendChild(choose);
    li.appendChild(Delete);
    ul.appendChild(li);
    div.prepend(ul);
  });
  let link = document.createElement("a");
  link.innerHTML="Checkout";
  link.setAttribute("href","#");
  let btn = document.createElement("button");
  btn.appendChild(link);
  div.appendChild(btn);
  // console.log(Chosse.length)
  document.getElementById("NOP").innerHTML=Chosse.length;
  if (Chosse.length === 0) {
    document.getElementById("NOP").style.display="none";
  } else {
    document.getElementById("NOP").style.display="flex";
  }

}

// addtolocalstorage
function addtolocalstorage(Chosse) {
  window.localStorage.setItem("product",JSON.stringify(Chosse));
};
//get element from localstorage 
function getfromlocalstorage(){ 
  let data = window.localStorage.getItem("product")
  if(data){
    let product =JSON.parse(data);
    addToBody(product);
  };
};
// DeletFromLocalStorage
function DeletLocalStorage(taskid){
  // filder valueArray
  Chosse = Chosse.filter(function(e){
    return e.id != taskid;
  });
  addtolocalstorage(Chosse);
};
