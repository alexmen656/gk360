<template>
  <footer class="footer bg-light">
    <div class="container">
      <span class="text-muted">{{ $t('currentDate') }}: {{ formattedDate }}</span>
      <span class="text-muted ms-3">{{ $t('currentTime') }}: {{ formattedTime }}</span>
      <span class="text-muted ms-3">10 Minutes = 1 Game Day</span>
    </div>
  </footer>
</template>

<script>
import GameTime from '@/gameTime.js';

export default {
  data() {
    return {
      gameTime: new GameTime('2025-01-04T00:00:00'), // Initialize with a start date
      formattedDate: '',
      formattedTime: ''
    };
  },
  mounted() {
    this.updateGameTime();
    setInterval(this.updateGameTime, 300); // Update every second
  },
  methods: {
    updateGameTime() {
      this.gameTime.updateGameTime();
      this.formattedDate = this.gameTime.getFormattedDate();
      this.formattedTime = this.gameTime.getCurrentTime();
    }
  }
};
</script>

<style scoped>
.footer {
  background-color: #f8f9fa;
  border-top: 1px solid #dee2e6;
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  padding: 10px 0;
}
.text-muted {
  color: #6c757d !important;
}
</style>