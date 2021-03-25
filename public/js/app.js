/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

//Navbar
$('.mega-menu-trigger').click(function () {
  $('.mega-menu').fadeOut(); //Apply Dark Overlay

  $('.dark-overlay').addClass('active'); //Disbale Scroll

  $('body').css('overflow-y', 'hidden'); //Toggle the Menu Item

  $(this).next('.mega-menu').fadeToggle();
});
$('.dark-overlay').click(function () {
  $('.mega-menu').fadeOut();
  $('body').css('overflow-y', 'scroll');
  $(this).removeClass('active');
}); //Homepage Related

$('#homeage-hero-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
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

$('#add-to-cart').click(function () {
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
});

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: Expected identifier.\n    ╷\n233 │ #404-page{\n    │  ^\n    ╵\n  resources\\scss\\pages\\_users.scss 233:2  @import\n  resources\\scss\\app.scss 21:9            root stylesheet\n    at processResult (C:\\xampp\\htdocs\\peppers\\node_modules\\webpack\\lib\\NormalModule.js:598:19)\n    at C:\\xampp\\htdocs\\peppers\\node_modules\\webpack\\lib\\NormalModule.js:692:5\n    at C:\\xampp\\htdocs\\peppers\\node_modules\\loader-runner\\lib\\LoaderRunner.js:399:11\n    at C:\\xampp\\htdocs\\peppers\\node_modules\\loader-runner\\lib\\LoaderRunner.js:251:18\n    at context.callback (C:\\xampp\\htdocs\\peppers\\node_modules\\loader-runner\\lib\\LoaderRunner.js:124:13)\n    at C:\\xampp\\htdocs\\peppers\\node_modules\\sass-loader\\dist\\index.js:62:7\n    at Function.call$2 (C:\\xampp\\htdocs\\peppers\\node_modules\\sass\\sass.dart.js:91729:16)\n    at _render_closure1.call$2 (C:\\xampp\\htdocs\\peppers\\node_modules\\sass\\sass.dart.js:80373:12)\n    at _RootZone.runBinary$3$3 (C:\\xampp\\htdocs\\peppers\\node_modules\\sass\\sass.dart.js:27269:18)\n    at _FutureListener.handleError$1 (C:\\xampp\\htdocs\\peppers\\node_modules\\sass\\sass.dart.js:25797:19)");

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