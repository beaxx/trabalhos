<?php
session_start();  // Começa a sessão

include 'conection.php';  // Inclui a conexão com o banco

// Verifica se o ID foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Certifique-se de que o ID passado corresponde ao ID da sessão, para evitar exclusões não autorizadas
    if ($id == $_SESSION['id']) {
        // Cria a query para excluir o usuário
        $sql = "DELETE FROM usuarios WHERE id = $id";
        
        // Verifica se a query foi executada com sucesso
        if ($mysqli->query($sql) === TRUE) {
            // Caso a exclusão tenha sido bem-sucedida, finaliza a sessão do usuário e redireciona para a página inicial
            session_destroy();  // Finaliza a sessão
            header("Location: ../index.php");  // Redireciona para a página inicial
            exit;
        } else {
            echo "Erro ao excluir o registro: " . $mysqli->error;
        }
    } else {
        echo "Você não tem permissão para excluir essa conta!";
    }
} else {
    echo "ID inválido!";
}

$mysqli->close();  // Fecha a conexão com o banco
?>
