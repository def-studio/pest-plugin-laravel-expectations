/*! For license information please see LICENSES */
(window.webpackJsonp=window.webpackJsonp||[]).push([[0,15,16],{248:function(t,e,n){"use strict";n.r(e);var r=n(2),component=Object(r.a)({},(function(){var t=this._self._c;return t("svg",{attrs:{fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor"}},[t("path",{attrs:{d:"M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"}})])}),[],!1,null,null,null);e.default=component.exports},249:function(t,e,n){"use strict";n.r(e);var r=n(2),component=Object(r.a)({},(function(){var t=this._self._c;return t("svg",{attrs:{fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor"}},[t("path",{attrs:{d:"M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"}})])}),[],!1,null,null,null);e.default=component.exports},251:function(t,e,n){var r;r=function(){return function(){var t={686:function(t,e,n){"use strict";n.d(e,{default:function(){return _}});var r=n(279),o=n.n(r),c=n(370),l=n.n(c),f=n(817),d=n.n(f);function y(t){try{return document.execCommand(t)}catch(t){return!1}}var h=function(t){var e=d()(t);return y("cut"),e},v=function(t,e){var n=function(t){var e="rtl"===document.documentElement.getAttribute("dir"),n=document.createElement("textarea");n.style.fontSize="12pt",n.style.border="0",n.style.padding="0",n.style.margin="0",n.style.position="absolute",n.style[e?"right":"left"]="-9999px";var r=window.pageYOffset||document.documentElement.scrollTop;return n.style.top="".concat(r,"px"),n.setAttribute("readonly",""),n.value=t,n}(t);e.container.appendChild(n);var r=d()(n);return y("copy"),n.remove(),r},m=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{container:document.body},n="";return"string"==typeof t?n=v(t,e):t instanceof HTMLInputElement&&!["text","search","url","tel","password"].includes(null==t?void 0:t.type)?n=v(t.value,e):(n=d()(t),y("copy")),n};function w(t){return w="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},w(t)}var E=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=t.action,n=void 0===e?"copy":e,r=t.container,o=t.target,text=t.text;if("copy"!==n&&"cut"!==n)throw new Error('Invalid "action" value, use either "copy" or "cut"');if(void 0!==o){if(!o||"object"!==w(o)||1!==o.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===n&&o.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===n&&(o.hasAttribute("readonly")||o.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes')}return text?m(text,{container:r}):o?"cut"===n?h(o):m(o,{container:r}):void 0};function S(t){return S="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},S(t)}function x(t,e){for(var i=0;i<e.length;i++){var n=e[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}function k(t,p){return k=Object.setPrototypeOf||function(t,p){return t.__proto__=p,t},k(t,p)}function T(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var n,r=j(t);if(e){var o=j(this).constructor;n=Reflect.construct(r,arguments,o)}else n=r.apply(this,arguments);return C(this,n)}}function C(t,e){return!e||"object"!==S(e)&&"function"!=typeof e?function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t):e}function j(t){return j=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},j(t)}function A(t,element){var e="data-clipboard-".concat(t);if(element.hasAttribute(e))return element.getAttribute(e)}var O=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&k(t,e)}(c,t);var e,n,r,o=T(c);function c(t,e){var n;return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,c),(n=o.call(this)).resolveOptions(e),n.listenClick(t),n}return e=c,n=[{key:"resolveOptions",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action="function"==typeof t.action?t.action:this.defaultAction,this.target="function"==typeof t.target?t.target:this.defaultTarget,this.text="function"==typeof t.text?t.text:this.defaultText,this.container="object"===S(t.container)?t.container:document.body}},{key:"listenClick",value:function(t){var e=this;this.listener=l()(t,"click",(function(t){return e.onClick(t)}))}},{key:"onClick",value:function(t){var e=t.delegateTarget||t.currentTarget,n=this.action(e)||"copy",text=E({action:n,container:this.container,target:this.target(e),text:this.text(e)});this.emit(text?"success":"error",{action:n,text:text,trigger:e,clearSelection:function(){e&&e.focus(),window.getSelection().removeAllRanges()}})}},{key:"defaultAction",value:function(t){return A("action",t)}},{key:"defaultTarget",value:function(t){var e=A("target",t);if(e)return document.querySelector(e)}},{key:"defaultText",value:function(t){return A("text",t)}},{key:"destroy",value:function(){this.listener.destroy()}}],r=[{key:"copy",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{container:document.body};return m(t,e)}},{key:"cut",value:function(t){return h(t)}},{key:"isSupported",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:["copy","cut"],e="string"==typeof t?[t]:t,n=!!document.queryCommandSupported;return e.forEach((function(t){n=n&&!!document.queryCommandSupported(t)})),n}}],n&&x(e.prototype,n),r&&x(e,r),c}(o()),_=O},828:function(t){if("undefined"!=typeof Element&&!Element.prototype.matches){var e=Element.prototype;e.matches=e.matchesSelector||e.mozMatchesSelector||e.msMatchesSelector||e.oMatchesSelector||e.webkitMatchesSelector}t.exports=function(element,t){for(;element&&9!==element.nodeType;){if("function"==typeof element.matches&&element.matches(t))return element;element=element.parentNode}}},438:function(t,e,n){var r=n(828);function o(element,t,e,n,r){var o=c.apply(this,arguments);return element.addEventListener(e,o,r),{destroy:function(){element.removeEventListener(e,o,r)}}}function c(element,t,e,n){return function(e){e.delegateTarget=r(e.target,t),e.delegateTarget&&n.call(element,e)}}t.exports=function(t,e,n,r,c){return"function"==typeof t.addEventListener?o.apply(null,arguments):"function"==typeof n?o.bind(null,document).apply(null,arguments):("string"==typeof t&&(t=document.querySelectorAll(t)),Array.prototype.map.call(t,(function(element){return o(element,e,n,r,c)})))}},879:function(t,e){e.node=function(t){return void 0!==t&&t instanceof HTMLElement&&1===t.nodeType},e.nodeList=function(t){var n=Object.prototype.toString.call(t);return void 0!==t&&("[object NodeList]"===n||"[object HTMLCollection]"===n)&&"length"in t&&(0===t.length||e.node(t[0]))},e.string=function(t){return"string"==typeof t||t instanceof String},e.fn=function(t){return"[object Function]"===Object.prototype.toString.call(t)}},370:function(t,e,n){var r=n(879),o=n(438);t.exports=function(t,e,n){if(!t&&!e&&!n)throw new Error("Missing required arguments");if(!r.string(e))throw new TypeError("Second argument must be a String");if(!r.fn(n))throw new TypeError("Third argument must be a Function");if(r.node(t))return function(t,e,n){return t.addEventListener(e,n),{destroy:function(){t.removeEventListener(e,n)}}}(t,e,n);if(r.nodeList(t))return function(t,e,n){return Array.prototype.forEach.call(t,(function(t){t.addEventListener(e,n)})),{destroy:function(){Array.prototype.forEach.call(t,(function(t){t.removeEventListener(e,n)}))}}}(t,e,n);if(r.string(t))return function(t,e,n){return o(document.body,t,e,n)}(t,e,n);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}},817:function(t){t.exports=function(element){var t;if("SELECT"===element.nodeName)element.focus(),t=element.value;else if("INPUT"===element.nodeName||"TEXTAREA"===element.nodeName){var e=element.hasAttribute("readonly");e||element.setAttribute("readonly",""),element.select(),element.setSelectionRange(0,element.value.length),e||element.removeAttribute("readonly"),t=element.value}else{element.hasAttribute("contenteditable")&&element.focus();var n=window.getSelection(),r=document.createRange();r.selectNodeContents(element),n.removeAllRanges(),n.addRange(r),t=n.toString()}return t}},279:function(t){function e(){}e.prototype={on:function(t,e,n){var r=this.e||(this.e={});return(r[t]||(r[t]=[])).push({fn:e,ctx:n}),this},once:function(t,e,n){var r=this;function o(){r.off(t,o),e.apply(n,arguments)}return o._=e,this.on(t,o,n)},emit:function(t){for(var data=[].slice.call(arguments,1),e=((this.e||(this.e={}))[t]||[]).slice(),i=0,n=e.length;i<n;i++)e[i].fn.apply(e[i].ctx,data);return this},off:function(t,e){var n=this.e||(this.e={}),r=n[t],o=[];if(r&&e)for(var i=0,c=r.length;i<c;i++)r[i].fn!==e&&r[i].fn._!==e&&o.push(r[i]);return o.length?n[t]=o:delete n[t],this}},t.exports=e,t.exports.TinyEmitter=e}},e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={exports:{}};return t[r](o,o.exports,n),o.exports}return n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,{a:e}),e},n.d=function(t,e){for(var r in e)n.o(e,r)&&!n.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:e[r]})},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n(686)}().default},t.exports=r()},273:function(t,e,n){"use strict";n.r(e);var r=n(251),o=n.n(r),c={data:function(){return{state:"init"}},mounted:function(){var t=this;new o.a(this.$refs.copy,{target:function(t){return t.previousElementSibling}}).on("success",(function(e){e.clearSelection(),t.state="copied",window.setTimeout((function(){t.state="init"}),2e3)}))}},l=n(2),component=Object(l.a)(c,(function(){var t=this._self._c;return t("button",{ref:"copy",staticClass:"copy"},["copied"===this.state?t("IconClipboardCheck",{staticClass:"w-5 h-5"}):t("IconClipboardCopy",{staticClass:"w-5 h-5"})],1)}),[],!1,null,null,null);e.default=component.exports;installComponents(component,{IconClipboardCheck:n(248).default,IconClipboardCopy:n(249).default})}}]);