const menu = document.querySelectorAll(".menu"); 

function Descer() {
    if (window.scrollY > 100) {
        menu.forEach(item => { // pq por each item? pq tem itens dentro do menu slk
            item.classList.add("hidden"); 
        });
    } else {
        menu.forEach(item => {
            item.classList.remove("hidden"); 
        });
    }
}

window.addEventListener("scroll", Descer); // adiciona isso p funcionar a funcao 
