<template>
  <div class="container">
    <h1>
      Gemeinden in
      {{ bundesland.charAt(0).toUpperCase() + bundesland.slice(1) }}
    </h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <GemeindeCard
        v-for="gemeinde in gemeinden"
        :key="gemeinde.code"
        :gemeinde="gemeinde"
      />
    </div>
  </div>
</template>
<script>
import GemeindeCard from "@/components/GemeindeCard.vue";

export default {
  name: "BundelandView",
  components: {GemeindeCard},
  data() {
    return {
      gemeinden: [],
      bundesland: "",
    };
  },                                                                                                                                   created() {
    this.bundesland = this.$route.params.bundeslandName;
    // alert(this.bundesland);
    this.$axios
      .post(
        "https://alex.polan.sk/api/gemeinde-kompass-360/gemeinden.php",
        this.$qs.stringify({
          get_gemeinden: "get_gemeinden",
          // bezirk: this.$route.params.bezirkName,
        })
      )
      .then((res) => {
        this.gemeinden = res.data;
      });
  },
};
</script>
<style scoped>
h1 {
  margin-top: 1rem;
  margin-bottom: 2rem;
}
</style>