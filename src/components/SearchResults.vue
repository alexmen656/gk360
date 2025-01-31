<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
      <GemeindeCard
        v-for="result in html_results"
        :key="result.name"
        :gemeinde="result"
      /><!--        v-if="result.type == 'gemeinde'"
-->
    </div>
  </div>
</template>
<script>
import GemeindeCard from "@/components/GemeindeCard.vue";
import axios from "axios";
import qs from "qs";
//import { store } from "@/store";
export default {
  name: "SearchResults",
  props: {
    results: {
      type: Array,
      required: true,
    },
  },
  components: {
    GemeindeCard,
  },
  data() {
    return {
      html_results: [],
      gemeinden: [],
    };
  },
  created() {
    this.$watch(
      () => this.results,
      async () => {
        if (!this.gemeinden[1]) {
          await this.fetchGemeinden();
        }

        console.log(this.gemeinden);
        console.log(this.results);
        this.html_results = [];
        this.results.forEach((result) => {
          if (result.ref.startsWith("gemeinde")) {
            this.gemeinden.forEach((gemeinde) => {
              if (gemeinde.id == result.ref.replace("gemeinde_", "")) {
                this.html_results.push(gemeinde);
              }
            });
          }

          /*  if (result.ref.startsWith("bezirk")) {
        console.log(result.ref);
      }

      if (result.ref.startsWith("bundesland")) {
        console.log(result.ref);
      }

      if (result.ref.startsWith("burgermeister")) {
        console.log(result.ref);
      }*/
        });
        console.log(this.html_results);
      }
    );
  },
  methods: {
    async fetchGemeinden() {
      await axios
        .post(
          "https://alex.polan.sk/api/gemeinde-kompass-360/gemeinden.php",
          qs.stringify({ get_gemeinden: "get_gemeinden", all: "all" })
        )
        .then((response) => {
          this.gemeinden = response.data;
        })
        .catch((error) => {
          console.error("Fehler beim Abrufen der Gemeinden:", error);
        });
    },
  },
};
</script>
