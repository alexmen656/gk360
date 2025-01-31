<template>
  <div class="container mt-4">
    <h1>{{ $t('signUp') }}</h1>
    <form @submit.prevent="signUp">
      <div class="mb-3">
        <label for="username" class="form-label">{{ $t('username') }}</label>
        <input type="text" class="form-control" id="username" v-model="username" required />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">{{ $t('password') }}</label>
        <input type="password" class="form-control" id="password" v-model="password" required />
      </div>
      <button type="submit" class="btn btn-primary">{{ $t('signUpButton') }}</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: ''
    };
  },
  methods: {
    signUp() {
      // Implement sign-up logic here
      console.log('Username:', this.username);
      console.log('Password:', this.password);
      // Example: Save to localStorage
      localStorage.setItem('username', this.username);
      localStorage.setItem('password', this.password);
      alert('Sign-up successful!');
    }
  }
};
</script>

<style scoped>
.container {
  margin-top: 20px;
}
</style>