<template>
  <div class="container">
    <h1>{{ $t('createAirline') }}</h1>
    <form @submit.prevent="createAirline">
      <div class="mb-3">
        <label for="name" class="form-label">{{ $t('airlineName') }}</label>
        <input type="text" class="form-control" id="name" v-model="airline.name" required />
      </div>
      <div class="mb-3">
        <label for="city" class="form-label">{{ $t('hometown') }}</label>
        <input type="text" class="form-control" id="city" v-model="airline.city" @input="filterCities" required />
        <ul v-if="filteredCities.length" class="list-group">
          <li v-for="city in filteredCities" :key="city" class="list-group-item" @click="selectCity(city)">
            {{ city }}
          </li>
        </ul>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">{{ $t('airlineCode') }}</label>
        <input type="text" class="form-control" id="code" v-model="airline.code" required />
      </div>
      <div class="mb-3">
        <label for="aircraft" class="form-label">{{ $t('aircraftType') }}</label>
        <select class="form-select" id="aircraft" v-model="airline.aircraft" required>
          <option value="">{{ $t('selectAircraftType') }}</option>
          <option value="Boeing 777">{{ $t('boeing777') }}</option>
          <option value="Airbus A320">{{ $t('airbusA320') }}</option>
          <option value="Boeing 737">{{ $t('boeing737') }}</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">{{ $t('createAirlineButton') }}</button>
    </form>

    <div v-if="airlineCreated" class="alert alert-success mt-4">
      <strong>{{ $t('successMessage', { airline: { name: airline.name } }) }}</strong>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      airline: {
        name: '',
        city: '',
        code: '',
        aircraft: ''
      },
      airlineCreated: false,
      airports: [],
      filteredCities: []
    };
  },
  created() {
    this.loadAirports();
  },
  methods: {
    async loadAirports() {
      try {
        const response = await this.$axios.get('/data/airports.php');
        this.airports = response.data;
      } catch (error) {
        console.error('Error loading airports:', error);
      }
    },
    filterCities() {
      const query = this.airline.city.toLowerCase();
      this.filteredCities = this.airports
        .filter(airport => 
          airport.city.toLowerCase().includes(query) || 
          airport.code.toLowerCase().includes(query)
        )
        .map(airport => `${airport.city} (${airport.code})`);
    },
    selectCity(city) {
      this.airline.city = city;
      this.filteredCities = [];
    },
    createAirline() {
      console.log('Airline erstellt:', this.airline);
      this.airlineCreated = true;
      this.resetForm();
    },
    resetForm() {
      this.airline.name = '';
      this.airline.city = '';
      this.airline.aircraft = '';
    }
  }
};
</script>

<style scoped>
.container {
  max-width: 600px;
  margin: 0 auto;
  padding-top: 50px;
}
.list-group {
  position: absolute;
  z-index: 1000;
  width: 100%;
}
.list-group-item {
  cursor: pointer;
}
</style>