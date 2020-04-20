/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import store from './store/store.js';

import VuePluralize from 'vue-pluralize'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);
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
Vue.component('parent-select-input', require('./components/inputs/ParentSelectInput.vue').default);
Vue.component('derived-select-input', require('./components/inputs/DerivedSelectInput.vue').default);
Vue.component('page', require('./components/page/Page.vue').default);
Vue.component('theme-manager', require('./components/themeManager/themeManager.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import EventBus from "./eventBus";
const app = new Vue({
    el: '#app',
    store,
    props: {
        currentTheme: {
          type: String
        }
    },
    created() {
      EventBus.$on('changeTheme', (data) => {
          this.currentTheme = data;
      })
    }
});

