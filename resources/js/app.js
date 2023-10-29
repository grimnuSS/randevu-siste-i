import './bootstrap';
import { createApp } from 'vue';
import VueTheMask from 'vue-the-mask'
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

import RandevuComponent from './components/RandevuFormComponent.vue';

import AdminAppointment from './components/Admin/AdminComponent.vue';
import AdminListAppointment from './components/Admin/AdminListAppointment.vue';

const app = createApp({});

app.component('appointment-form', RandevuComponent);
app.component('pagination', Bootstrap5Pagination);
app.component('appointment-admin', AdminAppointment);
app.component('appointment-item', AdminListAppointment);

app.use(VueTheMask);

app.mount('#app');
