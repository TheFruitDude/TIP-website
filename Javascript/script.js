var b = new ball(40, 40) //the red ball
var re; //the brick we move with mouse

let cnv;
let d = 30;
var wHeight; //global for window Height
var wWidth;
var arr = [] //Array to store all the bricks

let rect_width = 100
let rect_heigth = 25
var anzahl_rect = 70

function setup() {
  re = new rectangle(color('white')) 

  var h = document.getElementById("bo")
  frameRate(60)
  wHeight = windowHeight - h.offsetHeight //the body element is above the canvas
  wWidth = windowWidth

  cnv = createCanvas(windowWidth, windowHeight-h.offsetHeight);
  cnv.mouseMoved(moveRect); // attach listener, activity on canvas only
  cnv.mousePressed(draw_bricks);
const colorArr = [
  'Tomato',
  'Orange',
  'DodgerBlue',
  'MediumSeaGreen',
  'Gray',
  'SlateBlue',
  'Violet',
  'LightGray'
  
]
  var randomColor;

  for (let i = 1; i <= anzahl_rect; i++) { //make i bricks
    randomColor = colorArr[Math.floor(Math.random() * colorArr.length)];
    var r = new rectangle(randomColor)
    arr.push(r)
  }

  
}

function moveRect() {
  let yPosRect = (wHeight -25)
  
  if (mouseX < wWidth - rect_width) { //check the sides
    re.draw(mouseX, yPosRect, rect_width+30, rect_heigth)
  } else {    
    re.draw(wWidth - rect_width, yPosRect, rect_width+30, rect_heigth)
  }
}


function draw_bricks(w) {
  var x = 0
  var y = 20
  for (let i = 0; i < arr.length; i++) {
    if (x + rect_width > w) {
      x = 0; y+=30;

    }
    arr[i].draw(x, y, rect_width, rect_heigth)
    x += (rect_width + 5)
    
  }
}
var x = 400; //starting point for the ball
var y = 300;
var z = 1 // is alwyays either 1 or -1
function draw() {
  
  background(10);
  if (intersects(b, re)) {
    z = z * (-1)
  } 

  
  draw_bricks(wWidth)     
  moveRect() //rectangle follows the mouse

  x += 1.5 * z
  y += 1.5 * z
  b.draw(y, x)
}
function intersects(ball, rectangle) {

  for (let i = rectangle.x; i < rectangle.x + rectangle.w; i++) {
    var d = dist(ball.x, ball.y, i, rectangle.y)

    if (d < ball.radius) {
      // here calculate the angle between rectangleX and line
      //Physik: 2.Kanti: Eingangswinkel == Ausganswinkel 
      return true
    }
  }
  return false
}

function ball(width, height) {
  this.width = width;
  this.height = height;
  this.radius = height/2;
  this.x;
  this.y,

  this.draw = function(x, y) {
    this.x = x;
    this.y = y;
    var c = color('red')
    fill(c)
    noStroke()
    ellipse(x, y, this.width, this.height);
  }
}