<?php
include 'conection.php';  

if (isset($_GET['id'] )){
    $id = $_GET['id'];
    $sql = "DELETE FROM produtos WHERE id = $id";
    if($mysqli->query($sql) === TRUE){
        echo "Registro excluído com sucesso!";
    }else{
        echo "Erro ao excluir registro:" .$mysqli->error; 
    }

    $mysqli->close();
    header("Location: painel.php#produtos");
}
