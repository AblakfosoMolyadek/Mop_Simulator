class Media
{
    constructor(
    {           position, 
                imageSrc,
                animations,
    })
    {
       this.position = position
       this.image = new Image()
       this.image.onload = () =>
       {
            this.loaded = true;
            this.width = this.image.width 
            this.height = this.image.height 
       }
       this.image.src = imageSrc
       this.animations = animations;
       this.loaded = false
       if(this.animations)
       {
            for(let key in this.animations)
            {
               const image= new Image() 
               image.src =this.animations[key].imageSrc
               this.animations[key].image = image
            }
       }

    }
    draw()
    {
        if(!this.loaded) return
        ctx.drawImage(
                this.image, 
                this.position.x, 
                this.position.y,
                this.width,
                this.height,
            )
        
    }

}