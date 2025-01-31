<template>
  <div class="d-flex position-relative">
    <div class="image">
    <img
      v-if="images[0]"
      :src="images[currentImageIndex - 1].url"
      :alt="'Bild der Gemeinde ' + gemeindeName"
      class="d-none d-md-block"
    />
    <div
      v-if="images"
      class="attribution-bar position-absolute bottom-0 w-100 text-white text-center p-2"
      v-html="images[currentImageIndex - 1].attribution"
    ></div>
    </div>
    <div class="image-previews d-none d-md-block">
      <img
        v-for="(imageSrc, index) in images"
        :key="index"
        @click="selectImage(index + 1)"
        class="image-preview"
        :src="imageSrc.url"
        :alt="'Bild der Gemeinde ' + gemeindeName"
        :class="{ selected: index === currentImageIndex - 1 }"
      />
    </div>
    </div>
</template>

<script>
export default {
  name: "ImageSwitcher",
  props: ["images", "gemeindeName"],
  data() {
    return {
      currentImageIndex: 1,
    };
  },
  methods: {
    selectImage(index) {
      console.log(index);
      this.currentImageIndex = index;
    },
    currentImageSrc() {
      return this.gemeinde.bilder[this.currentImageIndex - 1];
    },
  },
};
</script>
<style scoped>
img:not(.image-preview) {

  height: auto;
  border-radius: 18px;
  overflow: hidden;
  object-fit: cover;
}

.image-previews {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 20%;
  padding-left: 0.5rem;
}

.image-preview {
  height: auto;
  width: 100%;
  border-radius: 0.5rem;
}

@media only screen and (max-width: 600px) {
  img:not(.image-preview) {
    width: 100%;
  }
  .image-previews {
    width: 100%;
    height: 70px;
    flex-direction: row;
  }

  .image-preview {
    width: 25%;
    height: auto;
    margin: 0 !important;
  }
}

.image-preview.selected {
  border: 10px solid #f1c40f;
}

.image-preview:not(:last-child) {
  margin-bottom: 0.5rem;
}

.image {
  aspect-ratio: 1.5 / 1;
  object-fit: cover;
  max-height: 70%;
  width: 80%;
  /*height: 600px;*/

}

.attribution-bar {
  background-color: rgba(0, 0, 0, 0.5);
  width: 100%;
  max-width: 100%;
}
</style>
