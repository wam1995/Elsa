!function t(s,l,i){function c(n,o){if(!l[n]){if(!s[n]){var e="function"==typeof require&&require;if(!o&&e)return e(n,!0);if(u)return u(n,!0);var r=new Error("Cannot find module '"+n+"'");throw r.code="MODULE_NOT_FOUND",r}var a=l[n]={exports:{}};s[n][0].call(a.exports,function(o){return c(s[n][1][o]||o)},a,a.exports,t,s,l,i)}return l[n].exports}for(var u="function"==typeof require&&require,o=0;o<i.length;o++)c(i[o]);return c}({1:[function(o,n,e){"use strict";var r=function(){function r(o,n){for(var e=0;e<n.length;e++){var r=n[e];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(o,r.key,r)}}return function(o,n,e){return n&&r(o.prototype,n),e&&r(o,e),o}}(),a=o("./ElsaNavbar");var t=function(){function o(){!function(o,n){if(!(o instanceof n))throw new TypeError("Cannot call a class as a function")}(this,o),new a.ElsaNavbar,this.topTop()}return r(o,[{key:"topTop",value:function(){$("#elsa-to-top").on("click",function(){var o=1e3*Math.max($("html, body").scrollTop()/($(document).height()-$(window).height()),.4);$("html, body").animate({scrollTop:0},o)})}}]),o}();$(function(){new t})},{"./ElsaNavbar":2}],2:[function(o,n,e){"use strict";Object.defineProperty(e,"__esModule",{value:!0});e.ElsaNavbar=function o(){!function(o,n){if(!(o instanceof n))throw new TypeError("Cannot call a class as a function")}(this,o),$(window).on("scroll",function(){10<$(window).scrollTop()?$("#elsa-navbar").addClass("elsa-navbar"):$("#elsa-navbar").removeClass("elsa-navbar")}),$("#elsa-navbar-toggler").on("click",function(){$("#elsa-wrapper").toggleClass("elsa-offset"),$(this).toggleClass("fa-navicon fa-close"),$("#elsa-wrapper").hasClass("elsa-offset")&&(console.log("yes"),$("html,body").scrollTop(0))}),$(".dropdown, .dropdown .dropdown-toggle").mouseover(function(){$(this).addClass("show"),$(this).children(".dropdown-menu").addClass("show")}),$(".dropdown").mouseout(function(){$(this).removeClass("show"),$(this).children(".dropdown-menu").removeClass("show")})}},{}]},{},[1]);