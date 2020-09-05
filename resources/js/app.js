/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Vue.config.devtools =true;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import address_component from './components/AddressComponent.vue';
import revenue_transaction from './components/RevenueTransaction.vue';
import salary_transaction from './components/SalaryTransaction.vue';
import calendar from './components/Calendar.vue';
import RoomOptions from './components/RoomOptions.vue';
import AddRoomOption from './components/AddRoomOption.vue';

const app = new Vue({
    el: '#app',
    components: {
        address_component,
        revenue_transaction,
        salary_transaction,
        calendar,
        RoomOptions,
        AddRoomOption,
    }
});
