<template>
  <div class="container" style="margin-top: 40px">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12 img-c">
            <div class="img-container">
              <!-- Carousel -->
              <image-carousel
                v-if="mobile && hasImages"
                :images="gemeinde.bilder"
                :gemeindeName="gemeinde.name"
              ></image-carousel>
              <!-- Switcher -->
              <image-switcher
                v-if="mobile == false && hasImages"
                :images="gemeinde.bilder"
                :gemeindeName="gemeinde.name"
              ></image-switcher>
            </div>
          </div>

          <div class="col-12">
            <div id="card" class="card">
              <div class="card-body">
                <h1>{{ gemeinde.name }}</h1>
                <p v-if="truncatedText">{{ truncatedText }}</p>
              </div>
            </div>
          </div>

          <div class="mt-3 col-lg-5 col-12">
            <div
              class="card d-flex justify-content-center flex-column align-items-center"
              style="height: 100%"
            >
              <div class="row d-flex align-middle align-items-center">
                <div
                  class="col-12 d-flex flex-column align-items-center align-middle justify-content-center"
                >
                  <div>
                    <h2>Gemeindeamt-Info:</h2>

                    <h4 class="mb-0 text-decoration-underline">
                      Adresse des Gemeindeamtes {{ gemeinde.name }}
                    </h4>
                    <div class="mb-4" v-html="gemeinde.adresse"></div>

                    <h4 class="mb-0 text-decoration-underline">
                      Öffnungszeiten des Gemeindeamtes {{ gemeinde.name }}
                    </h4>
                    <div class="mb-4">
                      Mo: 7:00 Uhr - 16:00 Uhr<br />
                      Di: 7:00 Uhr - 16:00 Uhr<br />
                      Mi: 7:00 Uhr - 16:00 Uhr<br />
                      Do: 7:00 Uhr - 16:00 Uhr<br />
                      Fr: 7:00 Uhr - 16:00 Uhr<br />
                      Sa: 10:00 Uhr - 13:00 Uhr<br />
                      So: Geschlossen<br />
                    </div>
                    <h4 class="mb-0 text-decoration-underline">
                      Kontaktinformationen:
                    </h4>
                    E-Mail: {{ gemeinde.email }}<br />
                    Telefon: {{ gemeinde.telefon }}
                  </div>
                </div>

                
              </div>
              <div class="col-12">
              <div
              class="card d-flex justify-content-center flex-column align-items-center"
              style="height: 100%"
            ></div>
          </div>

            </div>
          </div>

          <div class="col-lg-7 col-12 mt-3">
            <map-view
              v-if="gemeinde.location"
              :name="gemeinde.name"
              :position="[
                Number(gemeinde.location['lat']),
                Number(gemeinde.location['lon']),
              ]"
            />
          </div>

          <div class="col-12 mt-3 pt-2 mt-5">
            <h2 class="text-center mb-4">
              Wissenswertes über die Gemeinde
              <span style="color: #f1c40f">{{ gemeinde.name }}</span>
            </h2>

            <div class="row row-cols-2 row-cols-sm-3 row-cols-xl-4 g-3">
              <div
                class="col mb-3 d-flex flex-column align-items-center justify-content-center"
                v-for="d in data"
                :key="d.name"
              >
                <h5 class="mb-1">{{ d.name }}</h5>
                <p><i :class="d.icon"></i> {{ gemeinde.facts[d.data] }}</p>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MapView from "./MapView.vue";
import ImageSwitcher from "./ImageSwitcher.vue";
import ImageCarousel from "./ImageCarousel.vue";

export default {
  name: "GemeindeDetail",
  components: {
    MapView,
    ImageSwitcher,
    ImageCarousel,
  },
  props: {
    gemeinde: {
      type: Object,
      required: true,
    },
  },

  data() {
    return {
      mobile: false,
      truncatedText: "",
      data: [
        {
          name: "Bürgermeister:",
          icon: "bi bi-person-vcard",
          data: "buergermeister",
        },
        {
          name: "Einwohner:",
          icon: "bi bi-people",
          data: "einwohner",
        },
        {
          name: "Fläche:",
          icon: "bi bi-geo-alt",
          data: "flaeche",
        },
        {
          name: "Kennziffer:",
          icon: "bi bi-people",
          data: "kennziffer",
        },
        {
          name: "PLZ:",
          icon: "bi bi-people",
          data: "plz",
        },
        {
          name: "Bezirk:",
          icon: "bi bi-people",
          data: "bezirk",
        },
        {
          name: "Bundesland:",
          icon: "bi bi-people",
          data: "bundesland",
        },
        {
          name: "Art:",
          icon: "bi bi-people",
          data: "type",
        },
      ],
    };
  },
  mounted() {
    this.checkWindowSize();
    window.addEventListener("resize", this.checkWindowSize);
  },
  beforeUnmount() {
    window.removeEventListener("resize", this.checkWindowSize);
  },

  watch: {
    gemeinde(newText) {
      this.updateTruncatedText(newText.beschreibung);
    },
  },
  created() {
    if (this.gemeinde.beschreibung) {
      this.updateTruncatedText(this.gemeinde.beschreibung);
    }
  },
  computed: {
    hasImages() {
      return this.gemeinde.bilder && this.gemeinde.bilder.length > 0;
    },
  },
  methods: {
    checkWindowSize() {
      this.mobile = window.innerWidth < 768;
    },
    updateTruncatedText(input) {
      const length = 120;
      if (input.length > length) {
        let substring = input.substring(length);
        let periodIndex = substring.indexOf(".");

        if (periodIndex !== -1) {
          input = input.substring(0, length + periodIndex + 1);
        } else {
          input = input.substring(0, length);
        }
      }

      this.truncatedText = input;
    },
  },
};
</script>

<style scoped>
.img-container {
  width: 100%;
  /*aspect-ratio: 1.5/1;
  display: flex;*/
  /* flex-wrap: wrap;*/
}

.card {
  border-radius: 18px;
}

#card {
  margin-top: 20px;
}

.img-c {
  /*height: 600px;*/
  width: 100%;
}

.custom-card {
  padding: 0.8rem 0.8rem 0.6rem 0.8rem;
  border-radius: 18px;
  box-shadow: 0 5px 10px #d4d4d4;
  border: none;
  background: rgba(255, 250, 250, 0.45);
}

img {
  border-radius: 8px;
}
</style>
