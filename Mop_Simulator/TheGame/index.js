const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');
canvas.width = 576;
canvas.height = 576;
let kajas = [];
const ambiance = new Audio('audio/kitchen.mp3');
const spilled_bucket = new Audio('audio/gameover.wav');
let sound_effect = new RandomAudioPlayer(audioFiles);
ambiance.volume = 0.3;
sound_effect.volume = 0.6;
spilled_bucket.volume = 0.7;

let felmoso = new Felmoso({imageSrc:'images/felmos.png',
    animations:{
        moveRight:{
            imageSrc:'./images/felmosR.png',
        },
        moveLeft:{
            imageSrc:'./images/felmos.png',
        }
    }
})

const background = new Media({
    imageSrc:'./images/Kitchen_Tiles.png',
    position: {
        x:0,
        y:0
    }
})
const bkend = new Media({
    imageSrc:'./images/bkend.png',
    position: {
        x:0,
        y:0
    }
})
const bucket = new Media({
    imageSrc:'./images/bucket.png',
    position: {
        x:80,
        y:100
}})



const keys =
{
    w: {pressed: false,},

    a: {pressed: false,},

    d: {pressed: false,},
    
    s: {pressed: false,},
}

function generateKaja() 
{
    const spawnArea = {
        minX: 2,
        maxX: 516,
        minY: 2,
        maxY: 516
    };
    const randomX = Math.floor(Math.random() * (spawnArea.maxX - spawnArea.minX + 1)) + spawnArea.minX;
    const randomY = Math.floor(Math.random() * (spawnArea.maxY - spawnArea.minY + 1)) + spawnArea.minY;
    let kaja = new Kaja({
        position: { x: randomX, y: randomY },
})
    kajas.push(kaja);

}

let kajapontok = 0;
let gameover = false;

function gameloop(){
    if(!gameover){
    window.requestAnimationFrame(gameloop);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.save();
    ctx.fillStyle = 'white';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    background.draw();
    ambiance.play();


    const currentTime = Date.now();

    if (currentTime  >= 10000 ) {
        if (Math.random() < 0.02 ) { 
            generateKaja()
        }

    }


    for (let i = 0; i < kajas.length; i++) {
        kajas[i].draw();
        const kajaLeft = kajas[i].position.x +30;
        const kajaRight = kajas[i].position.x + kajas[i].width -30;
        const kajaTop = kajas[i].position.y +30;
        const kajaBottom = kajas[i].position.y + kajas[i].height -30;

        const felmosoLeft = felmoso.position.x ;
        const felmosoRight = felmoso.position.x + felmoso.width ;
        const felmosoTop = felmoso.position.y +90;
        const felmosoBottom = felmoso.position.y + felmoso.height -10 ;

        if (felmosoRight > kajaLeft &&
            felmosoLeft < kajaRight &&
            felmosoBottom > kajaTop &&
            felmosoTop < kajaBottom) {
            kajas.splice(i, 1);
            kajapontok += 1;
            sound_effect.playRandom();


        }
        document.getElementById("score").innerHTML = kajapontok;
    }

    
    if (felmoso.position.x < -40 || felmoso.position.x > canvas.width - 40){
        gameover = true;
        return;
    }
    if (felmoso.position.y < -100 || felmoso.position.y > canvas.height - 100){
        gameover =true;
        return;
    }

    felmoso.handleInput(keys);
    felmoso.draw();
    felmoso.update();
    ctx.restore();}


    if (gameover) {
        spilled_bucket.play();
        ambiance.pause();
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        background.draw();
        bkend.draw();
        bucket.draw();
        ctx.fillStyle = 'black';
        ctx.font = '48px Arial';
        ctx.textAlign = 'center';
        ctx.fillText('You spilled the bucket!', canvas.width / 2, canvas.height / 7);


        
        let currScore = $('#score').text()
        let userId = $('#userId').val()

        $.ajax({
            url:"ajax.php",
            type:"POST",
            dataType:"json",
            data:{uId:userId, cScore:currScore},
            success:function(data){

                if (data.id == 1) {
                    toastr.success(data.msg, "Kitchen mop simulator")
                }else{
                    toastr.error(data.msg, "Kitchen mop simulator")
                }

            },
            complete: function(){
        

            }
        });

        
        document.getElementById("resetButton").style.display='block';
        document.getElementById("resetButton").addEventListener("click", function () {window.location.reload();});
        }
  }

  gameloop();



