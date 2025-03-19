<?php
if (!isset($_GET['erro'])) {
    header("Location: ../index.php");
    exit;
}

$mensagem = "";
if ($_GET['erro'] === "nao_logado") {
    $mensagem = "Você não pode acessar essa página sem estar logado!";
} elseif ($_GET['erro'] === "nao_autorizado") {
    $mensagem = "Você não tem permissão para acessar essa página!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/images/logo.png" type="image/png">
    <title>Aviso - Deco Home</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        img {
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="aviso">
        <img src="../Assets/images/aviso.png" alt="Aviso - simbolo"><br>
        <p><?= $mensagem; ?></p>
    </div>
</body>
</html>
