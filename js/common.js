// common scripts used by site
$(document).ready(function(){
    
    //overlays
    loadLocationOverlay();
    loadMenuItemOverlay();   
    

    // setup carousel controllers
    $('.d-carousel-next').on( 'click', function() {
        var $carousel = $('.d-carousel').flickity().flickity('next')
      });
    $('.d-carousel-prev').on( 'click', function() {
        var $carousel = $('.d-carousel').flickity().flickity('previous')
      });
    $('.n-carousel-next').on( 'click', function() {
        var $carousel = $('.n-carousel').flickity().flickity('next')
      });
    $('.n-carousel-prev').on( 'click', function() {
        var $carousel = $('.n-carousel').flickity().flickity('previous')
      });
}); 

function loadLocationOverlay() {
    $.ajaxSetup({cache:false});
    $(".location__link").click(function(){
        $('#menuItem__overlay').css('display','block').animate(
            {
                opacity: 1
            }, 300
        );       
        var post_id = $(this).attr("rel");
        $("#menuItem__overlay__content").load(jsGlobal.ajaxUrl+"?action=load_post_content&pid="+post_id,
            $("#menuItem__overlay__content").animate(
                {
                    opacity: 1,
                    left: 0
                }, 500
            ))
            return false;
    });

    $("#menuItem__overlay").click(function(){
        var endPoint = -70;
        $('#menuItem__overlay__content').animate({
            left: endPoint + '%',
            opacity: 0
        }, 300)
        $('#menuItem__overlay').animate({
            opacity: 0,
        },500).css('display','none');
    })
}

function loadMenuItemOverlay() {
    $.ajaxSetup({cache:false});
    $(".menuItem__link").click(function(){
        $('#menuItem__overlay').css('display','block').animate(
            {
                opacity: 1
            }, 300
        );       
        var post_id = $(this).attr("rel");
        $("#menuItem__overlay__content").load(jsGlobal.ajaxUrl+"?action=load_post_content&pid="+post_id,
            $("#menuItem__overlay__content").animate(
                {
                    opacity: 1,
                    left: 0
                }, 500
            ))
            return false;
    });

    $("#menuItem__overlay").click(function(){
        var endPoint = -70;
        $('#menuItem__overlay__content').animate({
            left: endPoint + '%',
            opacity: 0
        }, 300)
        $('#menuItem__overlay').animate({
            opacity: 0,
        },500).css('display','none');
    })
}