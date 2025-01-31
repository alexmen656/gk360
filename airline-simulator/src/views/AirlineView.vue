<template>
    <div class="container mt-4">
      <h1>{{ $t('airlineOverview') }}</h1>
  
      <h2>{{ $t('routeMap') }}</h2>
      <div id="map" class="map-container"></div>
  
      <div class="aircraft-section">
        <h2>{{ $t('ownedAircraft') }}</h2>
        <div class="row">
          <div class="col-md-4" v-for="aircraft in ownedAircraft" :key="aircraft.id">
            <div class="card mb-4">
              <img :src="aircraft.image" class="card-img-top" :alt="aircraft.name">
              <div class="card-body">
                <h5 class="card-title">{{ aircraft.name }}</h5>
                <p class="card-text">{{ aircraft.description }}</p>
                <p class="card-text"><strong>{{ $t('routes') }}:</strong></p>
                <ul>
                  <li v-for="route in aircraft.routes" :key="route.id">{{ route.origin }} - {{ route.destination }}</li>
                </ul>
              </div>
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
        ownedAircraft: [
          {
            id: 1,
            name: 'Boeing 777',
            description: 'A long-range wide-body twin-engine jet airliner.',
            image: 'path/to/boeing777.jpg',
            routes: [
              { id: 1, origin: 'New York', destination: 'London', originCoords: [40.7128, -74.0060], destinationCoords: [51.5074, -0.1278] },
              { id: 2, origin: 'Los Angeles', destination: 'Tokyo', originCoords: [34.0522, -118.2437], destinationCoords: [35.6895, 139.6917] }
            ]
          },
          {
            id: 2,
            name: 'Airbus A320',
            description: 'A short- to medium-range narrow-body airliner.',
            image: 'path/to/airbusa320.jpg',
            routes: [
              { id: 1, origin: 'Berlin', destination: 'Paris', originCoords: [52.5200, 13.4050], destinationCoords: [48.8566, 2.3522] },
              { id: 2, origin: 'Madrid', destination: 'Rome', originCoords: [40.4168, -3.7038], destinationCoords: [41.9028, 12.4964] }
            ]
          },
          {
            id: 3,
            name: 'Boeing 737',
            description: 'A short- to medium-range twinjet narrow-body airliner.',
            image: 'path/to/boeing737.jpg',
            routes: [
              { id: 1, origin: 'Chicago', destination: 'Miami', originCoords: [41.8781, -87.6298], destinationCoords: [25.7617, -80.1918] },
              { id: 2, origin: 'Dallas', destination: 'San Francisco', originCoords: [32.7767, -96.7970], destinationCoords: [37.7749, -122.4194] }
            ]
          }
        ]
      };
    },
    mounted() {
      this.initMap();
    },
    methods: {
      initMap() {

  
        const map = new window.mapkit.Map("map");
  
        this.ownedAircraft.forEach(aircraft => {
          aircraft.routes.forEach(route => {
            const origin = new window.mapkit.Coordinate(route.originCoords[0], route.originCoords[1]);
            const destination = new window.mapkit.Coordinate(route.destinationCoords[0], route.destinationCoords[1]);
  
            const polyline = new window.mapkit.PolylineOverlay([origin, destination], {
              style: new window.mapkit.Style({
                lineWidth: 2,
                strokeColor: "#007aff"
              })
            });
  
            map.addOverlay(polyline);
  
            const originAnnotation = new window.mapkit.MarkerAnnotation(origin, {
              title: route.origin,
              glyphText: "O"
            });
  
            const destinationAnnotation = new window.mapkit.MarkerAnnotation(destination, {
              title: route.destination,
              glyphText: "D"
            });
  
            map.addAnnotation(originAnnotation);
            map.addAnnotation(destinationAnnotation);
          });
        });
  
        map.setRegion(new window.mapkit.CoordinateRegion(
          new window.mapkit.Coordinate(20.0, 0.0),
          new window.mapkit.CoordinateSpan(140.0, 360.0)
        ));
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
  .map-container {
    height: 400px;
    width: 100%;
    margin-bottom: 20px;
  }
  </style>