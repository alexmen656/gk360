import { createApp } from "vue";
import "bootstrap/dist/css/bootstrap.css";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import VueLazyload from "vue3-lazyload";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserGroup } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/js/bootstrap.js";
import { createHead } from "@vueuse/head";
import axios from "axios";
import i18n from "./i18n";
import qs from "qs";

library.add(faUserGroup);
axios.defaults.baseURL = "https://www.gk360.at/api/gemeinde-kompass-360/";

const loadimage = require("./assets/no-image.jpg");
const errorimage = require("./assets/no-image.jpg");
const head = createHead();

const app = createApp(App)
  .use(store)
  .use(head)
  .use(VueLazyload, {
    preLoad: 0.3,
    error: errorimage,
    loading: loadimage,
    attempt: 1,
  })
  .use(router)
  .component("font-awesome-icon", FontAwesomeIcon);

app.config.globalProperties.$axios = axios;
app.config.globalProperties.$qs = qs;
app.use(i18n);
app.mount("#app");
