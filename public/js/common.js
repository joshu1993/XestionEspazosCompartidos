/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/common.js":
/*!********************************!*\
  !*** ./resources/js/common.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"showNotify\": () => (/* binding */ showNotify)\n/* harmony export */ });\n/*\r\n$(document).ready(function() {\r\n\r\n\r\n});\r\n\r\n*/\nvar showNotify = function showNotify(type) {\n  var newMessage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : \"\";\n  var messageText = \"\";\n\n  if (newMessage != \"\") {\n    messageText = newMessage;\n  } else if (type == 'success') {\n    messageText = \"Acción realizada con éxito\";\n  } else if (type == 'warning') {\n    messageText = \"Acción completada con errores\";\n  } else if (type == 'danger') {\n    messageText = \"Error en el proceso: acción no realizada\";\n  }\n\n  $.notify({\n    message: messageText\n  }, {\n    element: 'body',\n    type: type,\n    allow_dismiss: true,\n    newest_on_top: true,\n    showProgressbar: false,\n    placement: {\n      from: \"bottom\",\n      align: \"center\"\n    },\n    offset: 20,\n    spacing: 10,\n    z_index: 1031,\n    delay: 4000,\n    timer: 1000\n  });\n};\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY29tbW9uLmpzLmpzIiwibWFwcGluZ3MiOiI7Ozs7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUdBLElBQUlBLFVBQVUsR0FBRyxTQUFiQSxVQUFhLENBQVNDLElBQVQsRUFBOEI7QUFBQSxNQUFmQyxVQUFlLHVFQUFKLEVBQUk7QUFFM0MsTUFBSUMsV0FBVyxHQUFHLEVBQWxCOztBQUVBLE1BQUlELFVBQVUsSUFBSSxFQUFsQixFQUFzQjtBQUNsQkMsSUFBQUEsV0FBVyxHQUFHRCxVQUFkO0FBQ0gsR0FGRCxNQUdLLElBQUlELElBQUksSUFBSSxTQUFaLEVBQXVCO0FBQ3hCRSxJQUFBQSxXQUFXLEdBQUcsNEJBQWQ7QUFDSCxHQUZJLE1BR0EsSUFBSUYsSUFBSSxJQUFJLFNBQVosRUFBdUI7QUFDeEJFLElBQUFBLFdBQVcsR0FBRywrQkFBZDtBQUNILEdBRkksTUFHQSxJQUFJRixJQUFJLElBQUksUUFBWixFQUFzQjtBQUN2QkUsSUFBQUEsV0FBVyxHQUFHLDBDQUFkO0FBQ0g7O0FBRURDLEVBQUFBLENBQUMsQ0FBQ0MsTUFBRixDQUFTO0FBQ0xDLElBQUFBLE9BQU8sRUFBRUg7QUFESixHQUFULEVBRUU7QUFDRUksSUFBQUEsT0FBTyxFQUFFLE1BRFg7QUFFRU4sSUFBQUEsSUFBSSxFQUFFQSxJQUZSO0FBR0VPLElBQUFBLGFBQWEsRUFBRSxJQUhqQjtBQUlFQyxJQUFBQSxhQUFhLEVBQUUsSUFKakI7QUFLRUMsSUFBQUEsZUFBZSxFQUFFLEtBTG5CO0FBTUVDLElBQUFBLFNBQVMsRUFBRTtBQUNQQyxNQUFBQSxJQUFJLEVBQUUsUUFEQztBQUVQQyxNQUFBQSxLQUFLLEVBQUU7QUFGQSxLQU5iO0FBVUVDLElBQUFBLE1BQU0sRUFBRSxFQVZWO0FBV0VDLElBQUFBLE9BQU8sRUFBRSxFQVhYO0FBWUVDLElBQUFBLE9BQU8sRUFBRSxJQVpYO0FBYUVDLElBQUFBLEtBQUssRUFBRSxJQWJUO0FBY0VDLElBQUFBLEtBQUssRUFBRTtBQWRULEdBRkY7QUFrQkgsQ0FuQ0QiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY29tbW9uLmpzPzZiMDQiXSwic291cmNlc0NvbnRlbnQiOlsiXHJcbi8qXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG5cclxuXHJcbn0pO1xyXG5cclxuKi9cclxuXHJcblxyXG5sZXQgc2hvd05vdGlmeSA9IGZ1bmN0aW9uKHR5cGUsIG5ld01lc3NhZ2U9XCJcIikge1xyXG5cclxuICAgIHZhciBtZXNzYWdlVGV4dCA9IFwiXCI7XHJcblxyXG4gICAgaWYgKG5ld01lc3NhZ2UgIT0gXCJcIikge1xyXG4gICAgICAgIG1lc3NhZ2VUZXh0ID0gbmV3TWVzc2FnZTtcclxuICAgIH1cclxuICAgIGVsc2UgaWYgKHR5cGUgPT0gJ3N1Y2Nlc3MnKSB7XHJcbiAgICAgICAgbWVzc2FnZVRleHQgPSBcIkFjY2nDs24gcmVhbGl6YWRhIGNvbiDDqXhpdG9cIjtcclxuICAgIH1cclxuICAgIGVsc2UgaWYgKHR5cGUgPT0gJ3dhcm5pbmcnKSB7XHJcbiAgICAgICAgbWVzc2FnZVRleHQgPSBcIkFjY2nDs24gY29tcGxldGFkYSBjb24gZXJyb3Jlc1wiO1xyXG4gICAgfVxyXG4gICAgZWxzZSBpZiAodHlwZSA9PSAnZGFuZ2VyJykge1xyXG4gICAgICAgIG1lc3NhZ2VUZXh0ID0gXCJFcnJvciBlbiBlbCBwcm9jZXNvOiBhY2Npw7NuIG5vIHJlYWxpemFkYVwiO1xyXG4gICAgfVxyXG5cclxuICAgICQubm90aWZ5KHtcclxuICAgICAgICBtZXNzYWdlOiBtZXNzYWdlVGV4dCxcclxuICAgIH0se1xyXG4gICAgICAgIGVsZW1lbnQ6ICdib2R5JyxcclxuICAgICAgICB0eXBlOiB0eXBlLFxyXG4gICAgICAgIGFsbG93X2Rpc21pc3M6IHRydWUsXHJcbiAgICAgICAgbmV3ZXN0X29uX3RvcDogdHJ1ZSxcclxuICAgICAgICBzaG93UHJvZ3Jlc3NiYXI6IGZhbHNlLFxyXG4gICAgICAgIHBsYWNlbWVudDoge1xyXG4gICAgICAgICAgICBmcm9tOiBcImJvdHRvbVwiLFxyXG4gICAgICAgICAgICBhbGlnbjogXCJjZW50ZXJcIlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgb2Zmc2V0OiAyMCxcclxuICAgICAgICBzcGFjaW5nOiAxMCxcclxuICAgICAgICB6X2luZGV4OiAxMDMxLFxyXG4gICAgICAgIGRlbGF5OiA0MDAwLFxyXG4gICAgICAgIHRpbWVyOiAxMDAwXHJcbiAgICB9KTtcclxufVxyXG5cclxuZXhwb3J0IHsgc2hvd05vdGlmeSB9O1xyXG4iXSwibmFtZXMiOlsic2hvd05vdGlmeSIsInR5cGUiLCJuZXdNZXNzYWdlIiwibWVzc2FnZVRleHQiLCIkIiwibm90aWZ5IiwibWVzc2FnZSIsImVsZW1lbnQiLCJhbGxvd19kaXNtaXNzIiwibmV3ZXN0X29uX3RvcCIsInNob3dQcm9ncmVzc2JhciIsInBsYWNlbWVudCIsImZyb20iLCJhbGlnbiIsIm9mZnNldCIsInNwYWNpbmciLCJ6X2luZGV4IiwiZGVsYXkiLCJ0aW1lciJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/common.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
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
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/common.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;