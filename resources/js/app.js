var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
if(baseUrl.includes('localhost')){
    baseUrl = baseUrl+'peppers/';
}
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
    $('.pre-order-modal').fadeOut();
    $('body').css('overflow-y' , 'scroll');
    $(this).removeClass('active');
});
$('#nav-search-toggler').on('click',function(){
    //Clear the search form
    $('#search-box').val('');
    $('[autofocus]').focus();
    $('#navbar-search-results').html('').fadeOut();
    //Show the search form
    $('.navbar-search-overlay').fadeIn('fast');
    //Stop the body scroll
    $('body').css('overflow-y' , 'hidden');
});
//Hide the search box based on a icon click
$('#close-search-form').click(function(){
    $('.navbar-search-overlay').fadeOut('fast');
    $('body').css('overflow-y' , 'scroll');
});
//Hide the search box when clicking escape button
$(document).keyup(function(e) {
    if (e.key === "Escape") { // escape key maps to keycode `27`
        $('.navbar-search-overlay').fadeOut('fast');
        $('body').css('overflow-y' , 'scroll');
   }
});
$('#search-box').keyup(function(){
    //Validate the request and clean bad codes
    var SearchTerm = $('#search-box').val().replace(/[^a-zA-Z0-9\s]/gm, '');
    $('#navbar-search-results').fadeIn();
    $('#navbar-search-results').html('<p class="text-center text-white"><i class="fas fa-spinner fa-spin fa-5x"></i></p>');
    $.ajax({
        url: baseUrl+'api/search',
        method: 'post',
        data: {
            'search' : SearchTerm
        },
        success: function(response){
            $('#navbar-search-results').html('');
            response.forEach((item) => {
                $('#navbar-search-results').append(`
                    <a href="${baseUrl}/product/${item.slug}">
                        <div class="single-search-result">
                            <a class="search-result-image" href="${baseUrl}product/${item.slug}">
                                <img src="${baseUrl}storage/app/products/thumb/${item.image}">
                            </a>
                            <a class="search-result-data" href="${baseUrl}product/${item.slug}">
                                <p>
                                <b>${item.brand.title} - ${item.sku}</b>
                                <br>
                                    ${item.title}
                                    <br>
                                    ${item.price}$
                                    <br>
                                </p>
                            </a>
                        </div>
                    </a>
                `);
            });
            console.log(response);
        },
        error: function(data){
            $('#navbar-search-results').html('<p class="text-center text-white">'+data.responseText+'</p>');
        }
    });
});
$('.pre-oreder-modal-toggler').click(function(){
    $('.dark-overlay').addClass('active');
    $('body').css('overflow-y' , 'hidden');
    //Inject the data
    $('#pre-order-item-title').html($(this).data('title'));
    $('#pre-order-item-input').val($(this).data('link'));
    $('#pre-order-message').val(`Hello, I am intersted in this item: ${$(this).data('link')} Please give me a qoute and exptected arrival time.`);
    //Show the modal
    $('.pre-order-modal').fadeIn();
});
$('#submit-pre-order-form').click(function(e){
    //Prevent Page Reload
    e.preventDefault();
    var NameValue = $('#pre-order-form').find('input[name="name"]').val();
    var ItemValue = $('#pre-order-form').find('input[name="item"]').val();
    var MessageValue = $('#pre-order-form').find('textarea').val();
    //Generate Whatsapp Link
    //Send to Zayed Branch WhatsApp
    var WhatsappLink = "https://wa.me/00201155436626?text="+NameValue+"%20| %20%20 |%20"+ItemValue+"%20| %20%20 |%20"+MessageValue;
    window.open(WhatsappLink);   
});
//Homepage Related
$('#homeage-hero-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
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
$('#homepage-new-arrivals-slider').owlCarousel({
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
$(document).on('click', '.add-to-cart', function() {
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