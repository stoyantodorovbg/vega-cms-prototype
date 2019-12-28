/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';
import Vuex from 'vuex'
import VuePluralize from 'vue-pluralize'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);
Vue.use(Vuex);

let store = new Vuex.Store({
    state: {
        locale: document.getElementById('app').getAttribute('data-locale'),
    },
    mutations: {}
});

Vue.use(VuePluralize);

import helpers from './helpers.js';
const plugin = {
    install (Vue, options) {
        Vue.prototype.$helpers = helpers;
    }
};

Vue.use(plugin);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('model-index', require('./templates/admin/ModelIndex.vue').default);
Vue.component('button-link', require('./components/links/ButtonLink.vue').default);
Vue.component('dynamic-menu', require('./components/menu/DynamicMenu.vue').default);
Vue.component('json-presenter', require('./components/data/JsonPresenter.vue').default);
Vue.component('json-input', require('./components/inputs/JsonInput.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store
});

