<?php
session_start();

if (isset($_POST['id'], $_POST['quantidade'])) {
    $id = intval($_POST['id']);
    $quantidade = max(1, intval($_POST['quantidade'])); // Garante que a quantidade seja no mínimo 1

    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;
    }
}

header('Location: ../carrinho.php');
exit;
