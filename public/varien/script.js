jQuery(document).ready(function(){
    var ribbonClass = 'ribbon';
    var elems = document.getElementsByClassName(ribbonClass);
    for(var i=0; i<elems.length; i++){
        fillRibbon(elems[i],ribBg);
    }
    
    function fillRibbon(elem,color){
        if (elem || elem.getContext) {
            // Get the canvas 2d context.
            var context = elem.getContext('2d');
            if (!context) {
                return;
            }

            context.fillStyle   = '#' + color;
            
            // Draw a right triangle.
            context.beginPath();
            context.moveTo(0, 0);
            context.lineTo(15, 0);
            context.lineTo(1, 15);
            context.lineTo(15, 30);
            context.lineTo(0, 30);
            context.lineTo(0, 0);
            context.moveTo(0, 0);
            context.fill();
        
            context.closePath();
        }
    }

    
    jQuery('#testbtn').click(function(){    
        context.fillStyle   = '#fff';
        
        context.fill();
    });

    
    jQuery('li.level-top').hover(function() {
        jQuery(this).addClass('over');
    }, function() {
        jQuery(this).removeClass('over');
    });

    //"Top" button
    var scroll_timer;
    var displayed = false;
    var $message = jQuery('#message');
    var $window = jQuery(window);
    var top = jQuery(document.body).children(0).position().top;
    
    $window.scroll(function () {
        window.clearTimeout(scroll_timer);
        scroll_timer = window.setTimeout(function () { 
        if($window.scrollTop() <= top) 
        {
            displayed = false;
            $message.fadeOut(500);
        }
        else if(displayed == false) 
        {
            displayed = true;
            $message.stop(true, true).fadeIn(500).click(function () { $message.fadeOut(500); });
        }
        }, 400);
    });
    
    jQuery('#top-link').click(function(e) {
            jQuery('html, body').animate({scrollTop:0}, 'slow');
            return false;
    });    
});//end ready