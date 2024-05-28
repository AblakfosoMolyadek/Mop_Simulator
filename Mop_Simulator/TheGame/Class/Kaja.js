class Kaja extends Media{
    constructor({ position, }) {
        const imageSrcs = ['./images/spagg.png', './images/spagg1.png', './images/spagg2.png', './images/potat.png', './images/cookie.png', './images/cookie1.png', './images/cookie2.png', './images/tomato.png', './images/tomato1.png', './images/tomato2.png', './images/ketch.png', './images/ketch1.png'];
        const randomIndex = Math.floor(Math.random() * imageSrcs.length);
        const imageSrc = imageSrcs[randomIndex];
        super({ position, imageSrc});
       
    }

}


const audioFiles = [
    // '../audio/effect1.wav',
    './audio/effect2.wav',
    './audio/effect3.wav',
    './audio/effect4.wav',
    './audio/effect5.wav',
    './audio/effect6.wav',
    './audio/effect7.wav'
];

class RandomAudioPlayer {
    constructor(audioFiles) {
        this.audioFiles = audioFiles;
    }

    playRandom() {
        const randomIndex = Math.floor(Math.random() * this.audioFiles.length);
        const audio = new Audio(this.audioFiles[randomIndex]);
        audio.play();
    }
}




