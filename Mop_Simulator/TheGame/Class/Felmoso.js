class Felmoso extends Media{
    constructor({
        imageSrc = '../images/felmos.png',
        animations,
    })
    {   
        super({imageSrc, animations,})
        this.position =
        {
            x: 100,
            y: 100
        }
        this.velocity = 
        {
            x:0,
            y:0
        }


    }
    update()
    {
        this.position.x += this.velocity.x;
        this.position.y += this.velocity.y;
    }

    handleInput(keys)
    {
        if (this.preventInput) return
        this.velocity.x = 0;
        // this.velocity.y = 0; //rage game mode
    
        if(keys.d.pressed)
        {
            this.velocity.x = 4
            this.switchSprite('moveRight')
        }
        else if (keys.a.pressed)
        {
           
            this.velocity.x = -4
            this.switchSprite('moveLeft')
        }
        else if(keys.s.pressed)
        {
            this.velocity.y = 4
            
        }
        else if (keys.w.pressed)
        {
            this.velocity.y = -4

        }
    }

    switchSprite(name)
    {
        if(this.image === this.animations[name].image) return
        this.image = this.animations[name].image
    }
}
