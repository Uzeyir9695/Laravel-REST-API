$(document).ready(function () {
    $(window).on("load", function () {
        $(".preloader18, .center").fadeOut(2000);
    })

  /*   $(window).on('scroll', function() {
        
        if($(document).scrollTop > 20) 
        $('body').css('backgroundColor', 'red');
    
    }) */

    $('a ').click(function() {
        $(this).addClass('.active');
    })
    

    $('.test').click(function() {
        $(this).css('backgroundColor', 'limeGreen');
    });

    /* if($('.clas').text()==0)
        $('.fa-thumbs-up').hide(); */
    
       /*  $('.clas').text() = 0;
        $('.like-btn').click(function() {
            $('.clas').text() =+1;
        }) */

        /* $('.like-btn').click(function(){
            let enable = false;
            if(!enable){

                $('.thum').html('<i class="fas fa-thumbs-down" style="color: rgb(49, 49, 49); font-size: 15px"></i>');
            } else{
                $('.thum').html('<i class="fas fa-thumbs-up" style="color: rgb(49, 49, 49); font-size: 15px"></i>');
            }

        }) */
});

/* document.getElementsByClassName('like').addEventListener.click(function (){
       increment();
   })
var like = document.getElementsByClassName('clas');
like.innerHTML = 0;
function increment() {
   
       like.innerHTML+=1;
   
} */

/* var input = document.getElementById('likes');
document.getElementsByClassName('like-btn').addEventListener('click', () => {
    // input.style.color = 'red';
    console.log('WOWOOWWO');
}) */

const likeBtn = document.querySelector('.like-btn');
let count = document.querySelector('.clas');
let thum = document.querySelector('.thum');
let enable = false;
likeBtn.addEventListener('click', function(){
    if(!enable) {
        enable = true;
        thum.innerHTML = '<i class="fas fa-thumbs-up" style="color: rgb(36, 118, 211); font-size: 15px"></i>';
        count.textContent++;
    } else {
        enable = false;
        thum.innerHTML = '<i class="far fa-thumbs-up" style="color: rgb(49, 49, 49); font-size: 15px"></i>';
        count.textContent--;
    }
})