<?php 
    session_start();

    include("../../logar/verifica.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include_once"../CONECT/conexao.php";
    require '../EstruturaComposer/vendor/autoload.php';


?>

<?php
$residencia = filter_input(INPUT_POST, 'numapartentreg', FILTER_DEFAULT);
$nomedestinatario = filter_input(INPUT_POST, 'nomeresponce', FILTER_DEFAULT);
$selectcorpack = filter_input(INPUT_POST, 'select-evento-corpacot', FILTER_DEFAULT);
$fornecedormercadoria = filter_input(INPUT_POST, 'forneced', FILTER_DEFAULT);
$selectvolpack = filter_input(INPUT_POST, 'select-vol-pacot', FILTER_DEFAULT);
$descricaopack = filter_input(INPUT_POST, 'descritionentreg', FILTER_DEFAULT);
$dateregister = filter_input(INPUT_POST, 'dataentreg', FILTER_DEFAULT);
$hourregister = filter_input(INPUT_POST, 'horaentregs', FILTER_DEFAULT);
$statusrespo = filter_input(INPUT_POST, 'levarstaus', FILTER_DEFAULT);
$funcionarioceceptor = filter_input(INPUT_POST, 'nome_registrador', FILTER_DEFAULT);
$emailparaenvio = filter_input(INPUT_POST, 'buscaremailmorador', FILTER_DEFAULT);

$geradordecod = mb_strtoupper (bin2hex(openssl_random_pseudo_bytes(3)));

$conexao= mysqli_connect($servidor,$usuario,$senha,$dbnome);

$sql = "INSERT INTO entregas (residence,nomedestino,corpacote,fornecedor,volume,informassion,datarecebida,horarecebido,resposta,recebidopor) VALUES ('$residencia','$nomedestinatario','$selectcorpack','$fornecedormercadoria','$selectvolpack','$descricaopack','$dateregister','$hourregister','$statusrespo','$funcionarioceceptor')";



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
            $mail->addAddress($emailparaenvio, 'Olá');     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'CHEGOU CORRESPONDÊNCIA!';
            $mail->Body    = "Olá <b>$nomedestinatario</b>, você tem uma nova correspondência para 
            retirar na portaria.<br><br>
            Mercadoria: $selectvolpack<br>
            Cor da mercadoria: $selectcorpack<br>
            Remetente/Transportadora: $fornecedormercadoria<br>
            Informações: $descricaopack<br><br>
            <b>IMPORTANTE</b><br>
            SEU CÓDIGO DE RETIRADA É: $geradordecod<br>

            somente responsável ou maior de 18 anos pode
            retirar cumprindo as leis de retirada !";
            $mail->AltBody = "Olá $nomedestinatario, você tem uma nova correspondência para 
            retirar na portaria, importante somente responsável ou maior de 18 anos pode
            retirar cumprindo as leis de retirada !";

            $mail->send();

            header("Location: ../home0232022520portarias458pages5658.php");
        } catch (Exception $e) {
            echo "<script>alert('O seu pedido não pode ser solicitado no momento.');</script>";
        }
    }else{
   echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
   // echo "<script>alert('O síndico não recebou o seu relatório operacional, tente novamente 
   // preenchendo todos os dados corretamente.');window.location = '../index.php';</script>";
}

mysqli_close($conexao);

// $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//     // if(empty($dados['enviaresalvar'])){
//     // var_dump($dados);

//     $inserirdados = "INSERT INTO entregas (residence,nomedestino,corpacote,fornecedor,volume,informassion,datarecebida,horarecebido,resposta,recebidopor) VALUES (:residence, :nomedestino, :corpacote, :fornecedor, :volume, :informassion, :datarecebida, :horarecebido, :resposta, :recebidopor)";
//         $adddados = $conn->prepare($inserirdados);
//         $adddados->bindParam(':residence', $dados['numapartentreg']);
//         $adddados->bindParam(':nomedestino', $dados['nomeresponce']);
//         $adddados->bindParam(':corpacote', $dados['select-evento-corpacot']);
//         $adddados->bindParam(':fornecedor', $dados['forneced']);
//         $adddados->bindParam(':volume', $dados['select-vol-pacot']);
//         $adddados->bindParam(':informassion', $dados['descritionentreg']);
//         $adddados->bindParam(':datarecebida', $dados['dataentreg']);
//         $adddados->bindParam(':horarecebido', $dados['horaentregs']);
//         $adddados->bindParam(':resposta', $dados['imainvieentrega']);
//         $adddados->bindParam(':recebidopor', $dados['nome_registrador']);

//         $adddados->execute();
//         $emailmorador = $dados['buscaremailmorador'];
//         $nomemoradoor = $dados['nomeresponce'];
//         if($adddados->rowCount()){
//         $mail = new PHPMailer(true);
        
//         try {

//             //Server settings (Configurações do servidor)
//             // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output (Ativar saída de depuração detalhada)
//             $mail->CharSet = 'UTF-8';
//             $mail->isSMTP();                                            //Send using SMTP (Enviar usando SMTP)
//             $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through  (Defina o servidor SMTP para enviar)
//             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication  (Habilitar autenticação SMTP)
//             $mail->Username   = '46c326cd6493a8';                     //SMTP usernaNomme  (nome de usuário SMTP)
//             $mail->Password   = 'e94ca98141d6ad';                               //SMTP password (Senha SMTP)
//             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption (Ativar criptografia TLS implícita)
//             $mail->Port       = 2525;                                      //potrt (Porta)


//             //Recipients
//             $mail->setFrom('fellipesouzasilvaa@gmail.com', 'PORTARIA');
//             $mail->addAddress($emailmorador, 'Olá');     //Add a recipient
            
//             //Content
//             $mail->isHTML(true);                                  //Set email format to HTML
//             $mail->Subject = 'CHEGOU CORRESPONDÊNCIA!';
//             $mail->Body    = "Olá <b>$nomemoradoor</b>, você tem uma nova correspondência para 
//             retirar na portaria, <b>importante</b> somente responsável ou maior de 18 anos pode
//             retirar cumprindo as leis de retirada !";
//             $mail->AltBody = "Olá $nomemoradoor, você tem uma nova correspondência para 
//             retirar na portaria, importante somente responsável ou maior de 18 anos pode
//             retirar cumprindo as leis de retirada !";

//             $mail->send();

//             echo "<script>alert('O morador foi avisado!.');window.location = '../home0232022520portarias458pages5658.php';</script>";
//         } catch (Exception $e) {
//             echo "<script>alert('O seu pedido não pode ser solicitado no momento.');</script>";
//         }
//     }else{
//         echo "<script>alert('O morador não foi avisado e não foi registrado no sistema, tente novamente 
//         preenchendo todos os dados corretamento.');window.location = 'pageentregs.php';</script>";
//     }
?>

<!-- "<script>alert('Correspondência registrada!'); window.location = 'menuserv.php?p=pageentregs';</script>" -->