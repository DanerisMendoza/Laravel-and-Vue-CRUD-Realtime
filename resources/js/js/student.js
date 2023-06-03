import '../bootstrap';
import { createApp } from 'vue';
import Students from '../pages/Students.vue'

const app = createApp({});
app.component('App', Students);


app.mount('#app');
