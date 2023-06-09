import Home from './pages/Home.vue';
import Registration from './pages/Registration.vue';
import Students from './pages/Students.vue';

const routes = [
  {
    path: '/',
    redirect: { name: 'home' } // Redirect to the named route
  },
  {
    path: '/home',
    name: 'home',
    component: Home
  },
  {
    path: '/registration',
    name: 'registration',
    component: Registration
  },
  {
    path: '/students',
    name: 'students',
    component: Students
  }
];

export default routes;
