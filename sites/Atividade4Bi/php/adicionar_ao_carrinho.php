<?php
session_start();

if (!isset($_GET['id'])) {
    die('ID do produto não informado.');
}
$produto_id = intval($_GET['id']); // Sanitização

include 'conection.php';

// Buscar o produto no banco de dados
$query = "SELECT * FROM produtos WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $produto_id);
$stmt->execute();
$produto = $stmt->get_result()->fetch_assoc();

if (!$produto) {
    die('Produto não encontrado.');
}

// Inicializar o carrinho na sessão
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar o produto ao carrinho
if (isset($_SESSION['carrinho'][$produto_id])) {
    $_SESSION['carrinho'][$produto_id]['quantidade'] += 1; // Incrementar a quantidade
} else {
    $_SESSION['carrinho'][$produto_id] = [
        'id' => $produto['id'],
        'nome' => $produto['nome'],
        'preco' => $produto['preco'],
        'imagem' => $produto['imagemPro'],
        'quantidade' => 1
    ];
}

// Redirecionar para o carrinho
header('Location: ../carrinho.php');
exit;
