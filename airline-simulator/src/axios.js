import axios from 'axios';

const instance = axios.create({
  baseURL: 'https://alex.polan.sk/airline-simulator/',
  timeout: 10000,
  headers: { 'Content-Type': 'application/json' }
});

export default instance;