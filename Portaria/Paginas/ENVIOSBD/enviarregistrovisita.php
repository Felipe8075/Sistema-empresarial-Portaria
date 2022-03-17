<?php include_once"../CONECT/conexao.php";

$verifyname = filter_input(INPUT_POST, 'nomedavisita', FILTER_DEFAULT);
$verifydocument = filter_input(INPUT_POST, 'documento', FILTER_DEFAULT);


$selecioneobanco = "SELECT * FROM restrito WHERE nomebloquado = '$verifyname' AND documentobloqueado = '$verifydocument'";
$Resultselectbanco = mysqli_query($conexao,$selecioneobanco);
$row = mysqli_num_rows($Resultselectbanco);	
if($row  != 0 ){
	while($receberRegistros = mysqli_fetch_array($Resultselectbanco)){
		$nome = $receberRegistros['nomebloquado'];
	};

	echo "<script>alert('ATENÇÃO! $nome NÃO TEM PERMISSÃO PARA ACESSAR O CONDOMÍNIO'); window.location = '../home0232022520portarias458pages5658.php';</script>";
	// echo "ATENÇÃO!<br>$nome<br> NÃO TEM PERMISSÃO PARA ACESSAR O CONDOMÍNIO<br><hr>";	
}else{
	$identifica = filter_input(INPUT_POST, 'Identificação', FILTER_DEFAULT);	
	$apartamento = filter_input(INPUT_POST, 'apartamentonul', FILTER_DEFAULT);	
	$nomedomorador = filter_input(INPUT_POST, 'nomedomorador', FILTER_DEFAULT);	
	$nomevista = filter_input(INPUT_POST, 'nomedavisita', FILTER_DEFAULT);	
	$documento = filter_input(INPUT_POST, 'documento', FILTER_DEFAULT);	
	$contato = filter_input(INPUT_POST, 'contato', FILTER_DEFAULT);	
	$nomecarro = filter_input(INPUT_POST, 'nomedocarro', FILTER_DEFAULT);	
	$marcacarro = filter_input(INPUT_POST, 'marcadocarro', FILTER_DEFAULT);	
	$placacarro = filter_input(INPUT_POST, 'placadocarro', FILTER_DEFAULT);	
	$corcarro = filter_input(INPUT_POST, 'cordocarro', FILTER_DEFAULT);	
	$empresa = filter_input(INPUT_POST, 'empresa', FILTER_DEFAULT);	
	$sevicos = filter_input(INPUT_POST, 'servicos', FILTER_DEFAULT);	
	$datadeentrada = filter_input(INPUT_POST, 'dataentrada', FILTER_DEFAULT);	
	$horadeentrada = filter_input(INPUT_POST, 'horaentrada', FILTER_DEFAULT);	
	$imagem = filter_input(INPUT_POST, 'afoto', FILTER_DEFAULT);	
	$tipodevisita = filter_input(INPUT_POST, 'tipodevisita', FILTER_DEFAULT);	
	$botão = filter_input(INPUT_POST, 'btnsair', FILTER_DEFAULT);	

	
		
		$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

		mysqli_select_db($conexao, 'dbname');
		$sql = "INSERT INTO registrosdeentrada (cracha,Apartamento,moradorliberou,nomevisita,documentovisita,telefonevisita,nomedoveiculo,marcadoveidulo,placadoveiculo,cordoveiculo,empresa,servicos,datadeentrada,horadeentrada,foto,tipodavisita,button,abaprestador) VALUES ('$identifica','$apartamento','$nomedomorador','$nomevista','$documento','$contato','$nomecarro','$marcacarro','$placacarro','$corcarro','$empresa','$sevicos','$datadeentrada','$horadeentrada','$imagem','$tipodevisita','$botão','$tipodevisita')";
		if (mysqli_query($conexao, $sql)) {
			if($tipodevisita != 'Prestador'){
				echo "<script>alert('Visita liberada!'); window.location = '../home0232022520portarias458pages5658.php';</script>";
			}else{
				$_SESSION['NumApart'] = $apartamento;
				$_SESSION['Noma_empresa'] = $empresa;
				$_SESSION['harario_entrada'] = $horadeentrada;
				$_SESSION['data_entrada'] = $datadeentrada;
				$_SESSION['Nome_prestador'] = $nomevista;
				header("Location: Imprimirprestador.php");
			}
		}else{
			echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
		}
};

?>


