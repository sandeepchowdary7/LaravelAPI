/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';
import  VueProgressBar from 'vue-progressbar';
import  swal from 'sweetalert2';
Vue.component('pagination', require('laravel-vue-pagination'));
import Vue from 'vue'
import Vuex from 'vuex'
import BootstrapVue from 'bootstrap-vue'
import { store } from './store'
import * as VueGoogleMaps from 'vue2-google-maps'


Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyD7VH07-vnBS9AuwNQFsYYBOFb63aPGGio',
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)

    //// If you want to set the version, you can do so:
    // v: '3.26',
  },

  //// If you intend to programmatically custom event listener code
  //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
  //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
  //// you might need to turn this on.
  // autobindAllEvents: false,

  //// If you want to manually install components, e.g.
  //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
  //// Vue.component('GmapMarker', GmapMarker)
  //// then disable the following:
  // installComponents: true,
})

Vue.use(Vuex)
Vue.use(BootstrapVue)
Vue.prototype.$eventBus = new Vue() // add this line of code

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
  }
  Vue.use(VueProgressBar, options);
   
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
window.toast = toast;

let Fire = new Vue();
window.Fire = Fire;

window.swal = swal;
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


import VueRouter from 'vue-router';
Vue.use(VueRouter);

let routes = [
    { path: '/',  component: require('./components/HomeComponent.vue').default },
    { path: '/city',  component: require('./components/CityComponent.vue').default },
    { path: '/example', component: require('./components/ExampleComponent.vue').default },
];

const router = new VueRouter({
    routes,
    mode: 'history'
})

Vue.filter('capitalize', function(text) {
    return text[0].toUpperCase() + text.slice(1);
});

Vue.filter('capitals', function(text) {
    return text.toUpperCase()+ text.slice(1);
});

Vue.filter('myDate', function(created){
    return moment(created).format('YYYY');
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store:store,
    router
});