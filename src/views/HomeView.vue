<template>
  <div class="container">
    <WelcomeSection />
    <section class="mt-4">
      <SearchForm @search="search" />
      <div class="row g-2 mb-5 mt-2">
        <div
          class="col-12 col-md-6 col-lg-4"
          v-for="bundesland in bundeslaender"
          :key="bundesland.name"
        >
          <router-link
            :to="
              '/bundesland/' +
              bundesland.name
                .toLowerCase()
                .replace('ö', 'oe')
                .replace('ä', 'ae')
            "
          >
            <div class="card">
              <div
                class="card-body d-flex justify-content-between align-items-center"
              >
                <h5 class="card-title">
                  <img
                    class="wappen me-2"
                    :src="
                      'https://alex.polan.sk/api/gemeinde-kompass-360/bundeslaender/wappen/' +
                      bundesland.name
                        .toLowerCase()
                        .replace('ö', 'oe')
                        .replace('ä', 'ae') +
                      '.jpg'
                    "
                    alt="Wappen von {{ bundesland.name }}"
                  />
                  {{ bundesland.name }}
                </h5>
                <i class="fa-solid fa-chevron-right"></i>
              </div>
            </div>
          </router-link>
        </div>
      </div>
      <div
        class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"
        v-if="search_results.length > 0"
      >
        <SearchResults :results="search_results" />
      </div>
      <div class="container-fluid" v-if="loaded2">
        <h2 class="mb-4">
          Entdecke Gemeinden im ganzen
          <span style="color: #f1c40f">Österreich</span>
        </h2>
        <div
          class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4"
        >
          <GemeindeCard
            v-for="gemeinde in gemeinden"
            :key="gemeinde.code"
            :gemeinde="gemeinde"
          />
        </div>
        <div class="row mt-3">
          <div class="col d-flex justify-content-center align-middle">
            <button class="button p-1">Weitere Gemeinden laden</button>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
/*mapkit.init({
    authorizationCallback: function(done) {
        fetch("https://alex.polan.sk/api/gemeinde-kompass-360/verify.php")
            .then(res => res.text())
            .then(done);
    },
    language: "es"
});

var Cupertino = new mapkit.CoordinateRegion(
            new mapkit.Coordinate(37.3316850890998, -122.030067374026),
            new mapkit.CoordinateSpan(0.167647972, 0.354985255)
        );
        var map = new mapkit.Map("map");
        map.region = Cupertino;
*/
import GemeindeCard from "@/components/GemeindeCard.vue";
import SearchResults from "@/components/SearchResults.vue";
import WelcomeSection from "@/components/WelcomeSection.vue";
//import ContactSection from "@/components/ContactSection.vue";
import SearchForm from "@/components/SearchForm.vue";
import { updateGemeinden } from "@/store";

export default {
  name: "HomePage",
  components: {
    GemeindeCard,
    SearchResults,
    WelcomeSection,
    // ContactSection,
    SearchForm,
  },
  params: ["loaded"],
  data() {
    return {
      gemeinden: [],
      keyword: "",
      search_results: [],
      loaded2: false,
      bundeslaender: [
        {
          //  "https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Burgenland_Wappen.svg/1200px-Burgenland_Wappen.svg.png",
          name: "Burgenland",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Wien_Wappen.svg/1200px-Wien_Wappen.svg.png",
          name: "Wien",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Nieder%C3%B6sterreich_CoA.svg/1200px-Nieder%C3%B6sterreich_CoA.svg.png",
          name: "Niederösterreich",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Oberoesterreich_Wappen.svg/1200px-Oberoesterreich_Wappen.svg.png",
          name: "Oberösterreich",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/3/35/Steiermark_Wappen.svg",
          name: "Steiermark",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Burgenland_Wappen.svg/1200px-Burgenland_Wappen.svg.png",
          name: "Kärnten",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Burgenland_Wappen.svg/1200px-Burgenland_Wappen.svg.png",
          name: "Salzburg",
        },
        {
          // "https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Burgenland_Wappen.svg/1200px-Burgenland_Wappen.svg.png",
          name: "Tirol",
        },
        {
          //"https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Burgenland_Wappen.svg/1200px-Burgenland_Wappen.svg.png",
          name: "Vorarlberg",
        },
      ],
    };
  },
  async created() {
    await this.$axios
      .post(
        "gemeinden.php",
        this.$qs.stringify({ get_gemeinden: "get_gemeinden" })
      )
      .then((res) => {
        updateGemeinden(res.data);
        this.gemeinden = res.data;
        if (this.gemeinden) {
          this.loaded2 = true;
        }
        this.loaded = true;
        const linkTags = document.querySelectorAll("link[disabled]");

        linkTags.forEach((link) => {
          link.removeAttribute("disabled");
        });
      })
      .catch((error) => {
        console.error("Fehler beim Abrufen der Gemeinden:", error);
      });
  },
  methods: {
    search(keyword) {
      // console.log(this.searchIndex.search(keyword));
      this.$router.push("/suche/?search=" + keyword);
    },
  },
};
</script>

<style scoped>
button {
  background-color: #f1c40f !important;
  border: none !important;
  border-radius: 5px;
  color: #000;
}

button:hover {
  background-color: #ae8e0b !important;
}

.card-title {
  margin: 0;
  padding-top: 0.25rem !important;
  padding: 0;
  font-size: 28px; /*24*/
  display: flex;
  align-items: center;
}

/*new*/
.card {
  border-radius: 14px;
}

.card-body {
  align-items: center;
}

h2 {
  text-align: center;
}

a {
  text-decoration: none;
}

.wappen {
  height: 1.2em; /* gleiche Höhe wie der Text */
  width: auto;
}
</style>
