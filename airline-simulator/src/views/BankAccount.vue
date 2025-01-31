<template>
    <div class="container mt-4">
      <h1>{{ $t('bankAccount') }}</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>{{ $t('transactionDescription') }}</th>
            <th>{{ $t('amount') }}</th>
            <th>{{ $t('date') }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="transaction in transactions" :key="transaction.id">
            <td>{{ transaction.description }}</td>
            <td :class="transaction.amount >= 0 ? 'text-success' : 'text-danger'">{{ formatCurrency(transaction.amount) }}</td>
            <td>{{ formatDate(transaction.date) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        transactions: [
          { id: 1, description: 'Catering for flight to New York', amount: -5000, date: '2023-10-01' },
          { id: 2, description: 'Maintenance of N12345', amount: -20000, date: '2023-10-02' },
          { id: 3, description: 'Income from flight to New York', amount: 15000, date: '2023-10-03' }
        ]
      };
    },
    methods: {
      formatCurrency(value) {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
      },
      formatDate(date) {
        return new Date(date).toLocaleDateString();
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    margin-top: 20px;
  }
  .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
  }
  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }
  .text-success {
    color: green !important;
  }
  .text-danger {
    color: red !important;
  }
  </style>