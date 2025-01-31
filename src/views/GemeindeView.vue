<template>
  <!-- <h1>Gemeinden im Burgenland</h1>
        <h2>{{ gemeindeName }}</h2>-->
        <div v-if="gemeinde.facts">
  <Head>
    <title>{{ gemeinde.name }}</title>
    <meta name="description" :content="'test'" />
  </Head>
  <teleport to="head">
    <component :is="'script'" type="application/ld+json">
      {
    "@context": "https://schema.org",
    "@type": "GovernmentOffice",
    "name": "Gemeindeamt {{gemeinde.name}}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Musterstraße 1",
      "addressLocality": "Musterstadt",
      "postalCode": "{{gemeinde.facts.plz}}",
      "addressCountry": "AT"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+49-123-456789",
      "email": "info@gemeindeamt-musterstadt.de",
      "contactType": "customer service"
    }
  }
    </component>
  </teleport>
  <GemeindeDetail v-if="gemeinde" :gemeinde="gemeinde" />
  <!-- :gemeindeBild="gemeinde.gemeinde_bilder[0]"  :bürgermeisterKontakt="gemeinde.buergermeister.kontakt" -->
</div>
<div v-else>
  Erorr 404
</div>
</template>

<script>
import { Head } from "@vueuse/head";
import GemeindeDetail from "@/components/GemeindeInfo.vue";

export default {
  name: "GemeindenListe",
  components: {
    GemeindeDetail,
    Head,
  },
  props: ["gemeindeName"],
  data() {
    return {
      gemeinde: {
        facts: {},
      },
      gemeinden: [],
    };
  },
  created() {
    this.$axios
      .post(
        "gemeinden.php",
        this.$qs.stringify({
          get_gemeinden: "get_gemeinden",
          gemeinde: this.$route.params.gemeindeName,
        })
      )
      .then((res) => {

        if(res.data.error){
          this.$router.push("/404-not-found")
        }

        this.gemeinde = res.data;
      });
  },
};
</script>
