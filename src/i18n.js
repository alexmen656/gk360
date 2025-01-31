import { createI18n } from "vue-i18n";

const messages = {
  en: {
    title: "Welcome to GemeindeKompass360",
    description:
      "Discover the municipalities in whole Austria and get important information about locations, municipal offices, and opening hours.",
    card1: "Vienna - Austria",
    card2: "Municipality in Austria",
    get_more_info: "Learn more",
    search: "Search",
    search2: "Searching",
    heading2: "Explore Municipalities in whole",
    austria: "Austria",
    federal_states: {
      federal_states: "Federal States",
      burgenland: "Burgenland",
      carinthia: "Carinthia",
      lower_austria: "Lower Austria",
      upper_austria: "Upper Austria",
      salzburg: "Salzburg",
      styria: "Styria",
      tyrol: "Tyrol",
      vorarlberg: "Vorarlberg",
      vienna: "Vienna",
    },
  },
  de: {
    title: "Willkommen beim GemeindeKompass360",
    description:
      "Entdecke die Gemeinden in ganz Österreich und erhalte wichtige Informationen über Standorte, Gemeindeämter und Öffnungszeiten.",
    card1: "Wien - Österreich",
    card2: "Gemeinde in Österreich",
    get_more_info: "Mehr erfahren",
    search: "Suche",
    search2: "Suchen",
    heading2: "Entdecke Gemeinden im ganzen",
    austria: "Österreich",
    federal_states: {
      federal_states: "Bundesländer",
      burgenland: "Burgenland",
      carinthia: "Kärnten",
      lower_austria: "Niederösterreich",
      upper_austria: "Oberösterreich",
      salzburg: "Salzburg",
      styria: "Steiermark",
      tyrol: "Tirol",
      vorarlberg: "Vorarlberg",
      vienna: "Wien",
    },
  },
};

const i18n = createI18n({
  legacy: false,
  locale: "en",
  messages,
});

export default i18n;
