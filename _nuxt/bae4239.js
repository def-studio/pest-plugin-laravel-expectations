(window.webpackJsonp=window.webpackJsonp||[]).push([[4,18],{236:function(t,e,n){"use strict";n.r(e);var r=n(2),component=Object(r.a)({},(function(){var t=this._self._c;return t("svg",{attrs:{fill:"none","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",viewBox:"0 0 24 24",stroke:"currentColor"}},[t("path",{attrs:{d:"M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"}})])}),[],!1,null,null,null);e.default=component.exports},239:function(t,e,n){"use strict";n(240)("link",(function(t){return function(e){return t(this,"a","href",e)}}))},240:function(t,e,n){var r=n(7),o=n(17),c=n(44),l=/"/g,f=function(t,e,n,r){var o=String(c(t)),f="<"+e;return""!==n&&(f+=" "+n+'="'+String(r).replace(l,"&quot;")+'"'),f+">"+o+"</"+e+">"};t.exports=function(t,e){var n={};n[t]=e(f),r(r.P+r.F*o((function(){var e=""[t]('"');return e!==e.toLowerCase()||e.split('"').length>3})),"String",n)}},246:function(t,e,n){"use strict";n.r(e);n(239),n(12),n(6),n(19),n(20);var r=n(4),o=(n(11),n(22));function c(object,t){var e=Object.keys(object);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(object);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(object,t).enumerable}))),e.push.apply(e,n)}return e}function l(t){for(var i=1;i<arguments.length;i++){var source=null!=arguments[i]?arguments[i]:{};i%2?c(Object(source),!0).forEach((function(e){Object(r.a)(t,e,source[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(source)):c(Object(source)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(source,e))}))}return t}var f={props:{document:{type:Object,required:!0}},computed:l(l({},Object(o.b)(["settings","githubUrls"])),{},{link:function(){if(this.settings.github)return[this.githubUrls.repo,"edit",this.settings.defaultBranch,this.settings.defaultDir,"content".concat(this.document.path).concat(this.document.extension)].filter((function(path){return!!path})).join("/")}})},d=n(2),component=Object(d.a)(f,(function(){var t=this,e=t._self._c;return t.link?e("div",{staticClass:"pt-4 pb-4 lg:px-8 flex flex-col sm:flex-row justify-between"},[e("a",{staticClass:"text-gray-600 dark:text-gray-400 text-sm font-medium hover:underline flex items-center",attrs:{href:t.link,target:"_blank",rel:"noopener"}},[t._v("\n    "+t._s(t.$t("article.github"))+"\n    "),e("IconExternalLink",{staticClass:"w-4 h-4 ml-1"})],1),t._v(" "),e("span",{staticClass:"text-gray-600 dark:text-gray-400 text-sm font-medium flex items-center"},[t._v("\n    "+t._s(t.$t("article.updatedAt"))+" "+t._s(t.$d(Date.parse(t.document.updatedAt),"long"))+"\n  ")])]):t._e()}),[],!1,null,null,null);e.default=component.exports;installComponents(component,{IconExternalLink:n(236).default})}}]);