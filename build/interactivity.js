/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
import * as __WEBPACK_EXTERNAL_MODULE__wordpress_interactivity_8e89b257__ from "@wordpress/interactivity";
/******/ var __webpack_modules__ = ({

/***/ "./src/js/interactivity/index.js"
/*!***************************************!*\
  !*** ./src/js/interactivity/index.js ***!
  \***************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _portfolio__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./portfolio */ \"./src/js/interactivity/portfolio/index.js\");\n\n\n\n//# sourceURL=webpack://pealutz/./src/js/interactivity/index.js?\n}");

/***/ },

/***/ "./src/js/interactivity/portfolio/index.js"
/*!*************************************************!*\
  !*** ./src/js/interactivity/portfolio/index.js ***!
  \*************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/interactivity */ \"@wordpress/interactivity\");\n\n\nconst { state } = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.store)( 'pealutz/portfolio', {\n\tstate: {\n\t\tactiveFilter: '',\n\t},\n\tactions: {\n\t\tsetFilter( event ) {\n\t\t\tevent.preventDefault();\n\t\t\tconst { termSlug } = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();\n\t\t\tstate.activeFilter = state.activeFilter === termSlug ? '' : termSlug;\n\t\t},\n\t\tresetFilter( event ) {\n\t\t\tevent.preventDefault();\n\t\t\tstate.activeFilter = '';\n\t\t},\n\t},\n\tcallbacks: {\n\t\tisActive() {\n\t\t\tconst { termSlug } = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getContext)();\n\t\t\treturn state.activeFilter === termSlug;\n\t\t},\n\t\tisAllActive() {\n\t\t\treturn state.activeFilter === '';\n\t\t},\n\t\tisHidden() {\nif ( ! state.activeFilter ) {\n\t\t\t\treturn false;\n\t\t\t}\n\t\t\tconst { ref } = (0,_wordpress_interactivity__WEBPACK_IMPORTED_MODULE_0__.getElement)();\n\t\t\treturn ! ref.classList.contains( `project_tag-${ state.activeFilter }` );\n\t\t},\n\t},\n} );\n\n\n//# sourceURL=webpack://pealutz/./src/js/interactivity/portfolio/index.js?\n}");

/***/ },

/***/ "@wordpress/interactivity"
/*!*******************************************!*\
  !*** external "@wordpress/interactivity" ***!
  \*******************************************/
(module) {

module.exports = __WEBPACK_EXTERNAL_MODULE__wordpress_interactivity_8e89b257__;

/***/ }

/******/ });
/************************************************************************/
/******/ // The module cache
/******/ var __webpack_module_cache__ = {};
/******/ 
/******/ // The require function
/******/ function __webpack_require__(moduleId) {
/******/ 	// Check if module is in cache
/******/ 	var cachedModule = __webpack_module_cache__[moduleId];
/******/ 	if (cachedModule !== undefined) {
/******/ 		return cachedModule.exports;
/******/ 	}
/******/ 	// Create a new module (and put it into the cache)
/******/ 	var module = __webpack_module_cache__[moduleId] = {
/******/ 		// no module.id needed
/******/ 		// no module.loaded needed
/******/ 		exports: {}
/******/ 	};
/******/ 
/******/ 	// Execute the module function
/******/ 	if (!(moduleId in __webpack_modules__)) {
/******/ 		delete __webpack_module_cache__[moduleId];
/******/ 		var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 		e.code = 'MODULE_NOT_FOUND';
/******/ 		throw e;
/******/ 	}
/******/ 	__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 
/******/ 	// Return the exports of the module
/******/ 	return module.exports;
/******/ }
/******/ 
/************************************************************************/
/******/ /* webpack/runtime/make namespace object */
/******/ (() => {
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = (exports) => {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/ })();
/******/ 
/************************************************************************/
/******/ 
/******/ // startup
/******/ // Load entry module and return exports
/******/ // This entry module can't be inlined because the eval devtool is used.
/******/ var __webpack_exports__ = __webpack_require__("./src/js/interactivity/index.js");
/******/ 
