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
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

$(function () {
    $("#name").on("change", validateName);
    $("#email").on("change", validateEmail);
    $("#nick").on("change", validateNick);
    $("#password").on("change", validatePassword);
    $('#enviar').on("click", validateAll);
});

function validateName() {
    var regex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    var inputName = $("#name");
    var name = inputName.val();

    if (!name.match(regex) || name === "") {
        $('#name').removeClass('is-valid');
        $('#name').addClass('is-invalid');
        $('#errorName').html("Error en el nombre").addClass('is-invalid');
    } else {
        $('#name').removeClass('is-invalid');
        $('#name').addClass('is-valid');

        $('#errorName').removeClass('is-invalid');
        $('#errorName').html('');
    }
}

function validateEmail() {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var inputEmail = $("#email");
    var email = inputEmail.val();

    if (email.match(regex) || email === "") {
        $('#email').removeClass('is-invalid');
        $('#email').addClass('is-valid');
        $('#errorEmail').html('');
    } else {
        $('#email').removeClass('is-valid');
        $('#email').addClass('is-invalid');
        $('#errorEmail').html("El email no es correcto.").addClass('is-invalid');
    }
}

function validateNick() {
    var regex = /^[a-zA-Z]\w*$/;
    var inputNick = $("#nick");
    var nick = inputNick.val();

    if (!nick.match(regex) || nick === "") {
        $('#nick').removeClass('is-valid');
        $('#nick').addClass('is-invalid');
        $('#errorNick').html("Error en el nick").addClass('is-invalid');
    } else {
        $('#nick').removeClass('is-invalid');
        $('#nick').addClass('is-valid');

        $('#errorNick').removeClass('is-invalid');
        $('#errorNick').html('');
    }
}

function validatePassword() {
    var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    var inputPassword = $("#password");
    var password = inputPassword.val();

    if (!password.match(regex) || password === "") {
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
        $('#errorPassword').html("Error en la contraseña, mínimo 6 carácteres.").addClass('is-invalid');
    } else {
        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');

        $('#errorPassword').removeClass('is-invalid');
        $('#errorPassword').html('');
    }
}

function validateAll(e) {
    e.preventDefault();
    $('button').prop("disabled", true);

    var nombreCorrecto = validateName();
    var emailCorrecto = validateEmail();
    var nickCorrecto = validateNick();
    var passwordCorrecto = validatePassword();

    if (nombreCorrecto && emailCorrecto && nickCorrecto && passwordCorrecto) {
        $('#formulario').submit();
    }

    $('button').prop("disabled", false);
}

/***/ })

/******/ });