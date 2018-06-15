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
/******/ 	return __webpack_require__(__webpack_require__.s = 52);
/******/ })
/************************************************************************/
/******/ ({

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(53);


/***/ }),

/***/ 53:
/***/ (function(module, exports) {

// Add a new topic
$(document).on('click', '.add-modal', function () {
    $('.modal-title').text('Add');
    $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function () {
    $.ajax({
        type: 'POST',
        url: 'topics',
        data: {
            '_token': $('input[name=_token]').val(),
            'title': $('#title_add').val(),
            'category': $('#category_add').val(),
            'content': $('#content_add').val()
        },
        success: function success(data) {
            $('.errorTitle').addClass('hidden');
            $('.errorCategory').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if (data.errors) {
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Error al crear!', 'Error Alert', { timeOut: 5000 });
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.category) {
                    $('.errorCategory').removeClass('hidden');
                    $('.errorCategory').text(data.errors.title);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Successfully added Post!', 'Success Alert', { timeOut: 5000 });
                $('#topicsTable').prepend("<tr class='item" + data.id + "'>" + "<td class='col1'>" + data.id + "</td>" + "<td>" + data.title + "</td>" + "<td>" + data.category + "</td>" + "<td>" + data.content + "</td>" + "<td class='text-center'>" + "<td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" + "<span class='glyphicon glyphicon-eye-open'></span> Show</button> " + "<button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" + "<span class='glyphicon glyphicon-edit'></span> Edit</button> " + "<button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" + "<span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                $('.col1').each(function (index) {
                    $(this).html(index + 1);
                });
            }
        }
    });
});

/***/ })

/******/ });