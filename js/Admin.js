//loading
window.addEventListener("load",()=>{
  loading.style.display="none";
});
let upload = document.querySelector("[type='file']");
let image = document.querySelector(".new .Add .image img");
upload.onchange=function(){
  let file = new FileReader();
  file.readAsDataURL(upload.files[0]);
  file.onload = function(){
    image.src=file.result;
  };
};