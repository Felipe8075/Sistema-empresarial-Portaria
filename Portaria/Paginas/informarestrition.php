<?php
session_start();
include_once("../conexao.php");
$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM restrito WHERE ID = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <title>Portaria</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap');
    </style>

</head>
<body>
<main>
    <div class="wapper_informa_registro_do_bloquado">
        <div class="heider_informa_registro_do_bloquado">
            <div class="fotografiadobloq">
                <img src="../Galeria/Fotodobloqueado/<?php echo $lenderesult['fotografia'];?>" alt="">
            </div>
            <div class="imgborda">
                <img src="../Galeria/imagensdiversas/mouduranegada.png" alt="">
            </div>
            <div class="title_acesso_negado">
                <h1 class="fill">Acesso Negado</h1>
            </div>
            <div class="minititle">
                <h3>Dados do bloqueado(a)</h3>
            </div>
            <div class="conteudo_dobloq">
                <p class="resedencia_vermelha">Residência: <?php echo $lenderesult['apartamento'];?></p> 
                <p>Restrição: <?php echo $lenderesult['restri1'];?><?php echo $lenderesult['restri2'];?></p>
                <p>Nome: <?php echo $lenderesult['nomebloquado'];?></p>
                <p>Documento: <?php echo $lenderesult['documentobloqueado'];?></p>
                <p class="descrition_bloqueio" id="rolagemmsgdescribloq"><?php echo $lenderesult['descri'];?></p>
            </div>
        </div>
    </div>
</main>
</body>
</html>