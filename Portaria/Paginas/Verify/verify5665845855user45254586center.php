<?php 
session_start();

include_once("../CONECT/baseconection.php");

//Variáveis com o nome o email e a senha do usuário

// $nomemorador = filter_input(INPUT_POST,'nomedomorador',FILTER_DEFAULT);
$user = filter_input (INPUT_GET, 'inviarid');

$selectibanc = "SELECT * FROM usuarios WHERE emaail = '$user' LIMIT 1"; // selecinando tabela no banco de dados
$result_select = mysqli_query($conterconect, $selectibanc);
$row_select = mysqli_num_rows($result_select);

// echo "Registros encontrados no banco com ele emael: $row_select"

if($row_select > 0){
	while($reflshdados = mysqli_fetch_array($result_select)){
		$nome = $reflshdados['Nomeesegundo'];
	};
	
	$_SESSION['Nomeprimeuser'] = $nome;
	header('Location: ../Records/cadastros58245659582geristros4523112.php');
	echo "Seja bem vindo $namesession";
}else{
	echo "Você não tem ascesso PERMITIDO!";
}

?>