<template>
  <div class="container mt-4">
    <h1>{{ $t('aircraftMarket') }}</h1>
    <div class="row">
      <div class="col-md-4" v-for="aircraft in aircraftList" :key="aircraft.id">
        <div class="card mb-4">
          <img :src="aircraft.image" class="card-img-top" :alt="aircraft.name">
          <div class="card-body">
            <h5 class="card-title">{{ aircraft.name }}</h5>
            <p class="card-text">{{ aircraft.description }}</p>
            <p class="card-text"><strong>{{ $t('price') }}:</strong> {{ formatCurrency(aircraft.price) }}</p>
            <button class="btn btn-primary" @click="buyAircraft(aircraft)">{{ $t('buy') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      aircraftList: [
        {
          id: 1,
          name: 'Boeing 777',
          description: 'A long-range wide-body twin-engine jet airliner.',
          price: 320000000,
          image: 'path/to/boeing777.jpg'
        },
        {
          id: 2,
          name: 'Airbus A320',
          description: 'A short- to medium-range narrow-body airliner.',
          price: 98000000,
          image: 'path/to/airbusa320.jpg'
        },
        {
          id: 3,
          name: 'Boeing 737',
          description: 'A short- to medium-range twinjet narrow-body airliner.',
          price: 89000000,
          image: 'path/to/boeing737.jpg'
        },
        {
          id: 4,
          name: 'Boeing 787',
          description: 'A long-haul, wide-body, twin-engine jet airliner.',
          price: 240000000,
          image: 'path/to/boeing787.jpg'
        },
        {
          id: 5,
          name: 'Airbus A380',
          description: 'A wide-body aircraft manufactured by Airbus.',
          price: 445000000,
          image: 'path/to/airbusa380.jpg'
        },
        {
          id: 6,
          name: 'Embraer E190',
          description: 'A narrow-body, medium-range, twin-engine jet airliner.',
          price: 50000000,
          image: 'path/to/embraere190.jpg'
        },
        {
          id: 7,
          name: 'Bombardier CRJ900',
          description: 'A regional jet airliner designed by Bombardier.',
          price: 47000000,
          image: 'path/to/bombardiercrj900.jpg'
        },
        {
          id: 8,
          name: 'Cessna 172',
          description: 'A single-engine, high-wing, fixed-wing aircraft.',
          price: 300000,
          image: 'path/to/cessna172.jpg'
        },
        {
          id: 9,
          name: 'Gulfstream G650',
          description: 'A twin-engine business jet aircraft.',
          price: 65000000,
          image: 'path/to/gulfstreamg650.jpg'
        },
        {
          id: 10,
          name: 'Piper PA-28',
          description: 'A family of light aircraft built by Piper Aircraft.',
          price: 275000,
          image: 'path/to/piperpa28.jpg'
        }
      ]
    };
  },
  methods: {
    buyAircraft(aircraft) {
      alert(`You have purchased the ${aircraft.name} for ${aircraft.price.toLocaleString()}!`);
      // Implement the purchase logic here
    },
    formatCurrency(value) {
      return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
    }
  }
};
</script>

<style scoped>
.container {
  margin-top: 20px;
}
.card {
  margin-bottom: 20px;
}
.card-img-top {
  height: 200px;
  object-fit: cover;
}
</style>