
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

import VueNotifications from 'vue-notifications';
import miniToastr from 'mini-toastr';
const toastTypes = {
  success: 'success',
  error: 'error',
  info: 'info',
  warn: 'warn'
};
miniToastr.init({types: toastTypes});
function toast ({title, message, type, timeout, cb}) {
  return miniToastr[type](message, title, timeout, cb)
};
const options = {
  success: toast,
  error: toast,
  info: toast,
  warn: toast
};

Vue.use(VueNotifications, options);

import VueRouter from 'vue-router';
import ContentPlaceholder from 'vue-content-placeholder'

Vue.use(VueRouter);

/**
 * Vue routes.
 */
var FrontPage = require('./components/views/FrontPage.vue');
var ContactPage = require('./components/views/ContactPage.vue');
var BioPage = require('./components/views/BioPage.vue');
var MusicPage = require('./components/views/MusicPage.vue');
var PhotosPage = require('./components/views/PhotosPage.vue');
var ShowsPage = require('./components/views/ShowsPage.vue');
var PressPage = require('./components/views/PressPage.vue');

const routes = [
    { path: '/', component: FrontPage },
    { path: '/bio', component: BioPage },
    { path: '/shows', component: ShowsPage },
    { path: '/music', component: MusicPage },
    { path: '/photos', component: PhotosPage },
    { path: '/contact', component: ContactPage },
    { path: '/press', component: PressPage },
];

const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // VueJS instance for events.
window.Event = new Vue();

// VuejS data repository.
import store from './store/index';

Vue.component('app', require('./components/App.vue'));

const app = new Vue({
    el: '#app',
    router,
    store
});
