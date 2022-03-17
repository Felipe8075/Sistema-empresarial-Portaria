<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbnome = "cadastro";

$conexao = mysqli_connect($servidor,$usuario,$senha,$dbnome);

if(!$conexao){
    die ("Falha na conexão: " .mysqli_connect_error());
}
?>