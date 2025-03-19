<?php
include 'conection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $Sname = $_POST['Sname'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];

    $arquivo = $_FILES['upload'];
    $caminhoImagem = $_SESSION['imagem']; // Valor padrão é o da sessão atual

    if ($arquivo['error'] == UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

        // Verificar tipo de arquivo
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extensao, $tiposPermitidos)) {
            die("Formato de arquivo não permitido.");
        }

        // Gerar nome único e salvar a imagem
        $nomeUnico = uniqid() . "." . $extensao;
        $caminhoImagem = 'Assets/images/' . $nomeUnico;

        if (!move_uploaded_file($arquivo['tmp_name'], '../' . $caminhoImagem)) {
            die("Erro ao salvar a imagem.");
        }
    }

    // Atualizar os dados no banco
    $sql = "UPDATE usuarios SET Nome='$name', Sobrenome='$Sname', Email='$email', idade='$idade', Endereco='$endereco', imagem='$caminhoImagem' WHERE id=$id";

    if ($mysqli->query($sql) === TRUE) {
        // Atualizar os dados na sessão
        $_SESSION['name'] = $name;
        $_SESSION['Sname'] = $Sname;
        $_SESSION['email'] = $email;
        $_SESSION['idade'] = $idade;
        $_SESSION['endereco'] = $endereco;
        $_SESSION['imagem'] = $caminhoImagem;

        header("Location: ../user.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
