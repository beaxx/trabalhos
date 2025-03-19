<?php
include 'php/conection.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
$_SESSION['last_page'] = $_SERVER['REQUEST_URI'];
$id = $_SESSION['id'];
$sql = "SELECT Nome, Sobrenome, Email, idade, Endereco, imagem FROM usuarios WHERE id=$id";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['name'] = $user['Nome'];
    $_SESSION['Sname'] = $user['Sobrenome'];
    $_SESSION['email'] = $user['Email'];
    $_SESSION['idade'] = $user['idade'];
    $_SESSION['endereco'] = $user['Endereco'];
    $_SESSION['imagem'] = $user['imagem'];
} else {
    echo "Erro ao carregar dados do usuário.";
    exit();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/user.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="Assets/images/logo.png" type="image/png">
    <title>Deco Home - Conta</title>
</head>
<body>
    <div class="main">
        <div class="body-message">
        <div class="message" id="message">
                <div class="message-content">
                    <h2>Tem certeza que deseja sair?</h2>
                    <div class="btns">
                        <button id="btnCancelar">Cancelar</button>
                        <button id="btnConfirmar">Sair</button> 
                    </div>
                </div>
            </div>
        </div>
        <div class="body-message2">
        <div class="message2" id="message2">
                <div class="message-content2">
                    <h2>Tem certeza que deseja excluir sua conta?</h2>
                    <p>Esta ação não terá volta.</p>
                    <div class="btns">
                        <button id="btnCancelar2">Cancelar</button>
                        <button id="btnConfirmar2">Excluir</button> 
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-faixa">
            <div class="menu-responsivo" id="menuBtn">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg></a>   
            </div>
            <div class="text-menu">
                <span>Minha Conta</span>
            </div>
            <div class="back-btn">
            <a href="index.php"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg></button></a>
            </div>
        </div>
        <div class="content">
            <div class="menu-principal hidden">
                <ul>
                <li id="dados" class="actived"><a href="">Seus Dados</a></li>
                <li><a href="" id="compras">Compras</a></li>
                <li><a href="" id="configuracao">Configurações</a></li>
                <li><a href="" id="seguranca">Seguranças</a></li>
                <li id="contato"><a>Nos Contate</a></li>
                </ul>
            </div>
            <div class="dados">
            <form action="php/update.php" method="post" id="updateForm" enctype="multipart/form-data">
                <div class="dados-content">
                <div class="line">
                    <div class="image">
                    <img id="perfil" src="<?php echo $_SESSION['imagem'] ? $_SESSION['imagem'] : 'Assets/images/conta.png'; ?>" alt="user profile picture">

                        <label for="upload" class="upload-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg>
                        </label>
                        <input type="file" name="upload" id="upload" accept="image/*" disabled>
                </div>
                <div class="nome">
                        <label for="name">Nome</label><br>
                        <input type="text" name="name" id="name" class="inputReadOnly" value="<?php 
                            echo $_SESSION['name'];
                        ?>" readonly>
                    </div>
                    <div class="Snome">
                        <label for="Sname">Sobrenome</label><br>
                        <input type="text" name="Sname" id="Sname" class="inputReadOnly" value="<?php 
                            echo $_SESSION['Sname'];
                        ?>" readonly>
                    </div>
                </div>
                <div class="line">
                    <div class="line1">
                        <div class="idade">
                        <label for="idade">Idade</label><br>
                        <input type="text" name="idade" id="idade" class="inputReadOnly" value="<?php 
                            echo $_SESSION['idade'];
                        ?>" readonly></div>
                        <div class="email">
                        <label for="email">E-mail</label><br>
                        <input type="text" name="email" id="email" class="inputReadOnly" value="<?php 
                            echo $_SESSION['email'];
                        ?>" readonly>
                    </div>
                    </div>
                    <div class="tipo">
                        <label for="tipo">Código</label><br>
                        <input type="text" name="id" id="tipo" value="<?php 
                            echo $_SESSION['id'];
                        ?>" readonly>
                    </div>
                
            </div>
                <div class="endereco">
                <label for="endereco">Endereço</label><br>
                <input type="text" name="endereco" id="endereco" class="inputReadOnly" value="<?php 
                    echo $_SESSION['endereco'];
                ?>" readonly>
                </div>
                <div class="lineUltima">  
                    <a href="#" id="btnSair" class="btn-sair">Sair da Conta</a>
                    <a href="#" id="btnExcluir" class="btn-excluir" data-id="<?php echo $_SESSION['id']; ?>">Excluir a Conta</a>
                </div>
            </div>
</div>
            <div class="contato">
                <div class="content-contato">
                    <div class="conteudo">
                        <span>Possui algum feedback ou reclamação?</span>
                        <p>Comente conosco!</p>
                        <textarea rows="5" cols="50">

                        </textarea>
                    </div>
                </div>
            </div>
            </div>
            <div class="btns-end">
                <div class="btnsDados">
                    <input type="button" href="" class="btn-editar" value="Editar" id="btnEditar">
                    <input type="submit" href="" class="btn-salvar" value="Salvar" id="btnSalvar"  data-id="<?php echo $_SESSION['id']; ?>" disabled>
                </div>
                <div class="btnsContato">
                    <buttom class="btn-enviar">Enviar</buttom>
                </div>
            </div>
            </form>
            <script src="Assets/js/user.js"></script>
    </div>
</body>
</html>