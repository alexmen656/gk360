<template>
    <div class="overlay">
      <img class="bg-image" src="/assets/bg.png" alt="Background" />
      <img class="overlay-image" src="/assets/person.png" alt="Person" />
  
      <div class="card custom-card card1">
        <img
          v-lazy="imageUrls[0]"
          :alt="altTexts[0]"
        />
        <div class="card-body">
          <div class="name">Hallstatt</div>
          <small class="text-body-secondary d-flex align-middle">Gemeinde in Österreich</small>
        </div>
      </div>
  
      <div class="card custom-card card2">
        <img
          v-lazy="imageUrls[1]"
          :alt="altTexts[0]"
        />
        <div class="card-body">
          <div class="name">Hallstatt</div>
          <small class="text-body-secondary d-flex align-middle">Heute</small>
        </div>
      </div>
  
      <div class="card custom-card card3 text-center">Wien - Österreich</div>
    </div>
  </template>
  
  <script>
  export default {
    name: "WelcomeImage",
    data() {
      return {
        imageUrls: [
          'https://www.gk360.at/api/gemeinde-kompass-360/thumbnails/hallstatt_thumb1.jpg',
          'https://www.gk360.at/api/gemeinde-kompass-360/thumbnails/no-image.jpg'
        ],
        altTexts: [
          'Bild der Gemeinde Coolerdorf'
        ]
      };
    }
  };
  </script>
  
  <style scoped>
  .bg-image {
    position: absolute;
    left: 6%;
    right: 6%;
    top: 6%;
    width: 88% !important;
    height: auto;
  }
  
  img {
    width: 100%;
  }
  
  .overlay {
    position: relative;
    overflow: hidden;
    width: 100%;
    aspect-ratio: 1/1;
  }
  
  .overlay-image {
    position: absolute;
    left: 15%;
    bottom: 6%;
    border-radius: 50%;
    height: 75%;
    width: 75%;
  }
  
  .card1 {
    width: 200px;
    position: absolute;
    top: 340px;
    left: 2%;
    bottom: 16%;
  }
  
  .card2 {
    width: 150px;
    position: absolute;
    top: 320px;
    right: 3%;
    bottom: 25%;
  }
  
  .card3 {
    width: 200px;
    position: absolute;
    top: 120px;
    right: 3%;
  }
  
  .custom-btn {
    background-color: #f1c40f !important;
    color: #000 !important;
    border: none !important;
  }
  
  .custom-btn:hover {
    background-color: #ae8e0b !important;
  }
  
  .name {
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.4;
    letter-spacing: 0.05rem;
    color: #333;
    font-family: Lato, "Source Sans Pro";
  }
  
  .custom-card {
    padding: 0.6rem;
    border-radius: 18px;
    box-shadow: 0 4px 8px #7f7f7f;
    border: none;
  }
  
  .card-body {
    padding: 0.1rem !important;
  }
  
  .custom-card > img {
    border-radius: 8px;
  }
  </style>
  