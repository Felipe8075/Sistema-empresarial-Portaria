<?php include_once"../CONECT/conexao.php";

session_start();

$buscadoc = filter_input(INPUT_POST, 'doc', FILTER_DEFAULT);
$buscname = filter_input(INPUT_POST, 'nome-visita', FILTER_DEFAULT);

$selecioneobancoo = "SELECT * FROM visitas WHERE documento = '$buscadoc' AND nomevisita = '$buscname'";
$Resultselectbancoo = mysqli_query($conexao,$selecioneobancoo);
$rowbancvisit = mysqli_num_rows($Resultselectbancoo);

while($receberRegistross = mysqli_fetch_array($Resultselectbancoo)){
    $documentoselecionado = $receberRegistross['documento'];
	$namebuscavist = $receberRegistross['nomevisita'];
};

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();
?>

<?php
$selecioneobanco = "SELECT * FROM restrito WHERE nomebloquado = '$buscname' AND documentobloqueado = '$buscadoc'";
$Resultselectbanco = mysqli_query($conexao,$selecioneobanco);
$row = mysqli_num_rows($Resultselectbanco);	
if($row  != 0 ){
	while($receberRegistros = mysqli_fetch_array($Resultselectbanco)){
		$nome = $receberRegistros['nomebloquado'];
	};
	echo "<script>alert('ATENÇÃO! $nome NÃO TEM PERMISSÃO PARA ACESSAR O CONDOMÍNIO'); window.location = '../home0232022520portarias458pages5658.php';</script>";	
}else{
	if( $rowbancvisit != 0){
		echo "Visitante já tem casdastro no sistema!";
		//echo "<script>alert('Visitante já tem Cadastro no sistema!.');window.location = '../home0232022520portarias458pages5658.php';</script>";
	}else{
		if(isset($_FILES['fotoo']))
		{
			date_default_timezone_set("Brazil/East");

			$ext = strtolower(substr($_FILES['fotoo']['name'],-4));

			$new_name = date("Y.m.d-i") . '.jpg';
			$dir = '../../Galeria/Fotovisitantes/';

			move_uploaded_file($_FILES['fotoo']['tmp_name'], $dir.$new_name);
			
		}
		$tipo = filter_input(INPUT_POST, 'visita', FILTER_DEFAULT);	
		$nomevisitan = filter_input(INPUT_POST, 'nome-visita', FILTER_DEFAULT);	
		$ducments = filter_input(INPUT_POST, 'doc', FILTER_DEFAULT);	
		$contatoo = filter_input(INPUT_POST, 'contatos', FILTER_DEFAULT);	
		$nomecarro = filter_input(INPUT_POST, 'nomecar', FILTER_DEFAULT);	
		$marca = filter_input(INPUT_POST, 'marcanome', FILTER_DEFAULT);	
		$cor = filter_input(INPUT_POST, 'carcor', FILTER_DEFAULT);	
		$placa = filter_input(INPUT_POST, 'placa', FILTER_DEFAULT);	
		$horentrada = filter_input(INPUT_POST, 'entradahora', FILTER_DEFAULT);	
		$imagem = $new_name; //variavél de salvamento em duplo banco - A Foto do vitante
		$Enviarbtn = filter_input(INPUT_POST, 'imagbtnliberar', FILTER_DEFAULT);	
		$apartamento = filter_input(INPUT_POST, 'apartamentonul', FILTER_DEFAULT);	
		$nomedomorador = filter_input(INPUT_POST, 'nomedomorador', FILTER_DEFAULT);	
		$empresa = filter_input(INPUT_POST, 'empresa', FILTER_DEFAULT);	
		$sevicos = filter_input(INPUT_POST, 'servicos', FILTER_DEFAULT);	
		$datadeentrada = filter_input(INPUT_POST, 'dataentrada', FILTER_DEFAULT);	
		$identifica = filter_input(INPUT_POST, 'Identificação', FILTER_DEFAULT);	
		$botão = filter_input(INPUT_POST, 'btnsair', FILTER_DEFAULT);	


		$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);


		mysqli_select_db($conexao, 'dbname');
		$sql = "INSERT INTO visitas (tipovisita,nomevisita,documento,contatovisita,nomecarro,marcacarro,corcarro,placa,entradahora,imagemvisita,imgbtnentredavisita, visit_empresa, visit_tipe_servico) VALUES ('$tipo','$nomevisitan','$ducments','$contatoo','$nomecarro','$marca','$cor','$placa','$horentrada','$imagem','$Enviarbtn','$empresa','$sevicos')";
		$dadosliberar = "INSERT INTO registrosdeentrada (cracha, Apartamento, moradorliberou, nomevisita, documentovisita, telefonevisita, nomedoveiculo, marcadoveidulo, placadoveiculo, cordoveiculo, empresa, servicos, datadeentrada, horadeentrada, foto, tipodavisita, button, abaprestador) VALUES ('$identifica','$apartamento','$nomedomorador','$nomevisitan','$ducments','$contatoo','$nomecarro','$marca','$placa','$cor','$empresa','$sevicos','$datadeentrada','$horentrada','$imagem','$tipo','$botão','$tipo')";



		if (mysqli_query($conexao, $sql)) {
			// Armazenar dados em seções para utilizar e outras paginas
			if($tipo != 'Prestador'){
				echo "<script>alert('Visita liberada!'); window.location = '../home0232022520portarias458pages5658.php';</script>";
			}else{
			$_SESSION['NumApart'] = $apartamento;
			$_SESSION['Noma_empresa'] = $empresa;
			$_SESSION['harario_entrada'] = $horentrada;
			$_SESSION['data_entrada'] = $datadeentrada;
			$_SESSION['Nome_prestador'] = $nomevisitan;

			header("Location: Imprimirprestador.php");
			};
		}else{
			echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
		}
		if (mysqli_query($conexao, $dadosliberar)) {
			// echo "<script>alert('Visitante  liberado com sucesso!');</script>";
		}else{
			echo "Deu erro: " . $dadosliberar . "<br>" . mysqli_error ($conexao);
		}
	};
};
mysqli_close($conexao);
?> 


