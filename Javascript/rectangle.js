this.rectangle = function(color) {
    this.color = color;
    this.x;
    this.y;
    this.w;
    this.h;

    this.draw = function(posx, posy, width, height){
        this.x = posx;
        this.y = posy;
        this.h = height;
        this.w = width;
        
        fill(color); 
        noStroke();
        rect(posx, posy, width, height); 
    }

}