<?php 

include_once("../conexao.php");

$sql = "select * FROM cmoradores";
$consulta = mysqli_query($conexao,$sql);


?>


<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Stylemonile.css">
    <script src="../functions.js"></script>



    <title></title>
</head>

<body onload="mostradivatualizarfoto()">

    <div class="conteiner">
        <p>
            Para sua Segurança e registros qualquer alteração a partir deste momento é de sua responsabilidade.
        </p>

        <?php
                $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";
            
                $cunsultatablepet = "SELECT * FROM cmoradores WHERE documento LIKE '$filtrandoo'";
                $consulta = mysqli_query($conexao,$cunsultatablepet);
            ?>
        <br>
        <form method="post" class="formulari-busca-home">
            <input type="text" id="doocumentobloc" placeholder="Digite o seu RG" name="filtra-busca"
                class="docconfirmapararfoto" autocomplete="off" maxlength="12"
                onkeyup="Mascara_rg('##.###.###-#', this)">
        </form>



        
            <?php
            while($receberRegistros = mysqli_fetch_array($consulta)){
            $nome = $receberRegistros['nomeMor'];
            $fot = $receberRegistros['fotografia'];
            $email= $receberRegistros['emailMor'];
            $telefone = $receberRegistros['teleRes'];
            $celular = $receberRegistros['teleCel1'];
            $senha = $receberRegistros['nomeDef'];
            $id = $receberRegistros['codigo'];
            ?>
        <form method="post" action="UploadDados.php">                
            <input name="id" class="esconder_input" type="text"value="<?php echo $id?>">
            <p class="paragrefo_confirm"><?php echo $nome;?></p><input id="inputcomnomedomor" class="esconder_input" type="text" value="<?php echo $nome?>">
            <p class="dados_editaveis"> Dados Alteráveis</p>
            <h4>Email</h4>
            <input name="email" type="text" value="<?php echo $email?>">
            <h4>Telefone Residêncial</h4>
            <input name="telef-residencial" type="text" value="<?php echo $telefone?>">
            <h4>Telefone Celular</h4>
            <input name="telef-celular1" type="text" value="<?php echo $celular?>">
            <h4>Senha</h4>
            <input name="grau" type="text" value="<?php echo $senha?>">
            <img class="imagem_do_morador" src="../Galeria/Fotomoradores/<?php echo $fot;?>" alt="">

            <?php }; ?>
            <button class="btn_atualizar_dados">Salvar Dados</button>
        </form>

        <input id="esconder_input" class="esconder_input" type="text" value="<?php echo $fot;?>">

        <div id="form_atualizar_foto">
            <form method="post" action="UploadFoto.php" enctype="multipart/form-data">
                <input name ="id" class="esconder_input" type="text"value="<?php echo $id?>">
                <input name="foto" type="file" class="carregar_foto">
                <button class="btn_atualizar_foto">Salvar Foto</button>
            </form>
        </div>
</body>

</html>