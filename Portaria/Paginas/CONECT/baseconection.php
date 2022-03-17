<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbnome = "gestao_uniforte";

$conterconect = mysqli_connect($servidor,$usuario,$senha,$dbnome);

if(!$conterconect){
    die ("Falha na conexão: " .mysqli_connect_error());
}
?>