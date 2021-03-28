(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/TestProcess.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _components_colored_header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/colored-header */ "./resources/js/components/colored-header.vue");
/* harmony import */ var _components_customSubmitButton__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/customSubmitButton */ "./resources/js/components/customSubmitButton.vue");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      questionIndex: 0,
      questionState: 0,
      userResponses: [],
      score: 0,
      isActive: false
    };
  },
  components: {
    coloredHeader: _components_colored_header__WEBPACK_IMPORTED_MODULE_1__["default"],
    customSubmitButton: _components_customSubmitButton__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  filters: {
    charIndex: function charIndex(i) {
      return String.fromCharCode(97 + i);
    }
  },
  mounted: function mounted() {
    console.log("Color style");
    this.resetOnlyProgress();
    console.log(this.testState);
    console.log(this.Test);
    console.log(this.colorStyle);
  },
  computed: _objectSpread(_objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapGetters"])(['Test', 'testState', 'colorStyle', 'fetchTestResult'])), {}, {
    percentage: function percentage() {
      return this.questionIndex / this.Test.questions.length * 100;
    }
  }),
  methods: _objectSpread(_objectSpread(_objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapMutations"])(['resetOnlyProgress'])), Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])(['sendTestScore'])), {}, {
    selectOption: function selectOption(index) {
      // if already answered
      if (this.questionState != 0) return; // if it is right answer

      if (this.Test.questions[this.questionIndex].answers[index].is_correct === 1) {
        this.questionState = 1;
        this.score++;
        console.log("right");
      } else {
        this.questionState = -1;
        console.log("wrong!");
      }

      console.log(this.questionState); // add response

      Vue.set(this.userResponses, this.questionIndex, index);
      console.log(this.userResponses);
    },
    endTest: function endTest() {
      console.log('test has been finished');
      this.sendTestScore(this.score);
      this.$router.push('/test_result');
    },
    nextQ: function nextQ() {
      if (this.questionIndex + 1 != this.userResponses.length) return;
      this.questionState = 0;
      if (this.questionIndex + 1 < this.Test.questions.length) this.questionIndex++;else {
        this.endTest();
      }
    },
    prevQ: function prevQ() {
      if (this.Test.questions.length > 0) this.questionIndex--;
    },
    Warn: function Warn() {
      console.log('Suraqqa jauap berwiw');
    }
  })
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\nbody[data-v-fc0ebaa4] {\n    font-family: \"Open Sans\", sans-serif;\n    font-size: 14px;\n    height: 100vh;\n    background: #CFD8DC;\n    cursor: default !important;\n    -webkit-user-select: none;\n       -moz-user-select: none;\n        -ms-user-select: none;\n            user-select: none;\n    user-drag: none;\n    display: flex;\n    align-items: center;\n    justify-content: center;\n}\n.button[data-v-fc0ebaa4] {\n    transition: 0.3s;\n}\n.title[data-v-fc0ebaa4],\n.subtitle[data-v-fc0ebaa4] {\n    font-family: Montserrat, sans-serif;\n    font-weight: normal;\n}\n.animated[data-v-fc0ebaa4] {\n  transition-duration: 0.15s;\n}\n.questionBox[data-v-fc0ebaa4] {\n    width: auto;\n    \n    /* min-height: 450px; */\n    max-height: 85%;\n    \n    position: relative;\n    \n    display: flex;\n    flex-flow: column;\n\n    overflow: hidden;\n\n    /*box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);*/\n}\n.questionBox h1[data-v-fc0ebaa4] {\n    font-weight: bold;\n    margin-bottom: 1rem !important;\n}\n.questionBox .progressContainer[data-v-fc0ebaa4] {\n    margin: 0 auto;\n    width: 100%;\n}\n.questionBox .titleContainer[data-v-fc0ebaa4] {\n\n    min-height: 64px;\n    max-height: 112px;\n\n    display: flex;\n    align-items: center;\n    justify-content: center;\n\n    text-align: center;\n\n    margin: 0 0px;\n    margin-bottom: 24px;\n    padding: 10px 10px;\n    \n    transition: 0.3s;\n    cursor: pointer;\n\n    background-color: #EAEAF6;\n    color: rgba(0, 0, 0, 0.85);\n    \n    border-radius: 5px;\n    border: transparent 1px solid;\n\n    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.19), 0 3px 3px rgba(0, 0, 0, 0.23);\n}\n.questionBox .quizForm[data-v-fc0ebaa4] {\n    display: block;\n    white-space: normal;\n    height: 100%;\n    width: 100%;\n}\n.questionBox .quizForm .quizFormContainer[data-v-fc0ebaa4] {\n    height: 100%;\n    margin: 15px 18px;\n}\n.questionBox .quizForm .quizFormContainer .field-label[data-v-fc0ebaa4] {\n    text-align: left;\n    margin-bottom: 0.5rem;\n}\n.questionBox .quizCompleted[data-v-fc0ebaa4] {\n    width: 100%;\n    padding: 1rem;\n    text-align: center;\n}\n.questionBox .quizCompleted > .icon[data-v-fc0ebaa4] {\n    color: #FF5252;\n    font-size: 5rem;\n}\n.questionBox .quizCompleted > .icon .is-active[data-v-fc0ebaa4] {\n    color: #00E676;\n}\n.questionBox .questionContainer[data-v-fc0ebaa4] {\n    white-space: normal;\n    height: 100%;\n    width: 100%;\n}\n.questionBox .questionContainer .optionContainer[data-v-fc0ebaa4] {\n    margin-bottom: 24px;\n    flex-grow: 1;\n}\n.questionBox .questionContainer .optionContainer .option[data-v-fc0ebaa4] {      \n    position: relative;  \n    min-height: 10vh;\n    padding: 5px 10px;\n    text-align: center;\n\n    display: flex;\n    align-items: center;\n    justify-content: center;\n\n    margin: 0 8px;\n    margin-bottom: 12px;\n    \n    transition: 0.3s;\n    cursor: pointer;\n\n    background-color: #EAEAF6;\n    color: rgba(0, 0, 0, 0.85);\n    \n    border-radius: 5px;\n    border: transparent 1px solid;\n}\n.questionBox .questionContainer .optionContainer .option.right_answer[data-v-fc0ebaa4] {\n    border-color: rgba(0, 0, 0, 0.25);\n    background-color: #42C284;\n    color: white;\n}\n.questionBox .questionContainer .optionContainer .option.wrong_answer[data-v-fc0ebaa4] {\n    border-color: rgba(0, 0, 0, 0.25);\n    background-color: #FD8362;\n    color: white;\n}\n.questionBox .questionContainer .optionContainer .option.is-selected[data-v-fc0ebaa4] {\n    border-color: rgba(0, 0, 0, 0.25);\n    background-color: white;\n}\n/*\n.questionBox .questionContainer .optionContainer .option:hover {\n    background-color: rgba(0, 0, 0, 0.1);\n}\n*/\n.questionBox .questionContainer .optionContainer .option[data-v-fc0ebaa4]:active {\n    transform: scaleX(0.9);\n}\n.questionBox .questionContainer .questionFooter[data-v-fc0ebaa4] {\n    background: rgba(0, 0, 0, 0.025);\n    border-top: 1px solid rgba(0, 0, 0, 0.1);\n    width: 100%;\n    align-self: flex-end;\n}\n.questionBox .questionContainer .questionFooter .pagination[data-v-fc0ebaa4] {\n    margin: 15px 25px;\n}\n.pagination[data-v-fc0ebaa4] {\n    display: flex;\n    justify-content: space-between;\n}\n.button[data-v-fc0ebaa4] {\n    padding: 0.5rem 1rem;\n    border: 1px solid rgba(0, 0, 0, 0.25);\n    border-radius: 5rem;\n    margin: 0 0.25rem;\n    transition: 0.3s;\n}\n.button[data-v-fc0ebaa4]:hover {\n    cursor: pointer;\n    background: #ECEFF1;\n    border-color: rgba(0, 0, 0, 0.25);\n}\n.button.is-active[data-v-fc0ebaa4] {\n    background: #3D5AFE;\n    color: white;\n    border-color: transparent;\n}\n.button.is-active[data-v-fc0ebaa4]:hover {\n    background: #0a2ffe;\n}\n/*\n@media screen and (min-width: 769px) {\n.questionBox {\n    align-items: center;\n    justify-content: center;\n}\n.questionBox .questionContainer {\n    display: flex;\n    flex-direction: column;\n}\n}\n@media screen and (max-width: 768px) {\n.sidebar {\n    height: auto !important;\n    border-radius: 6px 6px 0px 0px;\n}\n}\n*/\n.timeIsUp[data-v-fc0ebaa4] {   \n    position: fixed;\n\n    font-size: 24px;\n    color: white;\n\n    width: 100%;\n    height: 100%;\n    top: 0;\n    left: 0;\n    right: 0;\n    bottom: 0;\n    z-index: 2;\n    cursor: pointer;\n}\n.timeIsUp .bg[data-v-fc0ebaa4]{\n\n    background-color: rgba(0,0,0,0.75);\n    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAAA1BMVEUAAACnej3aAAAASElEQVR4nO3BMQEAAADCoPVPbQhfoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABeA8XKAAFZcBBuAAAAAElFTkSuQmCC');\n\n    opacity: 0.8;\n\n    /* Full height */\n    height: 100%;\n\n    /* Center and scale the image nicely */\n    background-position: center;\n    background-repeat: no-repeat;\n    background-size: cover;\n}\n.timeIsUp .main[data-v-fc0ebaa4] {\n    position: absolute;\n    top: 50%;\n    left: 50%;\n    transform: translate(-50%, -50%);\n    text-align: center;\n}\n.timeIsUp h1[data-v-fc0ebaa4]{   \n    margin-bottom: 12px;\n    font: Condensed Bold 23px/24px 'Nunito';\n}\n[data-v-fc0ebaa4] .timeIsUp .submit_button {\n    min-width: 256px;\n    max-width: 384px;\n}\n[data-v-fc0ebaa4] .submit_button {\n    margin: 0 8px;\n}\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--6-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/vue-loader/lib??vue-loader-options!./TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************/
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
    { staticClass: "wrapper" },
    [
      _c("colored-header", {
        attrs: {
          colorStyle: _vm.colorStyle,
          title: _vm.Test.title,
          Timer: true
        }
      }),
      _vm._v(" "),
      _vm.testState == 2
        ? _c("div", { staticClass: "timeIsUp" }, [
            _c("div", { staticClass: "bg" }),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "main" },
              [
                _c("h1", [_vm._v(" Уақыт бітті ")]),
                _vm._v(" "),
                _c("custom-submit-button", {
                  attrs: { title: "Аяқтау", colorStyle: _vm.colorStyle },
                  on: { clicked: _vm.endTest }
                })
              ],
              1
            )
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "questionBox container" },
        [
          _c("div", { staticClass: "progressContainer mb-3" }, [
            _c(
              "div",
              {
                staticClass: "progress",
                attrs: { value: _vm.percentage, max: "100" }
              },
              [
                _c(
                  "div",
                  {
                    staticClass: "progress-bar",
                    class: _vm.colorStyle,
                    style: "width: max(8%," + _vm.percentage + "%);",
                    attrs: {
                      role: "progressbar",
                      "aria-valuenow": _vm.percentage,
                      "aria-valuemin": "0",
                      "aria-valuemax": "100"
                    }
                  },
                  [
                    _c("span", { staticClass: "white_text" }, [
                      _vm._v(_vm._s(_vm.percentage) + "%")
                    ])
                  ]
                )
              ]
            )
          ]),
          _vm._v(" "),
          _c("transition", { attrs: { name: "slide-fade", mode: "out-in" } }, [
            _vm.questionIndex < _vm.Test.questions.length
              ? _c(
                  "div",
                  { key: _vm.questionIndex, staticClass: "questionContainer" },
                  [
                    _c("h2", { staticClass: "titleContainer title" }, [
                      _vm._v(
                        "\n                    " +
                          _vm._s(
                            _vm.Test.questions[_vm.questionIndex].question
                          ) +
                          "\n                "
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "optionContainer" },
                      _vm._l(
                        _vm.Test.questions[_vm.questionIndex].answers,
                        function(response, index) {
                          return _c(
                            "div",
                            {
                              key: index,
                              staticClass: "option",
                              class: {
                                right_answer:
                                  _vm.questionState == 1 &&
                                  _vm.userResponses[_vm.questionIndex] == index,
                                wrong_answer:
                                  _vm.questionState == -1 &&
                                  _vm.userResponses[_vm.questionIndex] == index
                              },
                              on: {
                                click: function($event) {
                                  return _vm.selectOption(index)
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(response.answer) +
                                  "\n                    "
                              )
                            ]
                          )
                        }
                      ),
                      0
                    ),
                    _vm._v(" "),
                    _vm.questionIndex + 1 == _vm.userResponses.length &&
                    _vm.userResponses.length < _vm.Test.questions.length
                      ? _c("custom-submit-button", {
                          attrs: {
                            title: "Келесі сұрақ",
                            colorStyle: _vm.colorStyle
                          },
                          on: { clicked: _vm.nextQ }
                        })
                      : _vm.questionIndex + 1 == _vm.userResponses.length &&
                        _vm.userResponses.length == _vm.Test.questions.length
                      ? _c("custom-submit-button", {
                          attrs: {
                            title: "Аяқтау",
                            colorStyle: _vm.colorStyle
                          },
                          on: { clicked: _vm.nextQ }
                        })
                      : _c("custom-submit-button", {
                          attrs: { title: "Cұраққа жауап беріңіз" },
                          on: { clicked: _vm.Warn }
                        })
                  ],
                  1
                )
              : _vm._e()
          ])
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/TestProcess.vue":
/*!********************************************!*\
  !*** ./resources/js/views/TestProcess.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TestProcess_vue_vue_type_template_id_fc0ebaa4_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true& */ "./resources/js/views/TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true&");
/* harmony import */ var _TestProcess_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TestProcess.vue?vue&type=script&lang=js& */ "./resources/js/views/TestProcess.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _TestProcess_vue_vue_type_style_index_0_id_fc0ebaa4_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css& */ "./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _TestProcess_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TestProcess_vue_vue_type_template_id_fc0ebaa4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _TestProcess_vue_vue_type_template_id_fc0ebaa4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "fc0ebaa4",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/TestProcess.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/TestProcess.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/views/TestProcess.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./TestProcess.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css& ***!
  \*****************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_style_index_0_id_fc0ebaa4_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--6-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/vue-loader/lib??vue-loader-options!./TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=style&index=0&id=fc0ebaa4&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_style_index_0_id_fc0ebaa4_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_style_index_0_id_fc0ebaa4_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_style_index_0_id_fc0ebaa4_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_style_index_0_id_fc0ebaa4_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/views/TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true&":
/*!***************************************************************************************!*\
  !*** ./resources/js/views/TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_template_id_fc0ebaa4_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/TestProcess.vue?vue&type=template&id=fc0ebaa4&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_template_id_fc0ebaa4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TestProcess_vue_vue_type_template_id_fc0ebaa4_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);