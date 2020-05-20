this.ball = function(width, height) {
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