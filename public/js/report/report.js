/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 37);
/******/ })
/************************************************************************/
/******/ ({

/***/ 37:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(38);


/***/ }),

/***/ 38:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__template__ = __webpack_require__(43);
function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }



var count = 0;

[].concat(_toConsumableArray(document.querySelectorAll('a.meta'))).forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.preventDefault();

        var html = '';

        var data = {
            id: e.target.dataset.id,
            label: e.target.dataset.label
        };

        switch (e.target.dataset.type) {
            case 'text':
                html = Object(__WEBPACK_IMPORTED_MODULE_0__template__["b" /* textTemplate */])(count++, data);
                break;
            case 'date':
                html = Object(__WEBPACK_IMPORTED_MODULE_0__template__["a" /* dateTemplate */])(count++, data);
                break;
        }
        //
        // const el = document.createElement('div');
        // el.innerHTML = html;
        //
        // const fragment = document.createDocumentFragment();
        // fragment.appendChild(el);
        //
        // document.getElementById('criteria-container').appendChild(fragment);

        document.getElementById('criteria-container').innerHTML += html;
    });
});

/***/ }),

/***/ 43:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return textTemplate; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return dateTemplate; });
var textTemplate = function textTemplate(index, meta) {
    return '\n        <div class="col-6">\n            <label for="a">' + meta.label + ':</label>\n            <div class="input-group">\n                <input type="hidden" name="criteria[' + index + '][text][meta_id]" value="' + meta.id + '">\n                <select name="criteria[' + index + '][text][operator]" id="select" class="form-control ' + (index === 0 && 'd-none') + '">\n                    <option value="and" selected>AND</option>\n                    <option value="or">OR</option>\n                </select>\n    \n                <select name="criteria[' + index + '][text][comparision_type]" id="select" class="form-control">\n                    <option value="equals_to">equals to:</option>\n                    <option value="start_with">start with:</option>\n                    <option value="end_with">end with:</option>\n                </select>\n    \n                <input class="form-control" name="criteria[' + index + '][text][value]" placeholder="Value" />\n            </div>\n        </div>';
};

var dateTemplate = function dateTemplate(index, meta) {
    return '\n        <div class="col-6 mb-3">\n            <label for="a">' + meta.label + ':</label>\n            <div class="input-group">\n                <input type="hidden" name="criteria[' + index + '][date][meta_id]" value="' + meta.id + '">\n                <select name="criteria[' + index + '][date][operator]" id="select" class="form-control ' + (index === 0 && 'd-none') + '">\n                    <option value="and" selected>AND</option>\n                    <option value="or">OR</option>\n                </select>\n                <input class="form-control" name="criteria[' + index + '][date][start_date]" placeholder="From..." type="date" />\n                <input class="form-control" name="criteria[' + index + '][date][end_date]" placeholder="To..." type="date" />\n            </div>\n        </div>\n    ';
};

/***/ })

/******/ });