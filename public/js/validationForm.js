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
    $("#title").on("change", validateTitle);
    $("#category").on("change", validateCategory);
    $("#content").on("change", validateContent);
    $('#enviar').on("click", validateAll);
});

function validateTitle() {
    var regex = /^[-a-z0-9,\/()&:. ]*[a-z][-a-z0-9,\/()&:. ]*$/i;
    var inputTitle = $("#title");
    var title = inputTitle.val();

    if (!title.match(regex) || title === "") {
        $('#title').removeClass('is-valid');
        $('#title').addClass('is-invalid');
        $('#errorTitle').html("Error en el título.").addClass('is-invalid');
    } else {
        $('#title').removeClass('is-invalid');
        $('#title').addClass('is-valid');

        $('#errorTitle').removeClass('is-invalid');
        $('#errorTitle').html('');
    }
}

function validateCategory() {
    var regex = /^(?!----$).*/;
    var inputCategory = $("#category");
    var category = inputCategory.val();

    if (category.match(regex) || category === "") {
        $('#category').removeClass('is-invalid');
        $('#category').addClass('is-valid');
        $('#errorCategory').html('');
    } else {
        $('#category').removeClass('is-valid');
        $('#category').addClass('is-invalid');
        $('#errorCategory').html("La categoría no es correcta.").addClass('is-invalid');
    }
}

function validateContent() {
    var regex = /[^A-Za-z0-9 .'?!,@$#\-_]+/;
    var inputContent = $("#content");
    var content = inputContent.val();

    if (!content.match(regex) || content === "") {
        $('#content').removeClass('is-valid');
        $('#content').addClass('is-invalid');
        $('#errorContent').html("Error en el contenido.").addClass('is-invalid');
    } else {
        $('#content').removeClass('is-invalid');
        $('#content').addClass('is-valid');

        $('#errorContent').removeClass('is-invalid');
        $('#errorContent').html('');
    }
}

function validateAll(e) {
    e.preventDefault();
    $('button').prop("disabled", true);

    var tituloCorrecto = validateTitle();
    var categoriaCorrecto = validateCategory();
    var contenidoCorrecto = validateContent();

    if (tituloCorrecto && categoriaCorrecto && contenidoCorrecto) {
        $('#formulario').submit();
    }

    $('button').prop("disabled", false);
}

/***/ })

/******/ });