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
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__Prototype__ = __webpack_require__(44);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__Prototype___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__Prototype__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__MetaDropDown__ = __webpack_require__(45);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Controllers__ = __webpack_require__(46);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__CriteriaHtmlBuilder_index__ = __webpack_require__(47);





/**
 * Meta select handler...
 *
 * @param el
 */
var metaDropDownOnChangeHandler = function metaDropDownOnChangeHandler(el) {
    var selectedOption = el.options[el.selectedIndex];

    var data = {
        label: selectedOption.text,
        value: '',
        type: selectedOption.dataset.type,
        id: selectedOption.dataset.id
    };

    var counter = document.querySelectorAll('#criteria-container .col-6').length;

    Object(__WEBPACK_IMPORTED_MODULE_3__CriteriaHtmlBuilder_index__["a" /* criteriaHtmlBuilder */])(counter, data);

    el.selectedIndex = 0;
};

/**
 * Model select listener...
 */
document.getElementById('model').addEventListener('change', function () {
    var model = this.options[this.selectedIndex].value;

    if (model !== 'n') {
        fetch('/api/metas/by-model-name?model=' + model).then(function (res) {
            return res.json().then(function (body) {
                return {
                    json: body,
                    response: res
                };
            });
        }).then(function (_ref) {
            var json = _ref.json;

            document.getElementById('meta-select-container').innerHTML = '';
            document.getElementById('meta-select-container').appendChild(Object(__WEBPACK_IMPORTED_MODULE_1__MetaDropDown__["a" /* metaDropDownGenerator */])(json, metaDropDownOnChangeHandler));
        });
    }
});

/**
 * Special calls, if Report has a ID property.
 */
if (Report.hasOwnProperty('id') && Report.id !== '') {
    // delete actions...
    Object(__WEBPACK_IMPORTED_MODULE_2__Controllers__["a" /* deleteAction */])();

    // add existing criteria to report form...
    Report.criteria.constructor === Array && Report.criteria.forEach(function (item, i) {
        var data = {};

        if (item.hasOwnProperty('text')) {
            data = item.text;
            data.type = 'text';
        }

        if (item.hasOwnProperty('date')) {
            data = item.date;
            data.type = 'date';
        }

        Object(__WEBPACK_IMPORTED_MODULE_3__CriteriaHtmlBuilder_index__["a" /* criteriaHtmlBuilder */])(i, data);
    });

    // Trigger onChange from select Model...
    var changeEvent = new Event('change');
    document.getElementById('model').dispatchEvent(changeEvent);
}

/***/ }),

/***/ 44:
/***/ (function(module, exports) {

Element.prototype.remove = function () {
    this.parentElement.removeChild(this);
};

NodeList.prototype.remove = HTMLCollection.prototype.remove = function () {
    for (var i = this.length - 1; i >= 0; i--) {
        if (this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
};

/***/ }),

/***/ 45:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return metaDropDownGenerator; });
/**
 *
 * @param data
 * @param callable
 * @returns {Element}
 */
var metaDropDownGenerator = function metaDropDownGenerator(data, callable) {
    var select = document.createElement('select');

    var chooseOption = document.createElement('option');
    chooseOption.text = 'Choose to add...';

    var noneValue = document.createAttribute('value');
    noneValue.value = 'n';

    chooseOption.setAttributeNode(noneValue);

    select.appendChild(chooseOption);

    data.forEach(function (item) {
        var option = document.createElement('option');
        option.text = item.label + ' (' + item.type + ')';
        option.dataset.type = item.type;
        option.dataset.id = item.id;

        var attr = document.createAttribute('value');
        attr.value = item.attribute;

        var id = document.createAttribute('id');
        id.value = 'select-meta';

        var className = document.createAttribute('class');
        className.value = 'form-control form-control-lg';

        option.setAttributeNode(attr);
        select.setAttributeNode(id);
        select.setAttributeNode(className);
        select.appendChild(option);
    });

    select.addEventListener('change', function () {
        callable(this);
    });

    return select;
};

/***/ }),

/***/ 46:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return deleteAction; });
// Delete action...
var deleteAction = function deleteAction() {
    document.getElementById('delete').addEventListener('click', function (e) {
        e.preventDefault();

        var confirm = window.confirm('Do you really want delete this entry?');

        if (!confirm) {
            return false;
        }

        document.querySelector('input[name="_method"]').value = 'DELETE';
        document.getElementById('form').submit();
    });
};

/***/ }),

/***/ 47:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return criteriaHtmlBuilder; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__templates_metas__ = __webpack_require__(48);


/**
 * Criteria HTML generator.
 *
 * @param i
 * @param data
 */
var criteriaHtmlBuilder = function criteriaHtmlBuilder(i, data) {
    var html = '';
    var id = '';

    switch (data.type) {
        case 'text':
            id = 'text_criteria_' + i;
            html += Object(__WEBPACK_IMPORTED_MODULE_0__templates_metas__["b" /* textTemplate */])(id, i, data);
            break;

        case 'date':
            id = 'date_criteria_' + i;
            html += Object(__WEBPACK_IMPORTED_MODULE_0__templates_metas__["a" /* dateTemplate */])(id, i, data);
            break;
    }

    if (html === '') {
        return;
    }

    var fragment = document.createRange().createContextualFragment(html);

    // append element into html...
    document.getElementById('criteria-container').appendChild(fragment);

    // add a listener to remove button...
    document.getElementById(id + '_remove').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById(id).remove();
    });
};

/***/ }),

/***/ 48:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return textTemplate; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return dateTemplate; });
var textTemplate = function textTemplate(id, index, data) {
    return '\n        <div class="col-6  mb-3" id="' + id + '">\n            <label for="a">\n                ' + data.label + ': \n                <small>\n                    <a href="#" id="' + id + '_remove">remove</a>\n                </small>\n            </label>\n            \n            <div class="input-group">\n                <input type="hidden" name="criteria[' + index + '][text][meta_id]" value="' + (data.id || data.meta_id) + '">\n                <input type="hidden" name="criteria[' + index + '][text][label]" value="' + data.label + '">\n                <select name="criteria[' + index + '][text][operator]" id="select" class="form-control ' + (index === 0 ? 'd-none' : '') + '">\n                    <option value="and" ' + (data.operator === '' ? 'selected' : data.operator === 'and' ? 'selected' : '') + '>AND</option>\n                    <option value="or" ' + (data.operator === 'or' ? 'selected' : '') + '>OR</option>\n                </select>\n    \n                <select name="criteria[' + index + '][text][comparision_type]" id="select" class="form-control">\n                    <option value="equals_to"  ' + (data.comparision_type === 'equals_to' ? 'selected' : '') + '>equals to:</option>\n                    <option value="start_with" ' + (data.comparision_type === 'start_with' ? 'selected' : '') + '>start with:</option>\n                    <option value="end_with"   ' + (data.comparision_type === 'end_with' ? 'selected' : '') + '>end with:</option>\n                </select>\n    \n                <input class="form-control" name="criteria[' + index + '][text][value]" value="' + data.value + '" placeholder="Value" />\n            </div>\n        </div>';
};

var dateTemplate = function dateTemplate(id, index, data) {
    return '\n        <div class="col-6 mb-3" id="' + id + '">\n            <label for="a">\n                ' + data.label + ': \n                <small>\n                    <a href="#" id="' + id + '_remove">remove</a>\n                </small>\n            </label>\n            \n            <div class="input-group">\n                <input type="hidden" name="criteria[' + index + '][date][meta_id]" value="' + (data.id || data.meta_id) + '">\n                <input type="hidden" name="criteria[' + index + '][date][label]" value="' + data.label + '">\n                <select name="criteria[' + index + '][date][operator]" id="select" class="form-control ' + (index === 0 ? 'd-none' : '') + '">\n                    <option value="and" ' + (data.operator === '' ? 'selected' : data.operator === 'and' ? 'selected' : '') + '>AND</option>\n                    <option value="or" ' + (data.operator === 'or' ? 'selected' : '') + '>OR</option>\n                </select>\n                <input class="form-control" name="criteria[' + index + '][date][start_date]" value="' + data.start_date + '" placeholder="From..." type="date" />\n                <input class="form-control" name="criteria[' + index + '][date][end_date]" value="' + data.end_date + '" placeholder="To..." type="date" />\n            </div>\n        </div>\n    ';
};

/***/ })

/******/ });