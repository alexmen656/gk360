<template>
  <form @submit.prevent="search" class="d-flex" role="search">
    <input
      v-model="keyword"
      class="form-control me-2 py-2"
      placeholder="Search"
      aria-label="Search"
    />
    <button class="btn" type="submit">Search</button>
  </form>
</template>
<script>
export default {
  name: "SearchForm",
  data() {
    return {
      keyword: "",
    };
  },
  methods: {
    search() {
      this.$emit("search", this.keyword);
    },
  },
};
</script>
<style scoped>
  button {
  background-color: #f1c40f !important;
  color: #000 !important;
  border: none !important;
}
button:hover {
  background-color: #ae8e0b !important;
}
</style>