(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/menu/MenuItem.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/menu/MenuItem.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MenuItemsContainer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MenuItemsContainer */ "./resources/js/components/menu/MenuItemsContainer.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'menu-item',
  components: {
    menuItemContainer: function menuItemContainer() {
      return _MenuItemsContainer__WEBPACK_IMPORTED_MODULE_0__["default"];
    } //MenuItemsContainer: () => import('./MenuItemsContainer'),

  },
  props: {
    menuItemData: {
      type: Object,
      "default": function _default() {
        return {
          id: 1,
          classes: 'text-uppercase',
          url: '/',
          title: {
            classes: '',
            status: 0,
            text: 'menu item',
            structure: {
              classes: {
                type: 'text'
              },
              status: {
                type: 'text'
              },
              styles: {
                nested: [],
                type: 'json'
              },
              text: {
                type: 'text'
              }
            },
            styles: []
          },
          description: {
            classes: '',
            status: 0,
            text: 'simple menu item',
            structure: {
              classes: {
                type: 'text'
              },
              status: {
                type: 'text'
              },
              styles: {
                nested: [],
                type: 'json'
              },
              text: {
                type: 'text'
              }
            },
            styles: []
          },
          styles: []
        };
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/menu/MenuItem.vue?vue&type=template&id=1101a2a7&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/menu/MenuItem.vue?vue&type=template&id=1101a2a7& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { class: _vm.menuItemData.classes, style: _vm.menuItemData.styles },
    [
      _vm.menuItemData.title && _vm.menuItemData.title.status
        ? _c(
            "a",
            {
              class: _vm.menuItemData.title.classes,
              style: _vm.menuItemData.title.styles,
              attrs: {
                href:
                  _vm.$helpers.adminUrlPrefix(_vm.$store.getters.locale) +
                  _vm.menuItemData.url
              }
            },
            [
              _vm._v(
                "\n        " + _vm._s(_vm.menuItemData.title.text) + "\n    "
              )
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.menuItemData.description && _vm.menuItemData.description.status
        ? _c(
            "div",
            {
              class: _vm.menuItemData.description.classes,
              style: _vm.menuItemData.description.styles
            },
            [
              _vm._v(
                "\n        " +
                  _vm._s(_vm.menuItemData.description.text) +
                  "\n    "
              )
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _vm._l(_vm.menuItemData.menuItems, function(menuItem) {
        return _c("menu-items-container", {
          key: menuItem.id,
          attrs: { menuItemData: menuItem }
        })
      })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/menu/MenuItem.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/menu/MenuItem.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MenuItem_vue_vue_type_template_id_1101a2a7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MenuItem.vue?vue&type=template&id=1101a2a7& */ "./resources/js/components/menu/MenuItem.vue?vue&type=template&id=1101a2a7&");
/* harmony import */ var _MenuItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MenuItem.vue?vue&type=script&lang=js& */ "./resources/js/components/menu/MenuItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _MenuItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _MenuItem_vue_vue_type_template_id_1101a2a7___WEBPACK_IMPORTED_MODULE_0__["render"],
  _MenuItem_vue_vue_type_template_id_1101a2a7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/menu/MenuItem.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/menu/MenuItem.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/menu/MenuItem.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MenuItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./MenuItem.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/menu/MenuItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MenuItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/menu/MenuItem.vue?vue&type=template&id=1101a2a7&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/menu/MenuItem.vue?vue&type=template&id=1101a2a7& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MenuItem_vue_vue_type_template_id_1101a2a7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./MenuItem.vue?vue&type=template&id=1101a2a7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/menu/MenuItem.vue?vue&type=template&id=1101a2a7&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MenuItem_vue_vue_type_template_id_1101a2a7___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MenuItem_vue_vue_type_template_id_1101a2a7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);