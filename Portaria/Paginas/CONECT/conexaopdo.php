
<!-- MINHA CONEXÃO ORIENTADA A OBJETO (PDO) -->
<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cadastro";

global $conn;

try{

    $conn = new PDO("mysql:dbname=".$banco."; host=".$servidor, $usuario, $senha);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexão com o banco de dados realizado com sucesso!";

}catch(PDOExeception $e){
    echo"ERRO: ".$e->getMessage();
    exit;
}

?>