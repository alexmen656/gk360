import { createI18n } from "vue-i18n";

const messages = {
  de: {
    title: "Willkommen beim GemeindeKompass360",
    description:
      "Entdecke die Gemeinden in Burgenland und erhalte wichtige Informationen über Standorte, Gemeindeämter und Öffnungszeiten.",
    card1: "Wien - Österreich",
    card2: "Gemeinde in Österreich",
    get_more_info: "Mehr erfahren",
    search: "Suche",
    search2: "Suchen",
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
