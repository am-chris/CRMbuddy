require('./bootstrap');

window.Vue = require('vue');

import 'node-snackbar/dist/snackbar.min.css';

import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(fas);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false

import ClientsModal from './components/ClientsModal.vue';
Vue.component('clients-modal', ClientsModal);

/* eslint-disable no-new */
const app = new Vue({
    el: '#app',
});
