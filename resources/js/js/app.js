import '../bootstrap';
import { createApp } from 'vue';
import App from '../pages/App.vue'

const app = createApp({});
app.component('App', App);


app.mount('#app');
