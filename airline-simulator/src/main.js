// Vue App
import { createApp } from 'vue'
import App from './App.vue'

// Bootstrap
//import 'bootstrap-icons/font/bootstrap-icons.css';
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";

//Axios
import axios from './axios';

// Router
import router from './router';

// i18n for Multi-Language
import i18n from './i18n';

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(router);
app.use(i18n);
app.mount('#app');