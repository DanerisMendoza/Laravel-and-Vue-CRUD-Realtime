<template>
    <NavBarCom/>
    <RegistrationComp/>
</template>
  
  <script>
  import 'bootstrap/dist/css/bootstrap.css';
  import 'bootstrap';


  import NavBarCom from '../components/NavBarCom.vue';
  import RegistrationComp from '../components/RegistrationComp.vue';

  export default {
    name: 'App',
    components: {RegistrationComp,NavBarCom},

  }
  </script>
  
  <style>
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
  </style>
  