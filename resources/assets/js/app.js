
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * Vue routes.
 */
var FrontPage = require('./components/views/FrontPage.vue');
var ContactPage = require('./components/views/ContactPage.vue');

const routes = [
    { path: '/', component: FrontPage },
    { path: '/contact', component: ContactPage },
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

Vue.component('app', require('./components/App.vue'));

const app = new Vue({
    el: '#app',
    router
});
