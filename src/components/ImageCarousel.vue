<template>
  {{ images[0].url + "dfdfg" }}
  <div id="carouselExample" class="carousel slide d-block d-md-none">
    <div class="carousel-inner">
      <div
        v-for="(image, index) in images"
        :key="index"
        class="carousel-item"
        :class="{ active: index === 0 }"
      >
        <LazyImageLoader
          :previewSrc="
            'https://alex.polan.sk/api/gemeinde-kompass-360/thumbnails/' +
            gemeindeName.toLowerCase() +
            '_thumb1.' +
            image.previewUrl
          "
          :realSrc="image.url"
          :alt="'Bild der Gemeinde ' + gemeindeName"
        />
        <div class="carousel-attribution">
          <span v-html="image.attribution"></span>
        </div>
      </div>
    </div>
    <button
      v-if="images.length > 1"
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExample"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      v-if="images.length > 1"
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExample"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
import LazyImageLoader from "./LazyImageLoader.vue";

export default {
  name: "ImageCarousel",
  components: {
    LazyImageLoader,
  },
  props: ["images", "gemeindeName"],
};
</script>
<style scoped>
.carousel-attribution {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  color: #fff;
  text-align: center;
}

.carousel-attribution > span {
  font-size: .75rem;
}
</style>
