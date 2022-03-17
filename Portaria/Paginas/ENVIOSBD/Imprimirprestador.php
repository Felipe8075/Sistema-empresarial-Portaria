<?php include_once"../CONECT/conexao.php";

session_start();

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

$numeroAp = $_SESSION['NumApart'];
$empresa = $_SESSION['Noma_empresa'];
$hario = $_SESSION['harario_entrada'];
$data = $_SESSION['data_entrada'];
$prestador = $_SESSION['Nome_prestador'];


?>


<?php
    $nomedocondomínio = 'CONDOMÍNIO MANUEL BUENO';
	$boasvinda = 'Sejam Bem Vindos';
	
	// Carrega seu HTML
	$dompdf->load_html(" 
		<h3 style=' font-family: Tahoma, sans-serif; margin-left: -15;'>$nomedocondomínio</h3>
		<h3 style='margin-left: 25; font-family: Tahoma, sans-serif;'>$boasvinda</h3>
		<h5 style='margin-left: 55; font-family: Tahoma, sans-serif; margin-top: -10; margin-bottom: -28;'>Apartamento</h5>
		<h1 style='margin-left: 35; font-family: Tahoma, sans-serif; font-size: 30;'>$numeroAp</h1>
		<h5 style='margin-left: 50; font-family: Tahoma, sans-serif; margin-top: -5;'>Acesso liberado</h5>
		<h5 style='margin-left: -5; font-family: Tahoma, sans-serif; margin-top: -15; font-size:12;'>$prestador</h5>
		<h5 style='margin-left: -5; font-family: Tahoma, sans-serif; margin-top: -15; font-size:12;'>Data:$data Horário:$hario</h5>

		<h1 style='margin-left: -10; font-family: Tahoma, sans-serif; font-size: 12;'>Empresa: $empresa</h1>

		<h5 style='margin-left: -10; font-family: Tahoma, sans-serif;'>Senhores prestadores de serviços</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>fiquem atentos ao regulamento,</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>normas e procedimentos  interno</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>do condomínio, pois  qualquer dano que</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>venha ser causado a este  condomínio</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>será de sua inteira responsabilidade.</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>Qualquer dúvida ou esclarecimento</h5>
		<h5 style='margin-left: -10; margin-top: -15; font-family: Tahoma, sans-serif;'>procurar a portaria.</h5>


		<h1 style='margin-left: 5; font-family: Tahoma, sans-serif; font-size: 10;'>AGRADECEMOS A COMPREENSÃO!</h1>

		<h5 style='font-family: Tahoma, sans-serif;'>Entregue a permissão na portaria ao</h5>
		<h5 style='font-family: Tahoma, sans-serif;  margin-top: -19;'>sair do condomínio.</h5>

		<h1 style='margin-left: 70; font-family: Tahoma, sans-serif; font-size: 10;'>SAC</h1>
		<h5 style='margin-left: -10; font-family: Tahoma, sans-serif;'>Uniforte.sacservindosemprebem@gmail.com</h5>
		<h5 style='font-family: Tahoma, sans-serif;'>Entregue a permissão na portaria ao</h5>
		<h5 style='font-family: Tahoma, sans-serif; margin-top: -19;'>sair do condomínio.</h5>
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