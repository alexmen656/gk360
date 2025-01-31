<template>
  <SiteHeader></SiteHeader>
  <!--<img alt="Vue logo" src="./assets/logo.png">
  <HelloWorld msg="Welcome to Your Vue.js App"/>-->
  <!---<nav>
      <router-link to="/">Home</router-link>
      <router-link to="/create-airline">Create Airline</router-link>
Sprachumschaltung
      <button @click="changeLanguage('en')">English</button>
      <button @click="changeLanguage('de')">Deutsch</button>
    </nav>-->
  <router-view></router-view>
  <DateFooter></DateFooter>
</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
import SiteHeader from './components/SiteHeader.vue'
import DateFooter from './components/DateFooter.vue';

localStorage.setItem("username", "Airbusmaster")
localStorage.setItem("airline", "Pirate Air")


export default {
  name: 'App',
  components: {
   // HelloWorld,
    SiteHeader,
    DateFooter
  },
  methods: {
    changeLanguage(language) {
      this.$i18n.locale = language;
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
