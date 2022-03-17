<?php include_once"../CONECT/conexao.php";

session_start();

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

$apartamento = filter_input(INPUT_POST, 'apartamento', FILTER_DEFAULT);
$nomedomorador = filter_input(INPUT_POST, 'nomemorador', FILTER_DEFAULT);
$alocado = filter_input(INPUT_POST, 'blocoalocado', FILTER_DEFAULT);
$nascimento = filter_input(INPUT_POST, 'anodenascimento', FILTER_DEFAULT);
$documento = filter_input(INPUT_POST, 'documentomorador', FILTER_DEFAULT);
$sexomorador = filter_input(INPUT_POST, 'sexomanor', FILTER_DEFAULT);
$telefonecasa = filter_input(INPUT_POST, 'telefoneresidencial', FILTER_DEFAULT);
$celularmorador = filter_input(INPUT_POST, 'celulardomorador', FILTER_DEFAULT);
$celularemergencia = filter_input(INPUT_POST, 'celulardeemergencia', FILTER_DEFAULT);
$pordadonumerodeemergencia = filter_input(INPUT_POST, 'portadorcelemergencia', FILTER_DEFAULT);
$tipomorador = filter_input(INPUT_POST, 'tipodemorador', FILTER_DEFAULT);
$deficiente = filter_input(INPUT_POST, 'deficienteportador', FILTER_DEFAULT);
$tipodeficiencia = filter_input(INPUT_POST, 'tipodadeficiencia', FILTER_DEFAULT);
$emailmorador = filter_input(INPUT_POST, 'emaildomorador', FILTER_DEFAULT);
$datadocadastro = filter_input(INPUT_POST, 'cadastrodata', FILTER_DEFAULT);
$idadomorador = filter_input(INPUT_POST, 'moradoridade', FILTER_DEFAULT);

?>


<?php

	// Carrega seu HTML
	$dompdf->load_html(" 
		<h1 style='margin-left: 125
		
		; font-family: Tahoma, sans-serif;'>REGISTRO DO MORADOR</h1>
		<br>
		<p style=' margin-left: 200; font-family: Tahoma, sans-serif; '>DADOS CADASTRAIS</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Bloco e apartamento: $apartamento</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>ano de nascimento: $nascimento</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Nome completo: $nomedomorador</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Lado do bloco: $alocado</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Documento (RG): $documento</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Sexo: $sexomorador</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Telefone: $telefonecasa</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Celular: $celularmorador</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Telefone para emergência: $celularemergencia</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Portador do número de emergência: $pordadonumerodeemergencia</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Tipo de residente: $tipomorador</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Deficiênte ?: $deficiente</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Tipo de deficiência: $tipodeficiencia</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>E-mail: $emailmorador</p> 
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>Data do cadatsro: $datadocadastro</p>
		<p style='font-family: Tahoma, sans-serif; border-bottom: solid #7a7a7a;'>idade: $idadomorador</p>
		<br>
		
		");

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Conprovante de acesso.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

?>
<!-- <h1 style='margin-left: 70; font-family: Tahoma, sans-serif; font-size: 10;'>SAC</h1>
<h5 style='margin-left: -10; font-family: Tahoma, sans-serif;'>Uniforte.sacservindosemprebem@gmail.com</h5>
<h5 style='font-family: Tahoma, sans-serif;'>Entregue a permissão na portaria ao</h5>
<h5 style='font-family: Tahoma, sans-serif; margin-top: -19;'>sair do condomínio.</h5> -->
