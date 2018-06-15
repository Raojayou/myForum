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
/******/ 	return __webpack_require__(__webpack_require__.s = 54);
/******/ })
/************************************************************************/
/******/ ({

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(55);


/***/ }),

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function formularioEditarTema() {
    event.preventDefault();
    $(event.target).addClass("active");
    axios.get('/topics/edit').then(function (response) {
        $("#formularioEditarTema").html(response.data);

        asociarEventoAsincrono();
        asociarValidaciones();
    }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono() {
    $("#formularioEditarTemaBoton").on("click", formularioEditarTema);
}

$(function () {
    asociarEventoAsincrono();
});

function gestionarErrores(input, errores) {
    var noEnviarFormulario = false;
    input = $(input);
    if ((typeof errores === "undefined" ? "undefined" : _typeof(errores)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                input.after("<div class=\"invalid-feedback\">\n                <strong> " + error + " </strong>\n            </div>");
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

        noEnviarFormulario = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noEnviarFormulario;
}

function validateTarget(target) {
    var formData = new FormData();
    formData.append(target.id, target.value);

    $("#" + target).next().css("display", "block");

    axios.post('/topics/update', formData).then(function (response) {

        $("#" + target).next().css("display", "none");

        switch (target.id) {
            case "title":
                gestionarErrores(target, response.data.title);
                break;
            case "category":
                gestionarErrores(target, response.data.category);
                break;
            case "content":
                gestionarErrores(target, response.data.content);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function asociarValidaciones() {
    $("#title, #category, #content").on('change', function (e) {
        validateTarget(e.target);
    });

    $("#botonFormularioEditarTema").click(function (e) {
        e.preventDefault();
        var enviarFormulario = true;
        var formData = new FormData();

        formData.append('title', $("#title").val());
        formData.append('category', $("#category").val());
        formData.append('content', $("#content").val());

        axios.post('/topics/update', formData).then(function (response) {
            if (gestionarErrores("#title", response.data.title)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#category", response.data.category)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#content", response.data.content)) {
                enviarFormulario = false;
            }

            if (enviarFormulario === true) {
                $("#formEditarTema").submit();
            }
        });
    });
}

/***/ })

/******/ });