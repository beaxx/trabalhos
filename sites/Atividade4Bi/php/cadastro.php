<?php
include_once 'conection.php';

$name = $_POST['name'];
$Sname = $_POST['Sname'];
$email = $_POST['email'];
$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$idade = $_POST['idade'];
$endereco = $_POST['endereco'];
$tipo = 1;


$sql = "INSERT INTO usuarios(nome,sobrenome, email,senha,idade,endereco,tipo) 
VALUES('$name','$Sname','$email', '$password', $idade, '$endereco', $tipo)";

if($mysqli->query($sql) === true){
    $id = $mysqli->insert_id;
    $_SESSION['usuario_logado'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name; 
    $_SESSION['Sname'] = $Sname;
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $password;
    $_SESSION['idade'] = $idade;
    $_SESSION['endereco'] = $endereco;

    header("location: ../index.php");
}else{
    echo "ERRO ao cadastrar!" . $sql ."<br>". $mysqli->error;
}

$mysqli->close();
