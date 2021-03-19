require('./bootstrap');


window.Vue = require('vue');

Vue.component('index', require('./dashboard/Index.vue').default);
Vue.component('form-agendamento', require('./form/Form.vue').default);
Vue.component('table-agendamento', require('./table/Table.vue').default);

const app = new Vue({
    el: '#app',
});
