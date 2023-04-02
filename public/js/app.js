/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

// require('./bootstrap')
__webpack_require__(/*! ./helpers */ "./resources/js/helpers.js");

window.getCookie = function getCookie(name) {
  var formattedName = name + "=";
  var ca = document.cookie.split(';');

  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];

    while (c.charAt(0) === ' ') {
      c = c.substring(1);
    }

    if (c.indexOf(name) === 0) {
      return c.substring(formattedName.length, c.length);
    }
  }

  return null;
};

window.Modules = {
  Datatable: (__webpack_require__(/*! ./datatable */ "./resources/js/datatable.js")["default"]),
  MediaPopup: (__webpack_require__(/*! ./popups */ "./resources/js/popups.js")["default"])
};
document.querySelectorAll('[data-href]').forEach(function (element) {
  return element.addEventListener('click', function (e) {
    return window.location = element.getAttribute('data-href');
  });
});
$(document).on('change', 'select.input', function () {
  if ($(this).val() == '') {
    $(this).addClass('input--empty');
  } else {
    $(this).removeClass('input--empty');
  }
});

function outsideClickEvent(e) {
  handleOutsideClick(e, '.drawer');
}

function handleOutsideClick(e, selector) {
  var $target = $(e.target);

  if (!$target.closest(selector).length && !$('.overlay').hasClass('hidden')) {
    closeOverlay();
  }
}

function openOverlay() {
  $('.overlay').removeClass('hidden');
  $('.drawer').removeClass('closed');
  $(document).on('click', outsideClickEvent);
}

function closeOverlay() {
  $('.overlay').addClass('hidden');
  $('.drawer').addClass('closed');
  $(document).off('click', outsideClickEvent);
}

$(document).on('click', '[data-action="open_drawer"]', function () {
  openOverlay();
});

/***/ }),

/***/ "./resources/js/datatable.js":
/*!***********************************!*\
  !*** ./resources/js/datatable.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Datatable)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var Datatable = /*#__PURE__*/function () {
  function Datatable(selector) {
    _classCallCheck(this, Datatable);

    this.selector = selector;
    this.initComponent(selector);
  }

  _createClass(Datatable, [{
    key: "initComponent",
    value: function initComponent() {
      var _this = this;

      $("".concat(this.selector, " .datatable__menu-item[data-toggle]")).click(function (e) {
        return _this.handleTabChange(e.target.getAttribute('data-toggle'));
      });
    }
  }, {
    key: "handleTabChange",
    value: function handleTabChange(tab_id) {
      $("".concat(this.selector, " .datatable__menu-item[data-toggle!=").concat(tab_id, "]")).removeClass('datatable__menu-item--active');
      $("".concat(this.selector, " .datatable__menu-item[data-toggle=").concat(tab_id, "]")).addClass('datatable__menu-item--active');
      $("".concat(this.selector, " .datatable__tab[data-id != ").concat(tab_id, "]")).removeClass('datatable__tab--active');
      $("".concat(this.selector, " .datatable__tab[data-id=").concat(tab_id, "]")).addClass('datatable__tab--active');
    }
  }]);

  return Datatable;
}();



/***/ }),

/***/ "./resources/js/helpers.js":
/*!*********************************!*\
  !*** ./resources/js/helpers.js ***!
  \*********************************/
/***/ (() => {



/***/ }),

/***/ "./resources/js/popups.js":
/*!********************************!*\
  !*** ./resources/js/popups.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ MediaPopup)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var MediaPopup = /*#__PURE__*/function () {
  function MediaPopup() {
    _classCallCheck(this, MediaPopup);

    $(document).ready(function () {
      $.ajax({
        url: '/api/v1/medium',
        data: {
          page: 1,
          limit: 30
        }
      }).done(function (res) {
        if (res.data) {
          _state_.maxMediaPage = Math.ceil(res.total / 30);
          res.data.map(function (image) {
            $('#media_images').append(format(MediaPopup.components.body, {
              id: image.id,
              src: image.url
            }));
          });
          MediaPopup.setActivePage(1);
        }
      });
      $(document).on('click', '[data-action="media-popup-pagination"]', function (e) {
        var page = $(this).attr('data-id');
        var url = $(this).find('.media-images__img').attr('src');
        var key = _state_.lastMediaKey ? _state_.lastMediaKey + 1 : 1;
        $.ajax({
          url: '/api/v1/medium',
          data: {
            page: page,
            limit: 30
          }
        }).done(function (res) {
          if (res.data) {
            $('#media_images').empty();
            res.data.map(function (image) {
              $('#media_images').append(format(MediaPopup.components.body, {
                id: image.id,
                src: image.url
              }));
            });
            MediaPopup.setActivePage(page);
            _state_.currentMediaPage = Number.parseInt(page);
          }
        });
      });
      $(document).on('click', '[data-action="media-popup-pagination-prev"]', function (e) {
        var id = $(this).attr('data-id');
        var url = $(this).find('.media-images__img').attr('src');
        var key = _state_.lastMediaKey ? _state_.lastMediaKey + 1 : 1;

        if (_state_.currentMediaPage > 1) {
          var page = _state_.currentMediaPage - 1;
          $.ajax({
            url: '/api/v1/medium',
            data: {
              page: page,
              limit: 30
            }
          }).done(function (res) {
            if (res.data) {
              $('#media_images').empty();
              res.data.map(function (image) {
                $('#media_images').append(format(MediaPopup.components.body, {
                  id: image.id,
                  src: image.url
                }));
              });
            }

            MediaPopup.setActivePage(page);
            _state_.currentMediaPage = Number.parseInt(page);
          });
        }
      });
      $(document).on('click', '[data-action="media-popup-pagination-next"]', function (e) {
        var id = $(this).attr('data-id');
        var url = $(this).find('.media-images__img').attr('src');
        var key = _state_.lastMediaKey ? _state_.lastMediaKey + 1 : 1;

        if (_state_.currentMediaPage < _state_.maxMediaPage) {
          var page = _state_.currentMediaPage + 1;
          $.ajax({
            url: '/api/v1/medium',
            data: {
              page: _state_.currentMediaPage + 1,
              limit: 30
            }
          }).done(function (res) {
            if (res.data) {
              $('#media_images').empty();
              res.data.map(function (image) {
                $('#media_images').append(format(MediaPopup.components.body, {
                  id: image.id,
                  src: image.url
                }));
              });
            }

            MediaPopup.setActivePage(page);
            _state_.currentMediaPage = Number.parseInt(page);
          });
        }
      });
      $(document).on('click', '[data-action="remove-media"]', function (e) {
        var id = $(this).attr('data-id');
        $("#images .image[data-id=".concat(id, "]")).remove();
      });
    });
  }

  _createClass(MediaPopup, null, [{
    key: "setActivePage",
    value: function setActivePage(page) {
      var _this = this;

      $('.media-popup__pagination .pagination__link[data-id]').each(function () {
        var elPage = $(_this).attr('data-id');
        $(_this).remove();
      });
      $('.media-popup__pagination .pagination__link[data-id]').remove();

      for (var i = Math.max(1, Number.parseInt(page) - 2); i < page; i++) {
        $('.media-popup__inner-pagination').append(format(MediaPopup.components.paginationLink, {
          page: i
        }));
      }

      $('.media-popup__inner-pagination').append(format(MediaPopup.components.paginationLink, {
        page: page
      }));

      for (var _i = Number.parseInt(page) + 1; _i < Math.min(_state_.maxMediaPage + 1, Number.parseInt(page) + 3); _i++) {
        $('.media-popup__inner-pagination').append(format(MediaPopup.components.paginationLink, {
          page: _i
        }));
      }

      $('.media-popup__pagination .pagination__link').removeClass('pagination__link--active');
      $(".media-popup__pagination .pagination__link[data-id=\"".concat(page, "\"]")).addClass('pagination__link--active');
    }
  }]);

  return MediaPopup;
}();

_defineProperty(MediaPopup, "components", {
  body: "\n      <div class=\"media-images__item\" data-action=\"add-media\" data-id=\":id\">\n        <div class=\"media-images__overlay\">\n\n        </div>\n        <img class=\"media-images__img\" src=\":src\" alt=\"\">\n      </div>\n    ",
  paginationLink: "\n      <div class=\"pagination__link pagination__link--secondary\" data-action=\"media-popup-pagination\" data-id=\":page\">\n        :page\n      </div>\n    ",
  image: "\n      <div class=\"image\" data-id=\":id\">\n        <input type=\"hidden\" name=\"images[:key][id]\" value=\":id\">\n        <img class=\"image__img\" src=\":url\">\n        <div class=\"image__remove\" data-action=\"remove-media\" data-id=\":id\">\n          <svg class=\"icon icon--white\" width=\"10\" height=\"10\" viewBox=\"0 0 14 14\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n            <path d=\"M8.70041 6.73923L13.9933 1.44632L12.5791 0.0321045L7.28619 5.32501L1.99332 0.0321336L0.579102 1.44635L5.87198 6.73923L0.579102 12.0321L1.99332 13.4463L7.28619 8.15344L12.5791 13.4463L13.9933 12.0321L8.70041 6.73923Z\" fill=\"#FAFAFA\"/>\n          </svg>\n        </div>\n      </div>\n    "
});



/***/ }),

/***/ "./resources/css/app.scss":
/*!********************************!*\
  !*** ./resources/css/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/client.scss":
/*!***********************************!*\
  !*** ./resources/css/client.scss ***!
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
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
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
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/client": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
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
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/client","css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/client","css/app"], () => (__webpack_require__("./resources/css/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/client","css/app"], () => (__webpack_require__("./resources/css/client.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;