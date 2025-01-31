<template>
  <div class="image-container">
    <img
      v-lazy="previewSrc"
      :alt="alt"
      v-show="!isLoaded"
      class="preview-image d-block w-100 carousel-image"
    />
    <img
      :src="realSrc"
      :alt="alt"
      @load="onImageLoad"
      :class="{ loaded: isLoaded }"
      class="real-image d-block w-100 carousel-image"
    />
  </div>
</template>

<script>
export default {
  props: {
    previewSrc: {
      type: String,
      required: true,
    },
    realSrc: {
      type: String,
      required: true,
    },
    alt: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      isLoaded: false,
    };
  },
  methods: {
    onImageLoad() {
      this.isLoaded = true;
    },
  },
};
</script>

<style scoped>
.image-container {
  position: relative;
  width: 100%;
  aspect-ratio: 1.5/1;
}

.preview-image,
.real-image {
  width: 100%;
  height: auto;
  display: block;
}

.real-image {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 0.5s;
}

.real-image.loaded {
  opacity: 1;
}

.carousel-image {
  border-radius: 18px;
  aspect-ratio: 1.5 / 1;
  object-fit: cover;
}
</style>
