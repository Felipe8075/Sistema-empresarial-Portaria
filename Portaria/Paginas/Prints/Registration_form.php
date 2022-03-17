<?php include_once"../CONECT/conexao.php";

session_start();

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();
?>


<?php

	// Carrega seu HTML
	$dompdf->load_html(" 
		<h1 style='margin-left: 100; font-family: Tahoma, sans-serif;'>FORMULÁRIO DE CADASTRO</h1>
		<br>
		<p style=' margin-left: 200; font-family: Tahoma, sans-serif;'>DADOS CADASTRAIS</p>
		<p style='font-family: Tahoma, sans-serif;'>Bloco e apartamento: ___________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Data de nascimento: ___________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Nome completo: _______________________________________________________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Lado do bloco: ________________________________________________________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Documento (RG): _____________________________. Sexo: __________________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Telefone: __________________________. Celular: __________________________.</p> 
		<p style='font-family: Tahoma, sans-serif;'>Telefone para emergência: ____________________. Portador: _____________________________.</p> 
		<p style='font-family: Tahoma, sans-serif;'>Tipo de residente: ___________________________. Deficiênte ?: __________.</p> 
		<p style='font-family: Tahoma, sans-serif;'>Tipo de deficiência: ____________________________________________________________.</p> 
		<p style='font-family: Tahoma, sans-serif;'>E-mail (verdadeiro): ____________________________________________________________.</p> 
		<br>
		<p style=' margin-left: 200; font-family: Tahoma, sans-serif;'>DADOS DO VEÍCULO</p>
		<p style='font-family: Tahoma, sans-serif;'>Vaga do veículo: __________________________. Nome do veículo: ___________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Marca do veículo: __________________________. Cor do veículo: ___________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Placa do veículo: __________________________. Ano do veículo: ___________________.</p>
		<br>
		<p style=' margin-left: 205; font-family: Tahoma, sans-serif;'>DADOS DO ANIMAL</p>
		<p style='font-family: Tahoma, sans-serif;'>Nome do animal: __________________________. Tipo de animal: ___________________.</p>
		<p style='font-family: Tahoma, sans-serif;'>Raça do animal: __________________________.
		<p style=' margin-left: 200; font-family: Tahoma, sans-serif;'>INFORMAÇÕES</p>
		<p style='font-family: Tahoma, sans-serif; font-size:12; Color: Red;'>Cada morador deve nos enviar foto ou cópia escaneada do RG e a sua selfie, coloque a baixa de cada selfie nome, bloco e apartamento para agilizar o seu cadastro, veículos e pets também serão cadastrados envie-nos as fotos de ambos no whatsapp (11)00000-0000.</p>
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
