// isso aqui é p o menu aparecer e desaparecer
const btnMenu = document.getElementById('RmenuBtn');
const menuPrincipal = document.querySelector('.Rmenu-principal');

btnMenu.addEventListener("click", function() {
    menuPrincipal.classList.toggle("hidden");
});// Alternar entre as seções
function toggleVisibility(showElement, hideElements) {
    showElement.style.display = "block";
    hideElements.forEach(element => {
        element.style.display = "none";
    });
}

