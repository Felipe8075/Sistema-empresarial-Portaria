<?php
include_once("../conexao.php");


session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './EstruturaComposer/vendor/autoload.php';


$cunsultatableentregas = "SELECT * FROM entregas";
$resulttableentregas = mysqli_query($conexao,$cunsultatableentregas);

$Nome = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM cmoradores WHERE nomeMor = '$Nome'";
$convertbd = mysqli_query($conexao,$sql);
$serultadodaleitura = mysqli_fetch_assoc($convertbd);

$sql = "SELECT * FROM cmoradores";
$consulta = mysqli_query($conexao,$sql);

$buscadoc = '48.526.632-5';

$geradordecod = mb_strtoupper (bin2hex(openssl_random_pseudo_bytes(3)));  //contador 

$selecioneobanco = "SELECT * FROM restrito";
$Resultselectbanco = mysqli_query($conexao,$selecioneobanco);

while($receberRegistros = mysqli_fetch_array($Resultselectbanco)){
    $documentoselecionado = $receberRegistros['documentobloqueado'];
};

?>

<html lang="pt-br">
	<head>
		
	</head>
	<body>

		<table>
			<tr>
				<th><?php echo $geradordecod?></th>
			</tr>
		</table>
			
	</body>
</html>


