<template>
  <Navbar/>
  <RegistrationComp/>
</template>


<script>
 import Navbar from '../components/Navbar.vue';
 import RegistrationComp from '../components/RegistrationComp.vue';
 export default {
    name: 'App',
    components: { Navbar,RegistrationComp},

  }
</script>