<template>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <router-link class="navbar-brand" to="/">GemeindeKompass360</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Bundesländer
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="/bundesland/burgenland"
                  >Burgenland</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/kärnten">Kärnten</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/niederösterreich"
                  >Niederösterreich</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/oberösterreich"
                  >Oberösterreich</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/salzburg"
                  >Salzburg</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/steiermark"
                  >Steiermark</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/tirol">Tirol</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/vorarlberg"
                  >Vorarlberg</a
                >
              </li>
              <li><a class="dropdown-item" href="/bundesland/wien">Wien</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              DE
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">DE</a></li>
              <li><a class="dropdown-item" href="#">EN</a></li>
            </ul>
          </li>
          <!--<li class="nav-item">
          <a class="nav-link" href="#about">Über uns</a>
        </li>-->
        </ul>
        <form @submit.prevent="search" class="d-flex me-2" role="search">
          <input
            v-model="keyword"
            class="form-control me-2"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-secondary" type="btn">Search</button>
        </form>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      keyword: "",
    };
  },
  methods: {
    search() {
      this.$emit("search", this.keyword);
    },
  },
};
</script>
<style scoped>
/*.navbar-brand {
  margin-left: 10px;
}*/

button {
  border: 1px solid #333333;
  color: #333333;
}

/*button:hover {
  background-color: #333333;
}*/
</style>
