// isso aqui é p o menu aparecer e desaparecer
const btnMenu = document.getElementById('menuBtn');
const menuPrincipal = document.querySelector('.menu-principal');

btnMenu.addEventListener("click", function() {
    menuPrincipal.classList.toggle("hidden");
});

// Alternar entre as seções
function toggleVisibility(showElement, hideElements){
    showElement.style.display = "block";
    hideElements.forEach(element =>{
        element.style.display = "none";
    });
}
// seleciona as opções do menu (os li)
const menuItems = document.querySelectorAll('.menu-principal li');

// seleciona as seções (que serão alternadas)
const home = document.querySelector('.home');
const conta = document.querySelector('.conta');
const clientes = document.querySelector('.clientes');
const produtos = document.querySelector('.produtos');
const pedidos  = document.querySelector('.pedidos');

// array com elas p facilitar na hora de mudar
const todasSecoes = [home, conta, clientes, produtos, pedidos];

//parte do evento ao clicar em uma das opcoes (+ a mudanca nas secoes) 
menuItems.forEach(item =>{
    item.addEventListener("click", function(){
        menuItems.forEach(menuItem => menuItem.classList.remove("actived")); //aqui ta removendo todas as classes actived das outras opçoes
        this.classList.add("actived"); // aqui ta adicionando na q foi clicada
        
        switch (this.id){
            case "home":
                toggleVisibility(home, todasSecoes.filter(section => section !== home));
                break;
            case "conta": 
                toggleVisibility(conta, todasSecoes.filter(section => section !== conta));
                break;
            case "clientes": 
                toggleVisibility(clientes, todasSecoes.filter(section => section !== clientes));
                break;
            case "produtos": 
                toggleVisibility(produtos, todasSecoes.filter(section => section !== produtos));
                break;
            case "pedidos": 
                toggleVisibility(pedidos, todasSecoes.filter(section => section !== pedidos));
                break;
            default:
                break;
        }
    });
});

// imagem na conta
const perfil = document.getElementById("perfil");
const uploadInput = document.getElementById("upload");

uploadInput.addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            perfil.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});


// p liberar os inputs p editar:
const btnEditar = document.getElementById('btnEditar'); // Seleciona o botão
const btnSalvar = document.getElementById('btnSalvar');
const btnImage = document.getElementById('upload');
const btnImageUpload = document.querySelector('.upload-btn');
const inputs = document.querySelectorAll('.inputReadOnly'); // Seleciona todos os inputs com a classe 'inputReadOnly'

btnEditar.addEventListener("click", function() {  // Corrigido a sintaxe do addEventListener
    // Itera sobre todos os inputs selecionados e remove o atributo 'readonly'
    inputs.forEach(function(input) {
        input.removeAttribute("readonly");
        input.style.backgroundColor = "var(--LightGrey)";
    });
    btnSalvar.removeAttribute("disabled");
    btnSalvar.style.backgroundColor = "var(--LightBrown)";
    btnSalvar.style.color = "var(--White) !important";

    btnImage.removeAttribute("disabled");
    btnImageUpload.style.backgroundColor = "var(--LightGrey) !important";
});

btnSalvar.addEventListener("click", function(event) {
    event.preventDefault(); // Impede o envio direto
    const form = document.getElementById('updateForm');
    form.submit(); // Envia o formulário de forma tradicional
});
