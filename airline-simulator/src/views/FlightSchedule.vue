<template>
    <div class="container mt-4">
      <h1>{{ $t('flightSchedule') }}</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>{{ $t('aircraftRegistration') }}</th>
            <th>{{ $t('aircraftType') }}</th>
            <th>{{ $t('numberOfSeats') }}</th>
            <th>{{ $t('currentOperation') }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="aircraft in fleet" :key="aircraft.registration">
            <td>{{ aircraft.registration }}</td>
            <td>
              <a href="#" @click.prevent="showAircraftDetails(aircraft)">{{ aircraft.type }}</a>
            </td>
            <td>{{ aircraft.seats }}</td>
            <td>{{ aircraft.operation }}</td>
          </tr>
        </tbody>
      </table>
  
      <!-- Aircraft Details Modal -->
      <div v-if="selectedAircraft" class="modal fade show" style="display: block;" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ selectedAircraft.type }} Details</h5>
              <button type="button" class="close" @click="closeModal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><strong>{{ $t('speed') }}:</strong> {{ selectedAircraft.speed }} km/h</p>
              <p><strong>{{ $t('maxRange') }}:</strong> {{ selectedAircraft.maxRange }} km</p>
              <p><strong>{{ $t('description') }}:</strong> {{ selectedAircraft.description }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="closeModal">{{ $t('close') }}</button>
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
        fleet: [
          {
            registration: 'N12345',
            type: 'Boeing 777',
            seats: 396,
            operation: 'Flight to London',
            speed: 905,
            maxRange: 15600,
            description: 'A long-range wide-body twin-engine jet airliner.'
          },
          {
            registration: 'D-ABCD',
            type: 'Airbus A320',
            seats: 180,
            operation: 'Flight to Paris',
            speed: 828,
            maxRange: 6150,
            description: 'A short- to medium-range narrow-body airliner.'
          },
          {
            registration: 'G-EZTH',
            type: 'Boeing 737',
            seats: 189,
            operation: 'Flight to New York',
            speed: 876,
            maxRange: 6570,
            description: 'A short- to medium-range twinjet narrow-body airliner.'
          }
        ],
        selectedAircraft: null
      };
    },
    methods: {
      showAircraftDetails(aircraft) {
        this.selectedAircraft = aircraft;
      },
      closeModal() {
        this.selectedAircraft = null;
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
  .modal {
    background: rgba(0, 0, 0, 0.5);
  }
  .modal-dialog {
    margin-top: 10%;
  }
  </style>