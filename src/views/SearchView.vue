<template>
  <div class="container">
    <h1>Results for Search: {{ keyword }}</h1>
    <SearchResults :results="search_results"/>
  </div>
</template>

<script>
import SearchResults from "@/components/SearchResults.vue";
import lunr from "lunr";
import lunrStemmerSupport from "lunr-languages/lunr.stemmer.support";
import lunrDe from "lunr-languages/lunr.de";
lunrStemmerSupport(lunr);
lunrDe(lunr);

export default {
  name: "SearchView",
  components: {
    SearchResults,
  },
  data() {
    return {
      searchIndex: null,
      keyword: "",
      search_results: [],
      documents: [], // Originaldokumente speichern
    };
  },
  watch: {
    '$route.query.search': function (newSearch) {
      this.keyword = newSearch;
      if (this.searchIndex) {
        this.performSearch();
      }
    }
  },
  methods: {
    performSearch() {
      this.search_results = []; // Ergebnisse zurücksetzen
      if (this.keyword) {
        const results = this.searchIndex.search(this.keyword);
        console.log(results);
        this.search_results = results;
        /*this.search_results = results.map(result => {
          return this.documents.find(doc => doc.ref === result.ref); // Originaldokumente finden
        });*/
      }
    }
  },
  created() {
    this.$axios
      .post(
        "gemeinden.php",
        this.$qs.stringify({ get_gemeinden: "get_gemeinden", get_search_index: "get_search_index" })
      )
      .then((res) => {
        this.documents = res.data; // Originaldokumente speichern
        this.searchIndex = lunr(function () {
          this.use(lunr.de);
          this.ref("ref");
          this.field("name");
          //this.field("beschreibung");
          this.field("code");
          this.field("buergermeister");

          res.data.forEach((doc) => {
            this.add(doc);
          });
        });
        this.keyword = this.$route.query.search;
        if (this.keyword) {
          this.performSearch();
        }
      });
  },
};
</script>
