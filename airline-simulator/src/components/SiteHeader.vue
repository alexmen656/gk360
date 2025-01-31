<template>
  <header>
    <div class="top-header py-2 bg-dark text-white">
      <div class="container d-flex justify-content-between">
        <div class="logo">
          <router-link to="/home">
            <h1 class="h4 m-0">Airline Simulator</h1>
          </router-link>
        </div>
        <div class="account-name dropdown">
          <a
            class="nav-link dropdown-toggle text-white"
            href="#"
            id="profileDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            {{ username }}
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="profileDropdown"
          >
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
          </ul>
        </div>
      </div>
    </div>
    <nav class="bottom-header py-2 bg-light border-bottom">
      <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
          <li class="nav-item">
            <a
              href="/airline"
              class="nav-link link-dark px-2 active"
              aria-current="page"
              >{{ airline }}</a
            >
          </li>
          <li class="nav-item">
            <a href="/bank-account" :class="balanceClass" class="nav-link px-2">{{
              formatCurrency(bankBalance)
            }}</a>
          </li>
          <li class="nav-item">
            <a href="flight-schedule" class="nav-link link-dark px-2"
              >Flight Schedule</a
            >
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link link-dark px-2">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="/aircraft-market" class="nav-link link-dark px-2"
              >Aircraft Market</a
            >
          </li>
        </ul>
        <ul class="nav">
          <li class="nav-item">
            <a
              href="#"
              class="nav-link link-dark px-2"
              @click="changeLanguage('de')"
              >DE</a
            >
          </li>
          <li class="nav-item">
            <a
              href="#"
              class="nav-link link-dark px-2"
              @click="changeLanguage('en')"
              >EN</a
            >
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  data() {
    return {
      bankBalance: 0,
    };
  },
  computed: {
    username() {
      return localStorage.getItem("username") || "Guest";
    },
    airline() {
      return localStorage.getItem("airline") || "Error";
    },
    balanceClass() {
      return this.bankBalance >= 0 ? "text-success" : "text-danger";
    },
  },
  methods: {
    changeLanguage(lang) {
      this.$i18n.locale = lang;
      localStorage.setItem("language", lang);
    },
    formatCurrency(value) {
      return new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
      }).format(value);
    },
    fetchBankBalance() {
      // Replace with actual API call to fetch bank balance
      this.bankBalance = 1000000; // Example balance
    },
  },
  created() {
    const savedLanguage = localStorage.getItem("language");
    if (savedLanguage) {
      this.$i18n.locale = savedLanguage;
    }
    this.fetchBankBalance();
  },
};
</script>

<style scoped>
.top-header {
  background-color: #343a40;
  color: white;
}
.bottom-header {
  background-color: #f8f9fa;
  border-bottom: 1px solid #dee2e6;
}
.logo h1 {
  font-size: 1.25rem;
  margin: 0;
}
.account-name {
  position: relative;
}
.nav-link {
  color: #343a40;
}
.nav-link.active {
  font-weight: bold;
}
.text-success {
  color: green !important;
}
.text-danger {
  color: red !important;
}

a {
  text-decoration: none;
  color: white;
}
</style>
