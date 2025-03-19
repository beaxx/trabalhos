<?php
include 'conection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $descricao = $row['descricao'];
        $preco = $row['preco'];
        $quantidade = $row['quantidade'];
        $categoria = $row['categoria_id'];
        $imagemPro = $row['imagemPro'];

    } else {
        echo "Usuário não encontrado!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];


    $sql = "UPDATE produtos SET Nome='$nome', descricao='$descricao', preco='$preco', quantidade='$quantidade', categoria_id='$categoria' WHERE id=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    
    header("Location: painel.php#produtos");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/createPro.css">
    <link rel="icon" href="../Assets/images/logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update de Produtos</title>
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
        <form action="updatePro.php" method="post" id="updateForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="line">
                <div class="content-image">
                <?php echo "<img src='" . htmlspecialchars($row['imagemPro']) . "' alt='Imagem do usuário'>"; ?>
                </div>    
                <div class="nome">
                        <label for="name">Nome:</label><br>
                        <input type="text" name="nome" id="nome" value="<?php echo $nome;?>" required class="input-text">
                    </div>
                    <div class="descricao">
                        <label for="descricao">Descrição:</label><br>
                        <input type="text" name="descricao" id="descricao" value="<?php echo $descricao;?>" required class="input-text"><br>
                    </div>    
                </div>
                <div class="line">
                    <div class="preco">
                        <label for="preco">Preço:</label><br>
                        <input type="number" id="preco" name="preco" step="0.01" min="0" value="<?php echo $preco;?>" required><br>
                    </div>  
                    <div class="quantidade">
                    <label for="quantidade">Quantidade:</label><br>
                        <input type="number" name="quantidade" id="quantidade" value="<?php echo $quantidade;?>" required class="input-text" min="0"><br>
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
                    <input type="submit" value="Atualizar" class="btn-cadastro">
                    <input type="reset" value="Limpar" class="btn-limpa">
                </div>
            </form>
        </div>
    </div>
    </main>
</body>
</html>