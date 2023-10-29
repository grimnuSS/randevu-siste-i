import './bootstrap';
import { createApp } from 'vue';
import VueTheMask from 'vue-the-mask'
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import RandevuComponent from './components/RandevuFormComponent.vue';

import AdminAppointment from './components/Admin/AdminComponent.vue';
import AdminWaitingComponent from './components/Admin/AdminAppointmentWaitingComponent.vue';
import AdminCancelComponent from './components/Admin/AdminAppointmentCancelComponent.vue';
import AdminListAppointment from './components/Admin/AdminListAppointment.vue';
import AdminComponent from './components/Admin/AdminAppointmentComponent.vue';
import AdminTodayComponent from './components/Admin/AdminTodayAppointmentComponent.vue';
import AdminLastComponent from './components/Admin/AdminLastAppointmentComponent.vue';

const app = createApp({});

app.component('appointment-form', RandevuComponent);
app.component('pagination', Bootstrap5Pagination);

app.component('appointment-admin', AdminAppointment);
app.component('appointment-waiting', AdminWaitingComponent);
app.component('appointment-cancel', AdminCancelComponent);
app.component('appointment-item', AdminListAppointment);
app.component('appointment-today', AdminTodayComponent);
app.component('appointment-last', AdminLastComponent);
app.component('appointment-list', AdminComponent);
app.use(VueTheMask);
app.mount('#app');
