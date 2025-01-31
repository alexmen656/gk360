<template>
  <SiteHeader @search="search" />
  <router-view />
  <SiteFooter />
</template>
<script>
import SiteHeader from "@/components/SiteHeader.vue";
import SiteFooter from "@/components/SiteFooter.vue";

export default {
  components: {
    SiteHeader,
    SiteFooter,
  },
  data() {
    return {
      keyword: "",
    };
  },
  methods: {
    search(keyword) {
      this.$router.push("/suche/?search=" + keyword);
    },
  },
};
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  width: 100%;
  height: 100%;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav {
  background-color: #f1c40f;
}

:root {
  --bs-primary: #f1c40f;
  --bs-primary-rgb: 241, 196, 15;
}

html,
body {
  width: 100%;
  height: 100%;
}
</style>
