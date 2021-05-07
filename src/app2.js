let slidePosition=0;
const slides=document.getElementsByClassName("carousel-item");
const totalSlides=slides.length;

document.getElementById("carousel-button--next").addEventListener("click",function(){
    movetoNextSlide();



})
document.getElementById("carousel-button--prev").addEventListener("click",function(){
    movetoPrevSlide();



})
function  movetoNextSlide(){
    console.log("next");
}
function  movetoPrevSlide(){
    console.log("prev");
}

