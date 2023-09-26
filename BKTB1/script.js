const addressbtn = document.querySelector('#address-form');
const addressclose = document.querySelector('#address-close'); 
addressbtn.addEventListener('click', function() {
    document.querySelector('.address-form').style.display = 'flex';
});
addressclose.addEventListener('click', function() {
    document.querySelector('.address-form').style.display = 'none';
});
// slider
const rightbtn = document.querySelector('.ti-angle-right');
const lefttbtn = document.querySelector('.ti-angle-left'); 
const imgNuber = document.querySelectorAll('.slider-content-top img');
console.log(imgNuber.length);
let index = 0;
rightbtn.addEventListener("click", function(){
    index = index + 1;{
    if(index > imgNuber.length - 1)
        index = 0;
    }
    document.querySelector(".slider-content-top").style.right = index *100 + "%";
});
lefttbtn.addEventListener("click", function(){
    index = index - 1;
    if(index < 0){
        index = imgNuber.length -1;
    }
    document.querySelector(".slider-content-top").style.right = index *100 + "%";
});
// slider 1
const imgNuberLi = document.querySelectorAll('.slider-content-bottom li')
let imgactive  = document.querySelector('.active')
imgNuberLi.forEach(function(image,index){
    
    image.addEventListener('click',function(){
        removeactive()
        document.querySelector(".slider-content-top").style.right = index *100 + "%";
        imgactive.classList.remove('active')
        image.classList.add('active')
    })
})
function removeactive(){
    let  imgactive = document.querySelector('.active')
    imgactive.classList.remove('active')
}
//slider 2
function imgAuto(){
    index = index + 1
    if(index>imgNuber.length-1){
        index = 0
    }
    removeactive()
    document.querySelector(".slider-content-top").style.right = index *100 + "%";
    imgNuberLi[index].classList.add('active')
    //console.log(index)
}
setInterval(imgAuto,5000)
//--------------------------slider product------------//
const rightbtntwo = document.querySelector('.ti-angle-right-two');
const lefttbtntwo = document.querySelector('.ti-angle-left-two');
const imgNubertwo = document.querySelectorAll('.slider-product-one-content-title-items');
//console.log(rightbtntwo)
//console.log(lefttbtntwo)
rightbtntwo.addEventListener("click", function(){
    index = index + 1;{
    if(index > imgNubertwo.length - 1)
        index = 0;
    }
    document.querySelector(".slider-product-one-content-title-items-content").style.right = index *100 + "%";
});
lefttbtntwo.addEventListener("click", function(){
    index = index - 1;
    if(index < 0){
        index = imgNubertwo.length -1;
    }
    document.querySelector(".slider-product-one-content-title-items-content").style.right = index *100 + "%";
});
