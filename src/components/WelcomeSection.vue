<template>
  <div class="row">
    <div class="col-md-6 col-12 pt-100">
      <h1 class="welcome text-center text-sm-start">
        {{$t('title')}}
      </h1>
      <p class="welcome-text text-center text-sm-start">
        {{$t('description')}}
      </p>
    </div>
    <div class="col-md-6 col-0 d-none d-md-block">
      <WelcomeImage />
    </div>
  </div>
</template>
<script>
import WelcomeImage from "@/components/WelcomeImage.vue";

export default {
  name: "WelcomeSection",
  components: {
    WelcomeImage,
  },
};
</script>
<style scoped>
.welcome {
  margin-bottom: 2.4rem;
  font-weight: 700;
  line-height: 1.2450000218;
  color: #333333;
  font-family: Open Sans, "Source Sans Pro";
  flex-shrink: 0;
}

.welcome-text {
  margin-left: 0.6rem;
  max-width: 50.1rem;
  font-size: 1.6rem;
  font-weight: 400;
  line-height: 1.6875;
  letter-spacing: 0.0323rem;
  color: #333333;
  font-family: Open Sans, "Source Sans Pro";
  flex-shrink: 0;
}

.pt-100 {
  padding-top: 8rem;
}
</style>
