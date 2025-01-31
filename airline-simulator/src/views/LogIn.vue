<template>
  <div class="container mt-4">
    <h1>{{ $t('logIn') }}</h1>
    <form @submit.prevent="logIn">
      <div class="mb-3">
        <label for="username" class="form-label">{{ $t('username') }}</label>
        <input type="text" class="form-control" id="username" v-model="username" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">{{ $t('password') }}</label>
        <input type="password" class="form-control" id="password" v-model="password" required />
      </div>
      <button type="submit" class="btn btn-primary">{{ $t('logInButton') }}</button>
    </form>
    <div v-if="errorMessage" class="alert alert-danger mt-3">{{ errorMessage }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
      errorMessage: ''
    };
  },
  methods: {
    logIn() {
      const storedUsername = localStorage.getItem('username');
      const storedPassword = localStorage.getItem('password');
      if (this.username === storedUsername && this.password === storedPassword) {
        alert('Log-in successful!');
        // Redirect to home or another page
        this.$router.push('/home');
      } else {
        this.errorMessage = 'Invalid username or password';
      }
    }
  }
};
</script>

<style scoped>
.container {
  margin-top: 20px;
}
</style>