<template>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-header">
              <h5>{{ $t('breakingNews') }}</h5>
            </div>
            <div class="card-body">
              <ul>
                <li v-for="news in breakingNews" :key="news.id">{{ news.message }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-header">
              <h5>{{ $t('richestAirlines') }}</h5>
            </div>
            <div class="card-body">
              <ol>
                <li v-for="airline in richestAirlines" :key="airline.id">{{ airline.name }} - {{ formatCurrency(airline.balance) }}</li>
              </ol>
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
        breakingNews: [
          { id: 1, message: 'Airline XYZ has gone bankrupt.' },
          { id: 2, message: 'New airline ABC has been created.' }
        ],
        richestAirlines: [
          { id: 1, name: 'Airline 1', balance: 500000000 },
          { id: 2, name: 'Airline 2', balance: 450000000 },
          { id: 3, name: 'Airline 3', balance: 400000000 }
        ]
      };
    },
    methods: {
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
  .card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
  }
  .card-body {
    padding: 1rem;
  }
  </style>