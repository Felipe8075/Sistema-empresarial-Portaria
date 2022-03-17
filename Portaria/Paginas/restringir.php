<?php
include_once("../conexao.php");

// BUSCA DE DADOS PARA AS INFORMAÇÕES DE MORADORES E ADICIONAR RESTRIÇÕES

$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM cmoradores WHERE codigo = '$id'";
$convertbd = mysqli_query($conexao,$sql);
$serultadodaleitura = mysqli_fetch_assoc($convertbd);

// FIM DA BUSCA DE DADOS PARA AS INFORMAÇÕES DE MORADORES E ADICIONAR RESTRIÇÕES

date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <script src="../functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <title>Portaria</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        
    </style>

</head>
    <body>
<form method="POST" action="enviarrestricaobd.php" enctype="multipart/form-data">
    <main>
        <div class="conteiner">
            <div class="wappercontent">
                <div class="title">
                        <h4>Restingir acesso a visitante</h4>
                </div>
                <div class="content">
                    <?php  //Formtação de data para o brasil
                        date_default_timezone_set('America/Sao_Paulo'); 
                        date_default_timezone_set("Brazil/East");
                    ?>
                    <input name="ID" type="text" value="<?php echo $serultadodaleitura['codigo']; ?>" hidden>
                    <p>Residência: <?php echo $serultadodaleitura['apt']; ?></p><input name="apartamento" type="text" value="<?php echo $serultadodaleitura['apt']; ?>" hidden>
                    <p>Morador: <?php echo $serultadodaleitura['nomeMor']; ?></p><input name="nomedomorador" type="text" value="<?php echo $serultadodaleitura['nomeMor']; ?>" hidden>
                    <p>Telefona da residência: <?php echo $serultadodaleitura['teleRes'];?><input name="telefoneresidencia" type="text" value="<?php echo $serultadodaleitura['teleRes']; ?>" hidden>
                    <p>Celular: <?php echo $serultadodaleitura['teleCel1']?></p><input type="text" name="celular" value="<?php echo $serultadodaleitura['teleCel1']; ?>" hidden>
                    <p>E-mail: <?php echo $serultadodaleitura['emailMor'];?></p><input type="text" name="emaildomorador" value="<?php echo $serultadodaleitura['emailMor']; ?>" hidden>
                    
                    <input name="imgdeatent"type="text" value="atent.png" hidden>

                    <h5>Informações da pessoa restrita</h5>

                    <p><select name="selecione_tipo_restri1" id="">
                        <option value="">Selecione o Tipo de restrição</option>
                        <option value="SAÍDA APENAS COM PERMISSÃO">SAÍDA APENAS COM PERMISSÃO</option>
                        <option value="MEDIDA PROTETIVA">MEDIDA PROTETIVA</option>
                        <option value="ACESSO PROIBIDO">ACESSO PROIBIDO</option>
                        <option value="">NEM UMA DASSA</option>
                    </select> ou <input name="selecione_tipo_restri2" type="text" placeholder="Tipo de restrição"></p>
                    <p><input name="nomedobloqueado" type="text" placeholder="Nome completo do bloqueado" required></p>
                    <p><input name="documentodobloqueado" type="text" id="doocumentobloc" placeholder="Documento do bloqueado" autocomplete="off" maxlength="12" onkeyup="Mascara_rg('##.###.###-#', this)" ></p>
                    <textarea name="descridobloqueio" id="" placeholder="Descreva datalhadamente o motivo do bloqueio" required></textarea>
                    
                    <label  for="name"></label>
                    <p><input name="foto" type="file"></p>
                    <div class="btnsrelatorio">
                        <button type="submit"><i class="fas fa-file-download"></i></button>
                        <i class="fas fa-file-excel"></i>
                    </div>
                </div>
            </div>
        </div>
    </main>
</form>
    </body>
</html>    