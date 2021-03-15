//Navbar
$('.mega-menu-trigger').click(function(){
    $('.mega-menu').fadeOut();
    //Apply Dark Overlay
    $('.dark-overlay').addClass('active');
    //Disbale Scroll
    $('body').css('overflow-y' , 'hidden');
    //Toggle the Menu Item
    $(this).next('.mega-menu').fadeToggle();
});
$('.dark-overlay').click(function(){
    $('.mega-menu').fadeOut();
    $('body').css('overflow-y' , 'scroll');
    $(this).removeClass('active');
});
//Homepage Related
$('#homeage-hero-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('#homepage-designers-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
$('#homepage-most-wanted-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
//Newsletter
$('#submit-newsletter').click(function(e){
    var ActionRoute = $(this).data('action');
    var Data = $(this).parent().serialize();
    var That = $(this);
    That.html('<i class="fas fa-spinner fa-spin"></i>');
    //Prevent Default Form Beaviour
    e.preventDefault();
    //Make the Ajax Request
    $.ajax({
        'method':'post',
        'url': ActionRoute,
        'data':Data,
        'success': function(response){
            That.html('Sign Up');
            $('#show-message').addClass('success').html(response).fadeIn();
        },
        'error': function(response){
            $('#show-message').addClass('error').html(response.responseText).fadeIn();
            That.html('Sign Up');
        }
    });
});