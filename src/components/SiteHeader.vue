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
              {{ $t("federal_states.federal_states") }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="/bundesland/burgenland">{{
                  $t("federal_states.burgenland")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/kärnten">{{
                  $t("federal_states.carinthia")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/niederösterreich">{{
                  $t("federal_states.lower_austria")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/oberösterreich">{{
                  $t("federal_states.upper_austria")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/salzburg">{{
                  $t("federal_states.salzburg")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/steiermark">{{
                  $t("federal_states.styria")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/tirol">{{
                  $t("federal_states.tyrol")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/vorarlberg">{{
                  $t("federal_states.vorarlberg")
                }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="/bundesland/wien">{{
                  $t("federal_states.vienna")
                }}</a>
              </li>
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
              {{ currentLanguage }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a
                  class="dropdown-item"
                  href="#"
                  @click.prevent="changeLanguage('de')"
                  >DE</a
                >
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="#"
                  @click.prevent="changeLanguage('en')"
                  >EN</a
                >
              </li>
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
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';

export default {
  setup() {
    const { locale } = useI18n();
    const currentLanguage = computed(() => locale.value.toUpperCase());

    const changeLanguage = (lang) => {
      locale.value = lang;
    };

    return {
      currentLanguage,
      changeLanguage,
    };
  },
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
