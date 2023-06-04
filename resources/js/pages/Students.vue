<template>
    <studentsTableComp/>
</template>


<script>
 import Navbar from '../components/Navbar.vue';
 import studentsTableComp from '../components/studentsTableComp.vue';
 export default {
    name: 'App',
    components: { Navbar,studentsTableComp},

  }
</script>