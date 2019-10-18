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

import DropdownMenu from './components/DropdownMenu.vue';
Vue.component('dropdown-menu', DropdownMenu);

import Modal from './components/Modal.vue';
Vue.component('modal', Modal);

import Client from './components/Client.vue';
Vue.component('client', Client);

import CButton from './components/CButton.vue';
Vue.component('cbutton', CButton);

/* eslint-disable no-new */
const app = new Vue({
    el: '#app',
});
