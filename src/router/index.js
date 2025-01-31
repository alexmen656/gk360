import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import GemeindeView from "@/views/GemeindeView.vue";


const routes = [
  {
    path: "/404",
    name: "404",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/NotFound.vue"),
  },
  {
    path: "/",
    name: "home",
    component: HomeView,
    meta: {
      description:
        "Willkommen beim GemeindeKompass360 - Ihre Informationsquelle für Gemeinden im ganzem Burgenland.",
    },
  },
  {
    path: "/gemeinde",
    name: "gemeinde",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/GemeindeView.vue"),
  },
  {
    path: "/suche",
    name: "suche",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/SearchView.vue"),
  },
  {
    path: "/bezirk/:bezirkName",
    name: "BezirkView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/BezirkView.vue"),
  },
  {
    path: "/bundesland/:bundeslandName",
    name: "BundeslandView",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/BundeslandView.vue"),
  },
  {
    path: "/about",
    name: "about",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },

  {
    path: "/gemeinde/:gemeindeName",
    component: GemeindeView,
    props: true,
    meta: {
      dynamicDescription: (route) => {
        const gemeindeNameOriginal = route.params.gemeindeName.replaceAll("-", " ");
        const words = gemeindeNameOriginal.split(" ");

        for (let i = 0; i < words.length; i++) {
          words[i] = words[i][0].toUpperCase() + words[i].substr(1);
        }

        const gemeindeName = words.join(" ");
        return `Erfahren Sie mehr über ${gemeindeName} auf GemeindeKompass360 - Ihre Informationsquelle für Gemeinden im ganzem Burgenland.`;
      },
      dynamicTitle: (route) => {
        const gemeindeNameOriginal = route.params.gemeindeName.replaceAll("-", " ");
        const words = gemeindeNameOriginal.split(" ");

        for (let i = 0; i < words.length; i++) {
          words[i] = words[i][0].toUpperCase() + words[i].substr(1);
        }

        const gemeindeName = words.join(" ");
        return gemeindeName;
      },
    },
  },

  {
    path: "/:catchAll(.*)",
    name: "NotFound",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/NotFound.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior() {
    // always scroll to top
    return { top: 0 }
  },
});

/*router.beforeEach((to, from, next) => {
  document.querySelector('meta[property="og:site_name"]').setAttribute("content", "GemeindeKompass360");
  
  if (to.meta && to.meta.dynamicDescription) {
    document
      .querySelector('meta[name="description"]')
      .setAttribute("content", to.meta.dynamicDescription(to));
      document.title = to.meta.dynamicTitle(to);
  } else if (to.meta && to.meta.description) {
    document
      .querySelector('meta[name="description"]')
      .setAttribute("content", to.meta.description);
  } else {
    document
      .querySelector('meta[name="description"]')
      .setAttribute("content", "Standard-Meta-Beschreibung");
  }
  next();
});*/

export default router;
