<?php
session_start();
include_once("../conexao.php");
$id = filter_input (INPUT_GET, 'resultdados');
$sql = "SELECT * FROM entregas WHERE id = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

$tabela = "SELECT * FROM entregas";
$dadoslimpo =  mysqli_query($conexao,$tabela);

$testedenome = $_SESSION['nome'];



?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS/pages.css">
    <link rel="stylesheet" href="../CSS/fonts.css">
    <title>Retirar</title>

</head>

<body>
    <div class="wapper_informa_entragas">
        <div class="header_informa_entregas">
            Retirada de mercadoria
        </div>
        <div class="content_informa_entregas">
            <div class="pag_informa_entregas">
                <div>
                    <p>Residência: </p>
                    <p> Nome do morador: </p>
                    <p> Cor do Volume:</p>
                    <p> Remetente/Fornecedor:</p>
                    <p> Volume:</p>
                    <p> Data de Chegada: </p>
                    <p> Horário de Chegada:</p>
                    <p> Recebedor:</p>
                    <p> Descrição:</p>
                </div>
                <div>
                    <p><?php echo $lenderesult['residence'];?></p>
                    <p><?php echo $lenderesult['Blocoentregs']; ?></p>
                    <p><?php echo $lenderesult['nomedestino']; ?></p>
                    <p><?php echo $lenderesult['corpacote']; ?></p>
                    <p><?php echo $lenderesult['fornecedor']; ?></p>
                    <p><?php echo $lenderesult['volume']; ?></p>
                    <p><?php echo $lenderesult['datarecebida']; ?></p>
                    <p><?php echo $lenderesult['horarecebido']; ?></p>
                    <p> <?php echo $testedenome;?></p>
                    <p><?php echo $lenderesult['informassion']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="ENVIOSBD/registroentregaretirada.php" enctype="multipart/form-data">
        <?php  
            date_default_timezone_set('America/Sao_Paulo'); 
            date_default_timezone_set("Brazil/East");
        ?>
        <div class="input_escondido">
            <input type="text" name="apartamentoo" value="<?php echo $lenderesult['residence']; ?>" hidden>
            <input type="text" name="blocoo" value="<?php echo $lenderesult['Blocoentregs']; ?>" hidden>
            <input type="text" name="destinoo" value="<?php echo $lenderesult['nomedestino']; ?>" hidden>
            <input type="text" name="pacotecorr" value="<?php echo $lenderesult['corpacote']; ?>" hidden>
            <input type="text" name="fornecedorloj" value="<?php echo $lenderesult['fornecedor']; ?>" hidden>
            <input type="text" name="volu" value="<?php echo $lenderesult['volume']; ?>" hidden>
            <input type="text" name="descri" value="<?php echo $lenderesult['informassion']; ?>" hidden>
            <input type="text" name="recebidadata" value="<?php echo $lenderesult['datarecebida']; ?>" hidden>
            <input type="text" name="recebidahora" value="<?php echo $lenderesult['horarecebido']; ?>" hidden>
            <input type="text" name="aimg" value="<?php echo $lenderesult['fotografiaentregs']; ?>" hidden>

            <input type="text" name="entregadta" value="<?php echo date('d/m/Y');?>" hidden>
            <input type="text" name="entregahra" value="<?php echo date('H:i:s');?>" hidden>

            <input type="text" name="statuus" hidden>
            <input type="text" name="id" value="<?php echo $lenderesult['id']; ?>" hidden>

            <input type="text" name="imgentrega" value="" hidden>
            <input type="text" name="imgconfirm" value="btnentregaconfimada.png" hidden>

            <div class="inputs_informa_entregas">
                <div class="contentinput">
                    <div>
                        <input type="text" name="nomeretirada" class="inputs_quem_retirou"
                            placeholder="Nome do Morador que Retirou ?" required>
                    </div>
                    <div>
                    <input type="text" name="nomeporteira" class="inputs_quem_entregou" value="<?php echo $testedenome;?>"
                        placeholder="Funcionário que esta Entregando ?" required>
                    </div>
                </div>    
            </div>


            <div class="button_informa_entrega">
                <input type="submit" class="btn btn-warning confirm" value="Confirmar"></a>
                <a href="home0232022520portarias458pages5658.php"><button type="button" class="btn btn-secondary saindo">Voltar</button></a>
            </div>
        </div>
    </form>

    </div>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>

</html>