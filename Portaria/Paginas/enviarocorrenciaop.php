<?php 

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once"../conexao.php";
require './EstruturaComposer/vendor/autoload.php';


$nivelacesso = "SELECT * FROM user WHERE acesso = 'Level1'";
$resultadodaconsulta = mysqli_query($conexao,$nivelacesso);

while($receberRegistros = mysqli_fetch_array($resultadodaconsulta)){
    $email = $receberRegistros['Emaail'];
};

?>


<?php

$dataocorrencia = $_POST["dataocorrencia"];
$horaocorrencia = $_POST["horaocorrencia"];
$nomecolaborador = $_POST["colaboradorname"];
$nomecondominio = $_POST["namedocondominio"];
$tipodeocorrencia = $_POST["select_tipodeocorrencia"];
$menssagem = $_POST["message"];
$stattus = $_POST["situacao"];


$conexao= mysqli_connect($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbnome');

$sql = "INSERT INTO ocorrenciasrelatadas (datta, horario, nomedocolaborador, nomedocondominio, tipoocorrencia, menssagems, statuus) VALUES ('$dataocorrencia','$horaocorrencia','$nomecolaborador','$nomecondominio','$tipodeocorrencia','$menssagem','$stattus')";

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
            $mail->Subject = 'NOVA OCORRÊNCIA RELATA NA PORTARIA!';
            $mail->Body    = "O colaborador '$nomecolaborador' relatou que <br><b>'$menssagem'</b> !";
            $mail->AltBody = "Troca de plantão acoenteceu neste momento !";

            $mail->send();

            echo "<script>alert('A ocorrência foi salva e enviada a coordenação!.');window.location = '../index.php';</script>";
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