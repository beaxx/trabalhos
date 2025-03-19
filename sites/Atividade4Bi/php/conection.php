<?php
session_start();
$local = "localhost";
$user = "root";
$senha = "";
$database = "deco";

$mysqli = new mysqli($local, $user, $senha, $database);

if($mysqli->connect_error){
    die("falha ao conectar" .$mysqli->connect_error);
}
$loggedGlobal = 0;
