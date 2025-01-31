<template>
  <div>
    <h1>Game Simulation</h1>
    <p>Current Date: {{ formattedDate }}</p>
    <p>Game Days: {{ gameDays }}</p>
    <p>Current Time: {{ gameTime2 }}</p>
  </div>
</template>

<script>
// Importiere die GameTime-Klasse
import GameTime from '@/gameTime.js';

export default {
  data() {
    return {
      gameTime: null,  // Die Instanz von GameTime
      formattedDate: '',  // Formatierte simulierte Zeit
      gameDays: 0,  // Anzahl der Spieltage
    };
  },
  created() {
    this.initializeGameTime();
  },
  methods: {
    // Initialisiere die Spielzeit
    initializeGameTime() {
      this.gameTime = new GameTime('2025-01-04T00:00:00');  // Setze das Startdatum (01.01.2025)

      // Starte die kontinuierliche Zeitaktualisierung (jede Sekunde)
      setInterval(() => {
        this.gameTime.updateGameTime();  // Berechne und update die Spielzeit
        this.formattedDate = this.gameTime.getFormattedDate();  // Formatiertes Datum
        this.gameDays = this.gameTime.getGameDays();  // Berechnete Spieltage
        this.gameTime2 =  this.gameTime.getCurrentTime();
      }, 1000); // Update jede Sekunde
    },
  },
};
</script>

<style scoped>
/* Hier kannst du dein CSS hinzufügen */
</style>
