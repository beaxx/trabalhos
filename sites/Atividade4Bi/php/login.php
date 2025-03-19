<?php
include 'conection.php'; // Conexão com o banco de dados

if (isset($_POST['pass']) && isset($_POST['email'])) {
    if (empty($_POST['email'])) {
        echo "Preencha o campo email!";
    } else if (empty($_POST['pass'])) {
        echo "Preencha o campo senha!";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['pass']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            // Verifica a senha
            if (password_verify($senha, $usuario['senha'])) {
                // Armazena os dados na sessão
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['name'] = $usuario['nome'];
                $_SESSION['Sname'] = $usuario['sobrenome'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['pass'] = $usuario['senha'];
                $_SESSION['idade'] = $usuario['idade'];
                $_SESSION['endereco'] = $usuario['endereco'];
                $_SESSION['tipo'] = $usuario['tipo'];
                $_SESSION['usuario_logado'] = true;

                // Redireciona com base no tipo do usuário
                if ($usuario['tipo'] == 1) { // Cliente
                    header("Location: ../index.php");
                } else if ($usuario['tipo'] == 2) { // Admin
                    header("Location: painel.php");
                } else {
                    echo "Tipo de usuário desconhecido.";
                }
                exit;
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Email não encontrado.";
        }
    }
}

$mysqli->close();
?>
