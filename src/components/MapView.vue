<template>
  <div class="map-container">
    <div id="map"></div>
  </div>
</template>

<script>
export default {
  props: {
    position: Array,
    name: String
  },
  mounted() {
    var MarkerAnnotation = window.mapkit.MarkerAnnotation;
            var work = new window.mapkit.Coordinate(this.position[0], this.position[1]);
        
    let map = new window.mapkit.Map("map");
    map._impl.zoomLevel--;

        
        var workAnnotation = new MarkerAnnotation(work);
        //workAnnotation.color = "#969696"; 
        workAnnotation.title = "Gemeinde";
        workAnnotation.subtitle = this.name;
        workAnnotation.selected = "true";
        //workAnnotation.glyphText = "📍";
        
        map.showItems([workAnnotation]);
      


  },
};
</script>

<style>
.map-container {
  border-radius: 18px;
  overflow: hidden;
}

#map {
  height: 500px;
  width: 100%;
}
</style>
