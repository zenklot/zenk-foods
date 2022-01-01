/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

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
    color: 'blue',
    failedColor: 'red',
    thickness: '5px'
})


// Vue Router
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/example', component: require('./components/ExampleComponent.vue').default },
]



Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const router = new VueRouter({
    mode:'history',
    routes
})


const app = new Vue({
    el: '#app',
    router
});
