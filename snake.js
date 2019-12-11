class Snake {

  constructor() {
// Jeg skal bruge en array til at holde styr på slangens lokation hele tiden, og samtidig en vektor til at repræsentere slangen.
    this.body = [];
    this.body[0] = createVector(0, 0);
    this.xdir = 0;
    this.ydir = 0;
    this.len = 1;
    this.score = 0;
    this.levelTwo = 5;
    this.levelThree = 10;
    this.levelFour = 15
    this.youWon = 20;

  }
// Her definerer jeg retningen som slangen kan bevæge sig i, dette bruger jeg bl.a når jeg skal definere arrow knapperne.
  setDir(x, y) {
    this.xdir = x;
    this.ydir = y;

  }
// Her vil jeg opdatere slangens lokation ved hver frame
   update() {

    let head = this.body[this.body.length - 1].copy();
    this.body.shift();
    head.x += this.xdir;
    head.y += this.ydir;
    this.body.push(head);
// Jeg placerer også mine sværhedsgrader/levels her, da jeg gerne vil have at de træder i kraft, så snart slangen har opnået den længde som sværhedsgraderne kræver.
    this.secondLevel();
    this.thirdLevel();
    this.fourthLevel();
    this.winGame();
// Jeg bruger querySelector til at kalde på en id fra min html fil og bruger innerHTML til at placere live scoreboardet.
  document.querySelector("#scoreboard").innerHTML = 'Your score:' + ' '  + this.score;



  }
// Her får jeg slangen til at vokse.
  grow() {
    let head = this.body[this.body.length - 1].copy();
    this.len++;
    this.body.push(head);
    this.score++;



  }
// Her fortæller jeg at hvis live score er lig med 5 som er leveTwo krav defineret længere oppe eller hvis live score er større end levelTwo, så bliver frameRate 18 og baggrunden skiftes til secondB
  secondLevel() {
if (this.score == this.levelTwo || this.score > this.levelTwo ){
frameRate(18);
background(secondB);

}


  }

  thirdLevel() {
if (this.score == this.levelThree || this.score > this.levelThree){

  frameRate(20);
  background(thirdB);
}

  }

  fourthLevel() {
if (this.score == this.levelFour || this.score > this.levelFour){

  frameRate(25);
  background(fourthB);
}

  }
// Hvis man vinder spillet, dvs. hvis live score er lig med 20 / youWon, så stopper loopet og et billede træder frem.
  winGame() {

if (this.score == this.youWon){

noLoop();
image(gameWin, 2.5, 2.5, 15, 15);

}

 }


// Her laver jeg igen en if statement til at fortælle, hvis slangen rammer nogle af kanterne på min canvas, så dør den.
  endGame() {

    let x = this.body[this.body.length - 1].x;
    let y = this.body[this.body.length - 1].y;

    if (x > w-1 || x < 0 || y > h-1 || y < 0) {

      return true;

    }

return false;

  }

  eat(pos) {

    let x = this.body[this.body.length - 1].x;
    let y = this.body[this.body.length - 1].y;

    if (x == pos.x && y == pos.y) {

      this.grow();
      return true;
    }

    return false;
  }


  show() {


    for (let i = 0; i < this.body.length; i++) {
      noStroke();
      image(snakeForm, this.body[i].x, this.body[i].y, 1, 1);
    }

  }



}
