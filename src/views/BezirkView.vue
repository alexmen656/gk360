<template>
  <div class="container-fluid">
    <!--<h2 class="mb-4">Entdecke Gemeinden im ganzen Österrreich</h2>-->
    <div
      v-if="gemeinden"
      class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3"
    >
      <GemeindeCard
        v-for="gemeinde in gemeinden"
        :key="gemeinde.code"
        :gemeinde="gemeinde"
      />
    </div>
    <div v-else>No data avaible</div>
    <!--<div class="row mt-3">
        <div class="col d-flex justify-content-center align-middle">
          <button class="button p-1">Weitere Gemeinden laden</button>
        </div>
      </div>-->
  </div>
</template>
<script>
export default {
  name: "BezirkView",
  data() {
    return {
      gemeinden: [],
    };
  },
  created() {
    this.$axios
      .post(
        "https://www.gk360.at/api/gemeinde-kompass-360/gemeinden.php",
        this.$qs.stringify({
          get_gemeinden: "get_gemeinden",
          bezirk: this.$route.params.bezirkName,
        })
      )
      .then((res) => {
        this.gemeinden = res.data;
      });
  },
};
</script>
