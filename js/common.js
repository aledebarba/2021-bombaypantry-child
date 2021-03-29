// common scripts used by site
$(document).ready(function(){

    $.ajaxSetup({cache:false});
    
    $(".location__link").click(function(){
        
        var post_id = $(this).attr("rel");

        $("#locations__overlay__content").html("loading..."+post_id);
        $("#locations__overlay__content").load(jsGlobal.ajaxUrl+"?action=load_post_content&pid="+post_id,
            function () {
                // show overlay when content is loaded
                $('#locations__overlay').fadeIn(300);
            }
        );
    return false;
    });

    $("#locations__overlay").click(function(){
        $('#locations__overlay').css('display','none');
    })
});
