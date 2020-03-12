

const $ = require('jquery');
global.$ = global.jQuery = $;

// import Vue from 'vue/dist/vue.js';
// window.Vue = Vue;

require('bootstrap');
const jQueryBridget = require('jquery-bridget');
const Isotope = require('isotope-layout');
jQueryBridget( 'isotope', Isotope, $ );
const SmoothScroll = require('smooth-scroll');
window.SmoothScroll = SmoothScroll;

// import '../sass/theme.scss';