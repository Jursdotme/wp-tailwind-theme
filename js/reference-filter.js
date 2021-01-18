/**
 * Vue components
 */

Vue.component('filter-toggle', {
  data () {
    return {
      active: false,
      bgActiveClass: 'bg-brand-600',
      bgInactiveClass: 'bg-gray-200',
      sliderActiveClass: 'translate-x-5',
      sliderInactiveClass: 'translate-x-0'
    }
  },
  props: [
    'name'
  ]
})

/**
 * Main app
 */

var App = new Vue({
  el: "#referencevue",
  data: {
    searchQuery: '',
    cats: [
      { name: "Deponi", slug: "deponi" },
      { name: "Farligt affald", slug: "farligt-affald" },
      { name: "Forbrændingsegnet", slug: "Ingen beskrivelse	forbraendingsegnet" },
      { name: "Genanvendelse", slug: "genanvendelse" },
      { name: "Genbrug", slug: "genbrug" }
    ],
    items: [] // initialize empty array
  },
  mounted() {
    axios
      .get("http://dev.teglklinker.dk.linux14.curanetserver.dk/wp-json/reffilter/refs")
      .then((response) => (this.items = response.data));
  },
  computed: {
    filtered: function () {
      if (this.searchQuery != '') {
        return this.items.filter(fra => fra.search_terms.toLowerCase().includes(this.searchQuery.toLowerCase()))
      } else {
        return this.items;
      }
    },
    colorList: function () {
      const all = this.items.map(item => item.colors);
      let unique_terms = [];

      let merged = [].concat.apply([], all);
      const unique_ids = [...new Set(merged.map(item => item.id))];

      unique_ids.forEach(function (value) {
        unique_terms.push(merged[merged.findIndex(item => item.id === value)]);
      });

      return unique_terms;
    }
  },
  methods: {
    sublist: function (terms) {
      let splitTerms = terms.split(',');
      splitTerms = splitTerms.sort();
      if (this.searchQuery != '') {
        return splitTerms.filter(term => term.toLowerCase().includes(this.searchQuery.toLowerCase()));
      } else {
        return splitTerms;
      }

    },

  }
});
