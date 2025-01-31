<template>
  <div class="col">
    <div class="card custom-card">
      <div class="aspect-ratio-wrapper">
        <img
          v-lazy="'https://www.gk360.at/api/gemeinde-kompass-360/thumbnails/'+(gemeinde.bild ? gemeinde.code+'_thumb1.'+gemeinde.bild : 'no-image.jpg')"
          :alt="'Bild der Gemeinde ' + gemeinde.name"
          class="card-img-top aspect-ratio-item"
        />
      </div>
      <div class="card-body">
        <div class="name-date d-flex justify-content-between align-items-center">
          <div class="name">{{ gemeinde.name }}</div>
          <small class="text-body-secondary d-flex align-middle">{{ new Date(gemeinde.zuletzt_bearbeitet).toLocaleDateString("de-AT") }}</small>
        </div>
        <div class="description">{{ truncatedDescription }}</div>
        <div class="btn-group mt-2">
          <router-link :to="'/gemeinde/' + gemeinde.code" class="btn custom-btn">
            Mehr Erfahren
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
export default {
  name: "GemeindeCard",
  props: {
    gemeinde: Object,
  },
  computed: {
    truncatedDescription() {
      return this.limitToCharacters(this.gemeinde.beschreibung, 50);
    },
  },
  methods: {
    limitToCharacters(text, charLimit) {
      if(text){
        if (text.length <= charLimit) {
        return text;
      } else {
        const lastSpaceIndex = text.lastIndexOf(' ', charLimit);
        return text.slice(0, lastSpaceIndex) + '...';
      }
      }
   
    },
  },
};
</script>


<style scoped>
.aspect-ratio-wrapper {
  position: relative;
  width: 100%;
  padding-top: 75%;
}

.aspect-ratio-item {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.custom-btn {
  background-color: #f1c40f !important;
  color: #000 !important;
  border: none !important;
}

.custom-btn:hover {
  background-color: #ae8e0b !important;
}

.name {
  font-size: 1.6rem;
  font-weight: 700;
  line-height: 1.3999999762;
  letter-spacing: 0.05rem;
  color: #333333;
  font-family: Lato, 'Source Sans Pro';
}

.custom-card { 
  padding: 0.8rem 0.8rem 0.6rem 0.8rem;
  border-radius: 18px;
  box-shadow: 0 5px 10px #D4D4D4;
  border: none;
  background: rgba(255, 250, 250, 0.45);
}

img {
  border-radius: 8px;
}
</style>