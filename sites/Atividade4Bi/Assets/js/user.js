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

// Aparece a mensagem de aviso
const btnSair = document.getElementById("btnSair");
const modal = document.querySelector(".body-message"); 
const btnConfirmar = document.getElementById("btnConfirmar");
const btnCancelar = document.getElementById("btnCancelar");

btnSair.addEventListener("click", function(event) {
    event.preventDefault(); 
    modal.style.visibility = 'visible'; 
});


btnConfirmar.addEventListener("click", function() {
    window.location.href = "php/logout.php";
});

btnCancelar.addEventListener("click", function() {
    modal.style.visibility = 'hidden'; 
});

// aviso de excluir
const btnExcluir = document.getElementById("btnExcluir");
const message = document.querySelector(".body-message2"); 
const btnConfirmar2 = document.getElementById("btnConfirmar2");
const btnCancelar2 = document.getElementById("btnCancelar2");

btnExcluir.addEventListener("click", function(event) {
    event.preventDefault(); 
    message.style.visibility = 'visible'; 
});


btnConfirmar2.addEventListener("click", function() {
    const userId = btnExcluir.getAttribute("data-id");
    window.location.href = "php/delete.php?id=" + userId;  
});

btnCancelar2.addEventListener("click", function() {
    message.style.visibility = 'hidden'; 
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


// menu principal agr
const menuDados = document.getElementById('dados');
const Dados = document.querySelector('.dados');
const btnDados = document.querySelector('.btnsDados');

const menuContato = document.getElementById('contato');
const contato = document.querySelector('.contato');
const btnContato = document.querySelector('.btnsContato');

menuDados.addEventListener('click', function(){
    menuDados.style.backgroundColor = "var(--LighterGrey) !important";
    Dados.style.display = "block";
    btnDados.style.display = "block";

    // outros
    btnContato.style.display = 'none';
    contato.style.display = "none";
    menuContato.style.backgroundColor = "var(--white) !important";
});



menuContato.addEventListener('click', function(){
    menuContato.style.backgroundColor = "var(--LighterGrey) !important";
    contato.style.display = "block";
    btnContato.style.display = 'block';

    // outros
    Dados.style.display = "none";
    btnDados.style.display = 'none';
    menuDados.style.backgroundColor = "var(--white) !important";

});

// isso aqui é p o menu aparecer e desaparecer
const btnMenu = document.getElementById('menuBtn');
const menuPrincipal = document.querySelector('.menu-principal');

btnMenu.addEventListener("click", function() {
    menuPrincipal.classList.toggle("hidden");
});