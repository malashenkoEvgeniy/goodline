
function toggle_social_widget(){
    $('.social-items-menu').fadeToggle();
    $('.social-btn').toggleClass('active');
    $('.social-btn .s-btn-close').toggleClass('active');
    $('.social-btn-pulse').toggleClass('active');
    $('.social-btn-bg').toggleClass('active');
    $('.social-items-bg').fadeToggle();
    $('.social-items-bg').toggleClass('active'); 
}

function change_social_widget_icon(){
    $('.btn-1').toggleClass('active');
    $('.btn-2').toggleClass('active');
    setTimeout(change_social_widget_icon, 2000);
    // Нужно сделать эти действия с помощью css анимации и удалить этот код
}


$('.social-items-wrapper, .social-items-bg').click(function(e){
    toggle_social_widget();
});


$(document).ready(function() {
    change_social_widget_icon();
});




