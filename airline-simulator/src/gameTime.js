class GameTime {
  constructor(startDate) {
    this.startDate = new Date(startDate);
    this.gameDays = 0;
    this.currentDate = new Date();
    this.currentTime = "";
  }

  updateGameTime() {
    const currentTime = new Date();
    const timeDifference = currentTime - this.startDate;
    console.log("timeDifference: " + timeDifference);
    this.gameDays = Math.floor(timeDifference / (10 * 60 * 1000)); // 1 Spieltag = 1 echter Tag if 1:1  (24 * 60 * 60 * 1000)
    this.currentDate = new Date(
      this.startDate.getTime() + this.gameDays * 24 * 60 * 60 * 1000
    );
    this.currentTime = this.calculateGameTime(timeDifference);
  }

  calculateGameTime(timeDifference) {
    const gameTimeInMinutes = (timeDifference / (10 * 60 * 1000)) * 24 * 60; // Convert to game minutes
    const hours = Math.floor(gameTimeInMinutes / 60) % 24;
    const minutes = Math.floor(gameTimeInMinutes % 60);
    return `${this.padZero(hours)}:${this.padZero(minutes)}`;
  }

  padZero(value) {
    return value < 10 ? `0${value}` : value;
  }

  getCurrentDate() {
    return this.currentDate;
  }

  getGameDays() {
    return this.gameDays;
  }

  getFormattedDate() {
    return this.currentDate.toLocaleDateString();
  }

  getCurrentTime() {
    return this.currentTime;
  }
}

export default GameTime;
