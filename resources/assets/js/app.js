
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 *
 */

require('./bootstrap');
require('admin-lte');
require('datatables.net');
require('datatables.net-bs');
require('jquery');
require('jquery-slimscroll');
require('fastclick');
require('morris.js/morris.min.js');

require('raphael/raphael.min.js');
require('jquery-sparkline/jquery.sparkline.min.js');
require('moment/min/moment.min.js');
require('bootstrap-daterangepicker/daterangepicker.js');
require('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');

require('jquery-slimscroll/jquery.slimscroll.min.js');
require('fastclick/lib/fastclick.js');
require('layui-src/dist/layui.js');
require('excellentexport/excellentexport.js');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
