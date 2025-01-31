// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import AirlineView from '../views/AirlineView.vue';
import CreateAirline from '../views/CreateAirline.vue';
import AircraftMarket from '@/views/AircraftMarket.vue';
import FlightSchedule from '@/views/FlightSchedule.vue';
import HomeView from '@/views/HomeView.vue';
import BankAccount from '@/views/BankAccount.vue';
import Date from '@/views/DateView.vue';

///import Home from '../views/Home.vue';

const routes = [
  /*{
    path: '/',
    name: 'Home',
    component: Home
  },*/
  {
    path: '/airline',
    name: 'AirlineView',
    component: AirlineView
  },
  {
    path: '/create-airline',
    name: 'CreateAirline',
    component: CreateAirline
  },
  {
    path: '/aircraft-market',
    name: 'AircraftMarket',
    component: AircraftMarket
  },
  {
    path: '/flight-schedule',
    name: 'FlightSchedule',
    component: FlightSchedule
  },
  {
    path: '/home',
    name: 'HomeView',
    component: HomeView
  },
  {
    path: '/bank-account',
    name: 'BankAccount',
    component: BankAccount
  },
  {
    path: '/date',
    name: 'DateView',
    component: Date
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
