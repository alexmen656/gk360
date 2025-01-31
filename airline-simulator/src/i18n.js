import { createI18n } from 'vue-i18n';

// Definiere die Übersetzungen für Englisch und Deutsch
const messages = {
  en: {
    createAirline: "Create your Airline",
    airlineName: "Airline Name",
    airlineCode: "Code (2-3 letters)",
    hometown: "Hometown",
    aircraftType: "Aircraft Type",
    selectAircraftType: "Select an Aircraft Type",
    boeing777: "Boeing 777",
    airbusA320: "Airbus A320",
    boeing737: "Boeing 737",
    createAirlineButton: "Create Airline",
    successMessage: "Success! Your airline \"{{ airline.name }}\" has been successfully created."
  },
  de: {
    createAirline: "Erstelle deine Airline",
    airlineName: "Airline Name",
    airlineCode: "Code (2-3 Buchstaben)",
    hometown: "Heimatstadt",
    aircraftType: "Flugzeugtyp",
    selectAircraftType: "Wählen Sie einen Flugzeugtyp",
    boeing777: "Boeing 777",
    airbusA320: "Airbus A320",
    boeing737: "Boeing 737",
    createAirlineButton: "Airline erstellen",
    successMessage: "Erfolg! Deine Airline \"{{ airline.name }}\" wurde erfolgreich erstellt."
  }
};

// Erstelle das i18n-Objekt
const i18n = createI18n({
  legacy: false, // Verwenden der neuen API
  locale: 'en', // Standard-Sprache (Englisch)
  messages, // Deine Sprachdaten
});

export default i18n;
