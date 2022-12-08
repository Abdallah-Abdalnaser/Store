window.addEventListener("load",()=>{
  if (innerWidth <=811) {
    clearInterval(move);
    clearInterval(move2);
    clearInterval(move3);
    clearInterval(move4);
  }
});
//icon angle
let cards = document.querySelectorAll(".product .contaner .cards");
let cardsArray=Array.from(cards);
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