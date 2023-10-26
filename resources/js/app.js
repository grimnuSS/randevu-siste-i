import './bootstrap';
import { createApp } from 'vue';
import VueTheMask from 'vue-the-mask'
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import RandevuComponent from './components/RandevuFormComponent.vue';
import AdminComponent from './components/AdminAppointmentComponent.vue';

const app = createApp({});

app.component('randevu-form', RandevuComponent);
app.component('AdminAppointmentComponent', AdminComponent);
app.component('pagination', Bootstrap5Pagination);
app.use(VueTheMask);
app.mount('#app');
