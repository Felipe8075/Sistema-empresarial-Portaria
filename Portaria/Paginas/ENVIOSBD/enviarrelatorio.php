<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once"../CONECT/conexao.php";
require '../EstruturaComposer/vendor/autoload.php';

$nivelacesso = "SELECT * FROM user WHERE acesso = 'Level1'";
$resultadodaconsulta = mysqli_query($conexao,$nivelacesso);

while($receberRegistros = mysqli_fetch_array($resultadodaconsulta)){
    $email = $receberRegistros['Emaail'];
};

$email2 = 'teste@gmail.com'

?>


<?php

$data = filter_input(INPUT_POST, 'datarelatorio', FILTER_DEFAULT); 
$nomecondominio = filter_input(INPUT_POST, 'nomecondiminio', FILTER_DEFAULT);
$nomefuncionario = filter_input(INPUT_POST, 'nomefuncionario', FILTER_DEFAULT);
$horaentrada = filter_input(INPUT_POST, 'horaentrada', FILTER_DEFAULT);
$horasaida = filter_input(INPUT_POST, 'horasaida', FILTER_DEFAULT);
$item1 = filter_input(INPUT_POST, 'qtdnextel', FILTER_DEFAULT);
$item2 = filter_input(INPUT_POST, 'qtdCarregado', FILTER_DEFAULT);
$item3 = filter_input(INPUT_POST, 'qtdInterfone', FILTER_DEFAULT);
$item4 = filter_input(INPUT_POST, 'qtFrigobar', FILTER_DEFAULT);
$item5 = filter_input(INPUT_POST, 'qtdMicro', FILTER_DEFAULT);
$item6 = filter_input(INPUT_POST, 'qtdLivro', FILTER_DEFAULT);
$item7 = filter_input(INPUT_POST, 'qtdMonitores', FILTER_DEFAULT);
$item8 = filter_input(INPUT_POST, 'qtdMouse', FILTER_DEFAULT);
$item9 = filter_input(INPUT_POST, 'qtdTeclado', FILTER_DEFAULT);
$item10 = filter_input(INPUT_POST, 'qtdCPU', FILTER_DEFAULT);
$item11 = filter_input(INPUT_POST, 'qtdGuarda', FILTER_DEFAULT);
$item12 = filter_input(INPUT_POST, 'qtdRelogio', FILTER_DEFAULT);
$item13 = filter_input(INPUT_POST, 'qtdQHTs', FILTER_DEFAULT);
$item14 = filter_input(INPUT_POST, 'qtdDVR', FILTER_DEFAULT);
$item15 = filter_input(INPUT_POST, 'qtdVentilador', FILTER_DEFAULT);
$item16 = filter_input(INPUT_POST, 'Itensnaolistado', FILTER_DEFAULT);
$quanticameras = filter_input(INPUT_POST, 'qtdcameras', FILTER_DEFAULT);
$quantichaves = filter_input(INPUT_POST, 'qtdchaves', FILTER_DEFAULT);
$contagemcorresp = filter_input(INPUT_POST, 'contagemcorrespprot', FILTER_DEFAULT);
$contagemcorrepentr = filter_input(INPUT_POST, 'contagemcorrespentre', FILTER_DEFAULT);
$contagemvisitas = filter_input(INPUT_POST, 'contagemvisiprot', FILTER_DEFAULT);
$contagemvisitassairam = filter_input(INPUT_POST, 'contagemvisijasai', FILTER_DEFAULT);
$ocorrencias = filter_input(INPUT_POST, 'relatarocorencia', FILTER_DEFAULT);
$rende1 = filter_input(INPUT_POST, 'nomeporte1', FILTER_DEFAULT);
$rende2 = filter_input(INPUT_POST, 'nomeporte2', FILTER_DEFAULT);


$conexao= mysqli_connect($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbnome');

$sql = "INSERT INTO relatoriosoperacionais (datarelatorio, 	nomdocondominio, nomefuncionaatual, horaentrada, horasaida, Nextel, Carregador, Interfone, Frigobar, Mocroondas, Livroocorrencia, Monitores, Mouse, Teclado, CPU, Guardachuva, RelogioPontos, QHTs, DVR, Ventilador, Maisitens, quantcameras, quantchaves, contcorrespentrada, contcorrespentregue, contvisitasentrada, contvisitassairam, ocorrenciasatual, rende1, rende2) VALUES ('$data','$nomecondominio','$nomefuncionario','$horaentrada','$horasaida','$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13','$item14','$item15','$item16','$quanticameras','$quantichaves','$contagemcorresp','$contagemcorrepentr','$contagemvisitas','$contagemvisitassairam','$ocorrencias','$rende1','$rende2')";

if (mysqli_query($conexao, $sql)){
    $mail = new PHPMailer(true);
        
        try {

            //Server settings (Configurações do servidor)
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output (Ativar saída de depuração detalhada)
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            //Send using SMTP (Enviar usando SMTP)
            $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through  (Defina o servidor SMTP para enviar)
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication  (Habilitar autenticação SMTP)
            $mail->Username   = '46c326cd6493a8';                     //SMTP usernaNomme  (nome de usuário SMTP)
            $mail->Password   = 'e94ca98141d6ad';                               //SMTP password (Senha SMTP)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption (Ativar criptografia TLS implícita)
            $mail->Port       = 2525;                                      //potrt (Porta)


            //Recipients
            $mail->setFrom('fellipesouzasilvaa@gmail.com', 'PORTARIA');
            $mail->addAddress("$email", 'Olá');     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "RELATÓRIO OPERACIONAL PORTARIA 
            CONDOMÍNIO $nomecondominio";
            $mail->Body    = "<br>Data da operação: <b>$data</b></br>
            <br>Plantonista Atual: <b>$nomefuncionario</b></br>
            <br>Horário de Entrada: <b>$horaentrada</b></br>
            <br>Horário de Saída: <b>$horasaida</b></br>
            <br>Aparelhos Nextel: <b>$item1</b></br>
            <br>Carregadores: <b>$item2</b></br>
            <br>Interfone: <b>$item3</b></br>
            <br>Frigobar: <b>$item4</b></br>
            <br>Micro Ondas: <b>$item5</b></br>
            <br>Livros de Ocorrência: <b>$item6</b></br>
            <br>Monitores: <b>$item7</b></br>
            <br>Mouse: <b>$item8</b></br>
            <br>Teclado: <b>$item9</b></br>
            <br>CPU: <b>$item10</b></br>
            <br>Guarda Chuva: <b>$item11</b></br>
            <br>Relógios de ponto: <b>$item12</b></br>
            <br>QHT's: <b>$item13</b></br>
            <br>DVR: <b>$item14</b></br>
            <br>Ventiladores: <b>$item15</b></br>
            <br>Demais itens: <b>$item16</b></br>
            <br>Quantidade de câmeras em funcionamento <b>$quanticameras</b></br>
            <br> Quantidade de Chaves <b>$quantichaves</b></br>
            <br> Correspondências registradas hoje: <b>$contagemcorresp</b></br>
            <br> Correspondências entregues hoje: <b>$contagemcorrepentr</b></br>
            <br> Visitantes que deram entrada hoje: <b>$contagemvisitas</b></br>
            <br> Visitantes que deram saída hoje: <b>$contagemvisitassairam</b></br>
            <br> Ocorrêcias do dia <b>$ocorrencias</b></br> 
            <br> Passagem de posto para <b>$rende1 $rende2</b></br>  ";
            $mail->AltBody = "Troca de plantão acoenteceu neste momento !";

            $mail->send();
            
            echo "<script>alert('Relatório salvo e enviado a coordenação!'); window.location = '../home0232022520portarias458pages5658.php'; </script>";
            // echo "<script>alert('Relatório salvo e enviado a coordenação!.');window.location = '../home0232022520portarias458pages5658.php;</script>";
        } catch (Exception $e) {
            echo "<script>alert('O relatório não esta sendo enviado verifique todas as informações e certifique-se de que esta tudo correto.');</script>";
        }
        
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
    // echo "<script>alert('O síndico não recebou o seu relatório operacional, tente novamente 
    // preenchendo todos os dados corretamente.');window.location = '../index.php';</script>";
}

mysqli_close($conexao);

?>