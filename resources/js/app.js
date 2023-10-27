import './bootstrap';
import { createApp } from 'vue';
import VueTheMask from 'vue-the-mask'
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import RandevuComponent from './components/RandevuFormComponent.vue';
import AdminWaitingComponent from './components/AdminAppointmentWaitingComponent.vue';
import AdminCancelComponent from './components/AdminAppointmentCancelComponent.vue';
import AdminListAppointment from './components/AdminListAppointment.vue';
import AdminComponent from './components/AdminAppointmentComponent.vue';
import AdminTodayComponent from './components/AdminTodayAppointmentComponent.vue';
import AdminLastComponent from './components/AdminLastAppointmentComponent.vue';

const app = createApp({});

app.component('appointment-form', RandevuComponent);
app.component('appointment-waiting', AdminWaitingComponent);
app.component('appointment-cancel', AdminCancelComponent);
app.component('appointment-item', AdminListAppointment);
app.component('appointment-today', AdminTodayComponent);
app.component('appointment-last', AdminLastComponent);
app.component('appointment-list', AdminComponent);
app.component('pagination', Bootstrap5Pagination);
app.use(VueTheMask);
app.mount('#app');
