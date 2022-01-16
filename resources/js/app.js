/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue'
// Vue Resource
Vue.use(require('vue-resource'));

// Vue pagination
Vue.component('pagination', require('laravel-vue-pagination'));

// vue-fragment
import { Plugin } from 'vue-fragment'
Vue.use(Plugin)

// vForm
import {Form, Errors} from 'vform';
window.Form  = Form;
Vue.component(Errors.name, Errors);

// Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    timer: 3000
});
window.Toast = Toast;

// Vue ProggressBar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'yellow',
    failedColor: 'red',
    thickness: '5px'
})

// vue crypto
// var CryptoJS = require("crypto-js");
// Vue.use(CryptoJS)

// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)


let routes = [
    { path: '/example', component: require('./components/ExampleComponent.vue').default },
]



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('menu-card-product', require('./components/Main/MenuCardProduct.vue').default);
Vue.component('main-book-table', require('./components/MainBookTable.vue').default);
Vue.component('book-table', require('./components/Dashboard/BookTable.vue').default);
Vue.component('order-menu', require('./components/Dashboard/OrderMenu.vue').default);
Vue.component('cart-data', require('./components/Dashboard/Cart.vue').default);
const router = new VueRouter({
    mode:'history',
    routes
})


const app = new Vue({
    el: '#app',
    router
});
