<template>
    <h1>Home or all components</h1>
    <RegistrationComp/>
    <studentsTableComp/>
</template>


<script>
 import Navbar from '../components/Navbar.vue';
 import RegistrationComp from '../components/RegistrationComp.vue';
 import studentsTableComp from '../components/studentsTableComp.vue';

 export default {
    name: 'App',
    components: { Navbar,RegistrationComp,studentsTableComp},
  }
</script>