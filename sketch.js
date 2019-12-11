let snake;
let rez = 20;
let food;
let w;
let h;
let speed = 12;
let img;
let b;
let apple;
let snakeForm;
let reset;
let button = document.querySelector("#btn");
let button1 = document.querySelector("#btn1")
let heading = document.querySelector('#pressStart');
let secondB;
let thirdB;
let fourthB;
let backgroundMusic = new Audio('sounds/background.mp3');
let eatFoodSound = new Audio('sounds/eat.wav');
let gameOverSound = new Audio('sounds/gameover.wav');

// I setup funktionen fremtræder alle miljø egenskaber man skal bruge til at bygge sin kode, så som canvas størrelse, billeder.
function setup() {
  createCanvas(400, 400);
  b = loadImage('images/gradient.jpg');
  secondB = loadImage('images/gradient2.png');
  thirdB = loadImage('images/gradient3.png');
  fourthB = loadImage('images/gradient4.jpg');
  apple = loadImage('images/mouse.png');
  gameOver = loadImage('images/gameover.png');
  gameWin = loadImage('images/youwin.png');
  snakeForm = loadImage("images/snake.png");
  reset = loadImage('images/reset.png');
  w = floor(width / rez);
  h = floor(height / rez);
  snake = new Snake();

  foodLocation();
  noLoop();

// Play knappen, fungerer ved at tilføje en eventlistener ved click, så påbegynder den nedenstående funktion.
  button.addEventListener("click", buttonclicked);
// Funktionen indbærer at loopet skal starte, baggrundsmussikken skal starte, der justeres på musikkens lyd ved at bruge volume, play knappen gemmes og teksten heading gemmes også-
  function buttonclicked(){
    loop();
    backgroundMusic.play();
    backgroundMusic.volume = 0.3;
    button.style.display = 'none';
    heading.style.display = 'none';


  }
  // her gemmes restart knappen, uden for click funktionen og indenfor setup funktionen, da jeg gerne vil have den allerede fra starten er gemt væk, da den først kommer når man dør.
  button1.style.display = 'none';
  // jeg har benyttet framerate til at justere slangens hastighed, men i virkeligheden så piller jeg ved hele kodens hastighed, dvs. hvis der var et andet objekt som bevægede sig, så ville den også øge hastigheden.
  frameRate(speed);


}

// foodLocation gør at min variabel food har en lokation. Dette gør jeg ved at skabe en vektor createVector på x aksen og y aksen. jeg har så defineret to variabler x og y, som siger at x og y skal placeres tilfældigt inden for w og h som er højden og bredden af min canvas.
function foodLocation() {
// floor runder det tilfældige random tal som forekommer ned, dette bruger jeg så at jeg undgår decimaltal, så min food ikke placeres dårligt på canvas.
  let x = floor(random(w));
  let y = floor(random(h));

  food = createVector(x, y);



}
// funktionen keyPressed fortæller hvilket retning slangen skal bevæge sig når man trykker på et af arrow knapperne. I p5 er knapperne allerede navngivet.
function keyPressed() {
  if (keyCode === LEFT_ARROW) {
    snake.setDir(-1, 0);
  } else if (keyCode === RIGHT_ARROW) {
    snake.setDir(1, 0);

  } else if (keyCode === DOWN_ARROW) {
    snake.setDir(0, 1);
  } else if (keyCode === UP_ARROW) {
    snake.setDir(0, -1);
  }
}

// draw funktionen kører hele tiden dens kode som er skrevet inden i, lige indtil man kalder noLoop eller stopper programmet.
function draw() {
  scale(rez);
  background(b);
  snake.update();
  snake.show();
  if (snake.eat(food)) {
    foodLocation();
    eatFoodSound.play();


  }
// Hvis man dør i spillet, så stopper loopet og gameOver billedet samt restart knappen fremtræder
  if (snake.endGame()) {
// Stopper koden
    noLoop();


    image(gameOver, 2.5, 2.5, 15, 15);
    button1.style.display = 'block';


// Når man klikker Restart knappen, så aktiveres følgende funktion
    button1.addEventListener("click", buttonclicked);

//funktionen siger at når knappen er trykket, så starter man setup funktionen, loopet startes igen, og baggrundmusikken starter igen.
    function buttonclicked(){
      setup();
      loop();
      backgroundMusic.play();




    }
    // Stop musik når man dør, og genstart lyden fra begyndelsen.
gameOverSound.play();
gameOverSound.volume = 0.5;
backgroundMusic.pause();
backgroundMusic.currentTime = 0;

  }

// Madens udseende
  noStroke();
  image(apple, food.x, food.y, 1, 1);



}
