<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbnome = "gestao_uniforte";

$conexao = mysqli_connect($servidor,$usuario,$senha,$dbnome);

if(!$conexao){
    die ("Falha na conexão: " .mysqli_connect_error());
}
?>