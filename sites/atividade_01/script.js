window.addEventListener("scroll", function(){
    let nav = this.document.querySelector('.menu')
    nav.classList.toggle('rolagem', this.window.scrollY > 0);
  });
  window.addEventListener("scroll", function(){
    let a = this.document.querySelector('.texto1')
    let b = this.document.querySelector('.texto2')
    let c = this.document.querySelector('.texto3')
    let d = this.document.querySelector('.texto4')
    let e = this.document.querySelector('.img-menu')
    a.classList.toggle('rolagem', this.window.scrollY > 0);
    b.classList.toggle('rolagem', this.window.scrollY > 0);
    c.classList.toggle('rolagem', this.window.scrollY > 0);
    d.classList.toggle('rolagem', this.window.scrollY > 0);
    e.classList.toggle('rolagem', this.window.scrollY > 0);
  });



const imagem = document.getElementById('img-disco');
const botao = document.getElementById('button-song1');

botao.addEventListener('click', function() {
    if (!imagem.classList.contains('animacao')) {
        imagem.classList.add('animacao');
    } else {
        imagem.classList.remove('animacao');
    }
});

const imagem2 = document.getElementById('img-disco2');
const botao2 = document.getElementById('button-song2');

botao2.addEventListener('click', function() {
    if (!imagem2.classList.contains('animacao')) {
        imagem2.classList.add('animacao');
    } else {
        imagem2.classList.remove('animacao');
    }
});

const imagem3 = document.getElementById('img-disco3');
const botao3 = document.getElementById('button-song3');

botao3.addEventListener('click', function() {
    if (!imagem3.classList.contains('animacao')) {
        imagem3.classList.add('animacao');
    } else {
        imagem3.classList.remove('animacao');
    }
});


const player = document.getElementById('player');
const playPauseButton = document.getElementById('button-song1');

let isPlaying = false;

playPauseButton.addEventListener('click', function() {
    if (isPlaying) {
        player.pause();
        playPauseButton.innerHTML = '<i class="fa-solid fa-play"></i>';
    } else {
        player.play();
        playPauseButton.innerHTML = '<i class="fa-solid fa-pause"></i>';
    }
    
    isPlaying = !isPlaying;
});


const player2 = document.getElementById('player2');
const playPauseButton2 = document.getElementById('button-song2');

let isPlaying2 = false;

playPauseButton2.addEventListener('click', function() {
    if (isPlaying2) {
        player2.pause();
        playPauseButton2.innerHTML = '<i class="fa-solid fa-play"></i>';
    } else {
        player2.play();
        playPauseButton2.innerHTML = '<i class="fa-solid fa-pause"></i>';
    }
    
    isPlaying2 = !isPlaying2;
});



const player3 = document.getElementById('player3');
const playPauseButton3 = document.getElementById('button-song3');

let isPlaying3 = false;

playPauseButton3.addEventListener('click', function() {
    if (isPlaying3) {
        player3.pause();
        playPauseButton3.innerHTML = '<i class="fa-solid fa-play"></i>';
    } else {
        player3.play();
        playPauseButton3.innerHTML = '<i class="fa-solid fa-pause"></i>';
    }
    
    isPlaying3 = !isPlaying3;
});