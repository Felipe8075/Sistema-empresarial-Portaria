<?php
if(!isset($_SESSION['Nomeprimeuser'])){
	// echo "Você não pode acessar esta Página sem fazer login!";
	header('Location: https://www.google.com/');
	exit();
}
?>