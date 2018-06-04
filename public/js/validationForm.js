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
/******/ 	return __webpack_require__(__webpack_require__.s = 47);
/******/ })
/************************************************************************/
/******/ ({

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(48);


/***/ }),

/***/ 48:
/***/ (function(module, exports) {

$(function () {
    $('#enviar').on("click", validateAll);
    $('#title').on("change", validateTitle);
    $('#category').on("change", validateCategory);
    $('#content').on("change", validateContent);
    $('#load').on("click", loadData);
    $('#loadOne').on("click", loadDataOne);
    $('#loadView').on("click", loadViewOne);
});

var cont = 0;

function validateAll(e) {

    e.preventDefault();
    var button = $('button');
    button.prop("disabled", true);

    var tituloCorrecto = validateTitle();
    var categoriaCorrecta = validateCategory();
    var contenidoCorrecto = validateContent();

    if (tituloCorrecto && categoriaCorrecta && contenidoCorrecto) {
        $('#form').submit();
    }

    button.prop("disabled", false);
}

function validate(field) {

    var data = {};
    data[field] = $("#" + field).val();

    axios.post('/topics/validate', data).then(function (response) {
        gestionarErrores($("#" + field), response.data[field]);
    }).catch(function (error) {
        console.log(error);
    });
}

function validateTitle() {
    validate("title");
}

function validateCategory() {
    validate("category");
}

function validateContent() {
    validate("content");
}

function gestionarErrores(input, errores) {
    var hayErrores = false;
    var divErrores = input.next("div");
    divErrores.html("");
    input.removeClass("is-valid is-invalid");

    if (errores.length === 0) {
        input.addClass("is-valid");
    } else {
        hayErrores = true;
        input.addClass("is-invalid");
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                divErrores.append('<div class="alert alert-danger" role="alert">' + error + '</div>');
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }
    }
    return hayErrores;
}

function showSpinner(input) {
    if (input.parent().next().length === 0) {
        var spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

function hideSpinner() {
    $("#" + campo).parent().next().remove();
}

function loadData() {

    var resp = $("#topicList");

    axios.get('/data/loadAjax', {}).then(function (response) {
        showResponse(response, resp);
    }).catch(function (error) {
        console.log(error);
    });
}

function loadDataOne() {

    var resp = $("#topicList");
    axios.post('/data/loadAjaxOne', {
        posicionInicial: cont,
        numeroElementos: 1
    }).then(function (response) {
        showResponse(response, resp);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function loadViewOne() {
    axios.post('/topics/viewTopic', {
        posicionInicial: cont,
        numeroElementos: 1
    }).then(function (response) {
        $('#topicList').append(response.data);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function buildElement(elemento) {

    var div = $("<div></div>");
    div.addClass("card");

    var divHeader = $('<div></div>');
    divHeader.addClass("card-header");
    var h2 = $("<h2></h2>");
    var a = $("<a></a>");
    var p = $("<p></p>");
    var em = $("<em></em>");
    var pContent = $("<p></p>");

    h2.addClass("card-title");
    p.addClass("card-subtitle");
    pContent.addClass("card-body");

    a.text(elemento.title);
    p.text(elemento.category);
    pContent.text(elemento.content);

    h2.append(a);
    divHeader.append(h2);
    p.append(em);
    divHeader.append(p);
    div.append(divHeader);
    div.append(pContent);

    return div;
}

function showResponse(response, resp) {
    var data = response.data;
    for (var item in response.data) {
        var elemento = data[item];
        var div = buildElement(elemento);
        resp.append(div);
    }
}

/***/ })

/******/ });