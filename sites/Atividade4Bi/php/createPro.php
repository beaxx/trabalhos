<?php
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;  // Se não tiver valor, atribui null

    $arquivo = $_FILES['upload'];
    $caminhoImagem = 'Assets/images/produtos/noImage.jpg'; // Valor padrão da imagem

    if ($arquivo['error'] == UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

        // Verificar tipo de arquivo
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extensao, $tiposPermitidos)) {
            die("Formato de arquivo não permitido.");
        }

        // Gerar nome único e salvar a imagem
        $nomeUnico = uniqid() . "." . $extensao;
        $caminhoImagem = '../Assets/images/produtos/' . $nomeUnico;


        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoImagem)) {
            die("Erro ao salvar a imagem.");
        }
    }

    // Atualizar os dados no banco
    $sql = "INSERT INTO produtos(nome, descricao, preco, quantidade, categoria_id, imagemPro)
    VALUES('$name', '$descricao', $preco, $quantidade, $categoria, '$caminhoImagem')";

    if ($mysqli->query($sql) === TRUE) {
        // Atualizar os dados na sessão
        $_SESSION['name'] = $name;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['preco'] = $preco;
        $_SESSION['quantidade'] = $quantidade;
        $_SESSION['categoria'] = $categoria;
        $_SESSION['imagemPro'] = $caminhoImagem;

        // Resetando a imagem para a padrão (noImage.jpg) para o próximo produto
        $_SESSION['imagemPro'] = 'Assets/images/produtos/noImage.jpg';

        header("Location: painel.php#produtos");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/images/logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/createpro.css">
    <title>Cadastro de produtos - Deco's Home</title>
</head>
<body>
    
    <div class="menu-faixa">
        <div class="text-menu">
            <span>Painel Administrativo</span>
        </div>
        <div class="back-btn">
            <a href="painel.php#produtos"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
            </svg></button></a>
        </div>
    </div>
    <main>
    <div class="container-container">
        <div class="content">
        <form action="createPro.php" method="post" id="updateForm" enctype="multipart/form-data">
                <div class="line">
                <div class="content-image">
                <img id="perfil" src="<?php echo isset($_SESSION['imagemPro']) && $_SESSION['imagemPro'] != 'Assets/images/produtos/noImage.jpg' ? $_SESSION['imagemPro'] : '../Assets/images/produtos/noImage.jpg'; ?>" alt="product picture">
                        <label for="upload" class="upload-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </label>
                    <input type="file" name="upload" id="upload" accept="image/*">
                </div><br>
                    <div class="nome">
                        <label for="name">Nome:</label><br>
                        <input type="text" name="name" id="name" placeholder="..." required class="input-text">
                    </div>
                    <div class="descricao">
                        <label for="descricao">Descrição:</label><br>
                        <input type="text" name="descricao" id="descricao" placeholder="..." required class="input-text"><br>
                    </div>    
                </div>
                <div class="line">
                    <div class="preco">
                        <label for="preco">Preço:</label><br>
                        <input type="number" id="preco" name="preco" step="0.01" min="0" placeholder="0.00" required><br>
                    </div>  
                    <div class="quantidade">
                    <label for="quantidade">Quantidade:</label><br>
                        <input type="number" name="quantidade" id="quantidade" placeholder="..." required class="input-text" min="0"><br>
                    </div>
                    <div class="categoria">
                        <label for="categoria">Categoria:</label><br>
                        <select id="categoria" name="categoria">
                            <option value="1">Popular</option>
                            <option value="2">Novo</option>
                            <option value="3">Recomendado</option>
                        </select>
                    </div>
                </div>
                <div class="btn-end">
                    <input type="submit" value="Cadastrar" class="btn-cadastro">
                    <input type="reset" value="Limpar" class="btn-limpa">
                </div>
            </form>
        </div>
    </div>
    </main>
    <script>
const perfil = document.getElementById("perfil");
const uploadInput = document.getElementById("upload");

uploadInput.addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            perfil.src = e.target.result; // Exibe a imagem selecionada diretamente no navegador
        };
        reader.readAsDataURL(file);
    }
});

    </script>
</body>
</html>
