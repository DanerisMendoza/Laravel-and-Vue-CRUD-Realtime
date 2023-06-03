import '../bootstrap';
import { createApp } from 'vue';
import Register from '../pages/Register.vue'

const app = createApp({});
app.component('App', Register);


app.mount('#app');
