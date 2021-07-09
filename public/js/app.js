/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";

if (baseUrl.includes('localhost')) {
  baseUrl = baseUrl + 'peppers/';
} //Navbar


$('.mega-menu-trigger').click(function () {
  $('.mega-menu').fadeOut(); //Apply Dark Overlay

  $('.dark-overlay').addClass('active'); //Disbale Scroll

  $('body').css('overflow-y', 'hidden'); //Toggle the Menu Item

  $(this).next('.mega-menu').fadeToggle();
});
$('.dark-overlay').click(function () {
  $('.mega-menu').fadeOut();
  $('.pre-order-modal').fadeOut();
  $('body').css('overflow-y', 'scroll');
  $(this).removeClass('active');
});
$('#nav-search-toggler').on('click', function () {
  //Clear the search form
  $('#search-box').val('');
  $('[autofocus]').focus();
  $('#navbar-search-results').html('').fadeOut(); //Show the search form

  $('.navbar-search-overlay').fadeIn('fast'); //Stop the body scroll

  $('body').css('overflow-y', 'hidden');
}); //Hide the search box based on a icon click

$('#close-search-form').click(function () {
  $('.navbar-search-overlay').fadeOut('fast');
  $('body').css('overflow-y', 'scroll');
}); //Hide the search box when clicking escape button

$(document).keyup(function (e) {
  if (e.key === "Escape") {
    // escape key maps to keycode `27`
    $('.navbar-search-overlay').fadeOut('fast');
    $('body').css('overflow-y', 'scroll');
  }
});
$('#search-box').keyup(function () {
  //Validate the request and clean bad codes
  var SearchTerm = $('#search-box').val().replace(/[^a-zA-Z0-9\s]/gm, '');
  $('#navbar-search-results').fadeIn();
  $('#navbar-search-results').html('<p class="text-center text-white"><i class="fas fa-spinner fa-spin fa-5x"></i></p>');
  $.ajax({
    url: baseUrl + 'api/search',
    method: 'post',
    data: {
      'search': SearchTerm
    },
    success: function success(response) {
      $('#navbar-search-results').html('');
      response.forEach(function (item) {
        $('#navbar-search-results').append("\n                    <a href=\"".concat(baseUrl, "/product/").concat(item.slug, "\">\n                        <div class=\"single-search-result\">\n                            <a class=\"search-result-image\" href=\"").concat(baseUrl, "product/").concat(item.slug, "/").concat(item.id, "\">\n                                <img src=\"").concat(baseUrl, "storage/app/products/thumb/").concat(item.image, "\">\n                            </a>\n                            <a class=\"search-result-data\" href=\"").concat(baseUrl, "product/").concat(item.slug, "/").concat(item.id, "\">\n                                <p>\n                                <b>").concat(item.brand.title, " - ").concat(item.sku, "</b>\n                                <br>\n                                    ").concat(item.title, "\n                                    <br>\n                                    ").concat(item.price, "$\n                                    <br>\n                                </p>\n                            </a>\n                        </div>\n                    </a>\n                "));
      });
      console.log(response);
    },
    error: function error(data) {
      $('#navbar-search-results').html('<p class="text-center text-white">' + data.responseText + '</p>');
    }
  });
});
$('.pre-oreder-modal-toggler').click(function () {
  $('.dark-overlay').addClass('active');
  $('body').css('overflow-y', 'hidden'); //Inject the data

  $('#pre-order-item-title').html($(this).data('title'));
  $('#pre-order-item-input').val($(this).data('link'));
  $('#pre-order-message').val("Hello, I am intersted in this item: ".concat($(this).data('link'), " Please give me a qoute and exptected arrival time.")); //Show the modal

  $('.pre-order-modal').fadeIn();
});
$('.ajax-products-list').on('click', 'a.pre-oreder-modal-toggler', function () {
  $('.dark-overlay').addClass('active');
  $('body').css('overflow-y', 'hidden'); //Inject the data

  $('#pre-order-item-title').html($(this).data('title'));
  $('#pre-order-item-input').val($(this).data('link'));
  $('#pre-order-message').val("Hello, I am intersted in this item: ".concat($(this).data('link'), " Please give me a qoute and exptected arrival time.")); //Show the modal

  $('.pre-order-modal').fadeIn();
});
$('#submit-pre-order-form').click(function (e) {
  //Prevent Page Reload
  e.preventDefault();
  var NameValue = $('#pre-order-form').find('input[name="name"]').val();
  var ItemValue = $('#pre-order-form').find('input[name="item"]').val();
  var MessageValue = $('#pre-order-form').find('textarea').val(); //Generate Whatsapp Link
  //Send to Zayed Branch WhatsApp

  var WhatsappLink = "https://wa.me/00201155436626?text=" + NameValue + "%20| %20%20 |%20" + ItemValue + "%20| %20%20 |%20" + MessageValue;
  window.open(WhatsappLink);
}); //Homepage Related

$('#homeage-hero-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
$('#homepage-designers-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
});
$('#homepage-new-arrivals-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
});
$('#homepage-most-wanted-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
}); //Newsletter

$('#submit-newsletter').click(function (e) {
  var ActionRoute = $(this).data('action');
  var Data = $(this).parent().serialize();
  var That = $(this);
  That.html('<i class="fas fa-spinner fa-spin"></i>'); //Prevent Default Form Beaviour

  e.preventDefault(); //Make the Ajax Request

  $.ajax({
    'method': 'post',
    'url': ActionRoute,
    'data': Data,
    'success': function success(response) {
      That.html('Sign Up');
      $('#show-message').addClass('success').html(response).fadeIn();
    },
    'error': function error(response) {
      $('#show-message').addClass('error').html(response.responseText).fadeIn();
      That.html('Sign Up');
    }
  });
});
$('#close-added-to-cart').click(function () {
  $('#added-to-cart-success').fadeOut('fast');
}); //Cart system

$(document).on('click', '.add-to-cart', function () {
  var That = $(this);
  var ItemId = $(this).data('id');
  var UserId = $(this).data('user');
  var Target = $(this).data('target'); //Change the button to loader

  $(this).html('<i class="fas fa-spinner fa-spin"></i>');
  $.ajax({
    url: Target,
    method: 'post',
    data: {
      'product_id': ItemId,
      'user_id': UserId
    },
    success: function success(response) {
      //Show the modal here
      $('#added-to-cart-success').fadeIn('fast');
      That.html('<i class="fas fa-check"></i> Added to cart');
    },
    error: function error(response) {
      That.html('<i class="fas fa-cart-plus"></i> Add to cart');
    }
  });
});
var OrderCost = parseInt($('#cart-total-hidden').val());
var SiteCurrency = $('meta[name=currency]').attr('content');
var SiteExchange = $('meta[name=exchange]').attr('content');
$('#cart-country').change(function () {
  if (SiteCurrency == 'USD') {
    if ($(this).val() == 'Egypt') {
      $('#shipping-cart').html("5$");
      $('#cart-total').html(OrderCost + 5);
    } else {
      $('#shipping-cart').html("80$");
      $('#cart-total').html(OrderCost + 80);
    }
  } else {
    if ($(this).val() == 'Egypt') {
      ShippingCostEG = 5 * SiteExchange;
      ShippingCostINT = 80 * SiteExchange;
      $('#shipping-cart').html(ShippingCostEG + " L.E");
      $('#cart-total').html(OrderCost + ShippingCostEG);
    } else {
      $('#shipping-cart').html(ShippingCostINT + " L.E");
      $('#cart-total').html(OrderCost + ShippingCostINT);
    }
  }
}); //Click to load more products

$('#load-more-button').click(function () {
  $(this).html('Loading <i class="fas fa-spinner fa-spin"></i>');
  $.ajax({
    method: 'get',
    data: {
      filtertype: null,
      loadmore: true,
      current_data: 21,
      next_data: 42
    },
    url: $(this).data('action'),
    success: function success(response) {
      response.data.forEach(function (item) {
        console.log(item.slug);
        $('.ajax-products-list').append("\n                        <div class=\"col-lg-4 col-6\">\n                            <div class=\"single-product\">\n                                <a href=\"{{ route('product.single', [".concat(item.slug, ",").concat(item.id, "]) }}\" title=\"").concat(item.title, "\"\n                                    class=\"product-image\">\n                                    <img src=\"{{ $Product->Thumb }}\" alt=\"").concat(item.title, "\" />\n                                </a>\n                                <div class=\"moreinfo\">\n                                    <h4 class=\"brand-info text-left mt-1\"><a\n                                            href=\"{{ route('products', ['brand', $Product->Brand->slug]) }}\">{{ $Product->Brand->title }}</a>\n                                    </h4>\n                                    <h2 class=\"product-name text-left\"><a\n                                            href=\"{{ route('product.single', [$Product->slug,$Product->id]) }}\"\n                                            title=\"").concat(item.title, "\">").concat(item.title, "</a></h2>\n                                        @if ($Product->CartReady)\n                                            <p class=\"price mt-2\">\n                                                {{ convertCurrency($Product->price, 'USD', getCurrency()['code']) . getCurrency()['symbole'] }}\n                                            </p>\n                                        @endif\n                                </div>\n                                @if (isInUserCart(getUserId(), $Product->id))\n                                    <a class=\"btn btn-brand\"><i class=\"fas fa-check\"></i> Added to Cart</a>\n                                @else\n                                    @if ($Product->CartReady)\n                                        <a class=\"btn btn-brand add-to-cart\" data-target=\"{{ route('cart.add') }}\"\n                                            data-id=\"{{ $Product->id }}\" data-user=\"{{ getUserId() }}\"\n                                            href=\"javascript:;\"><i class=\"fas fa-cart-plus\"></i> Add to cart</a>\n                                    @else\n                                        <a class=\"btn btn-brand pre-oreder-modal-toggler\" href=\"javascript:;\"\n                                            data-target=\"pre-oreder-modal\" data-title=\"").concat(item.title, "\"\n                                            data-link=\"{{ route('product.single', [$Product->slug,$Product->id]) }}\"\n                                            data-sku=\"{{ $Product->sku }}\"><i class=\"fas fa-cart-plus\"></i> Pre\n                                            Order</a>\n                                    @endif\n                                @endif\n                            </div>\n                        </div>\n                    "));
        console.log(item);
      }); // console.log(response);
    },
    error: function error() {// console.log(response);
    }
  });
});

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/scss/admin.scss":
/*!***********************************!*\
  !*** ./resources/scss/admin.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/******/ 	// the startup function
/******/ 	// It's empty as some runtime module handles the default behavior
/******/ 	__webpack_require__.x = x => {};
/************************************************************************/
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0
/******/ 		};
/******/ 		
/******/ 		var deferredModules = [
/******/ 			["./resources/js/app.js"],
/******/ 			["./resources/scss/app.scss"],
/******/ 			["./resources/scss/admin.scss"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		var checkDeferredModules = x => {};
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime, executeModules] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/ 		
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/ 		
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 		
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = x => {};
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		var startup = __webpack_require__.x;
/******/ 		__webpack_require__.x = () => {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = startup || (x => {});
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// run startup
/******/ 	var __webpack_exports__ = __webpack_require__.x();
/******/ 	
/******/ })()
;