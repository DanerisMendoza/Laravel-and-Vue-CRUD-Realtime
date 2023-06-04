<template>
    <nav>
      <ul>
        <li @click="navigateTo('home')" :class="{ active: currentPage === 'home' }">Home</li>
        <li @click="navigateTo('registration')" :class="{ active: currentPage === 'registration' }">Registration</li>
        <li @click="navigateTo('students')" :class="{ active: currentPage === 'students' }">Students</li>
      </ul>
    </nav>
  </template>
  
  <script>
  export default {
    data() {
      return {
        currentPage: null
      };
    },
    created() {
      this.currentPage = this.$route.name;
    },
    watch: {
      $route(to) {
        this.currentPage = to.name;
      }
    },
    methods: {
      navigateTo(page) {
        this.$router.push({ name: page });
      }
    }
  };
  </script>
  
  <style scoped>
  nav {
    background-color: #f2f2f2;
  }
  
  ul {
    list-style: none;
    display: flex;
    padding: 0;
  }
  
  li {
    margin-right: 10px;
    cursor: pointer;
  }
  
  li.active {
    font-weight: bold;
  }
  </style>
  