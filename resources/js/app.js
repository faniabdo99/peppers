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
            items:4
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
            items:4
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
$('#close-added-to-cart').click(function(){
    $('#added-to-cart-success').fadeOut('fast');
});
//Cart system
$('#add-to-cart').click(function(){
    var That = $(this);
    var ItemId = $(this).data('id');
    var UserId = $(this).data('user');
    var Target = $(this).data('target');
    //Change the button to loader
    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    $.ajax({
        url : Target,
        method: 'post',
        data:{
            'product_id':ItemId,
            'user_id':UserId
        },
        success: function(response){
            //Show the modal here
            $('#added-to-cart-success').fadeIn('fast');
            That.html('<i class="fas fa-check"></i> Added to cart');
        },
        error: function(response){
            That.html('<i class="fas fa-cart-plus"></i> Add to cart');
        }
    });
});
const OrderCost = parseInt($('#cart-total-hidden').val());
const SiteCurrency = $('meta[name=currency]').attr('content');
const SiteExchange = $('meta[name=exchange]').attr('content');
$('#cart-country').change(function(){
    if(SiteCurrency == 'USD'){
        if($(this).val() == 'Egypt'){
            $('#shipping-cart').html("5$");
            $('#cart-total').html(OrderCost+5);
        }else{
            $('#shipping-cart').html("80$");
            $('#cart-total').html(OrderCost+80);
        }
    }else{
        if($(this).val() == 'Egypt'){
            ShippingCostEG = 5*SiteExchange;
            ShippingCostINT = 80*SiteExchange;
            $('#shipping-cart').html(ShippingCostEG+" L.E");
            $('#cart-total').html(OrderCost+ShippingCostEG);
        }else{
            $('#shipping-cart').html(ShippingCostINT+" L.E");
            $('#cart-total').html(OrderCost+ShippingCostINT);
        }
    }
});