<?php
if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: aviso.php?erro=nao_logado");
    exit;
}

// Verificar se o tipo do usuário é administrador
if ($_SESSION['tipo'] != 2) {
    header("Location: aviso.php?erro=nao_autorizado");
    exit;
}
?>
