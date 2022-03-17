<?php include_once("../conexao.php"); ?>

<?php
$id = filter_input (INPUT_GET, 'resultdados');

$sql = "SELECT * FROM registrosdeentrada WHERE id = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

?>

<script>
    function desativarbutton(){
        var inputum = document.getElementById("buttonprimeiro");
        var inputdois = document.getElementById("buttonsegundo");

        var botao = document.getElementById("Botaoencerraar");
        
        var title = document.getElementById("visitaencerradatitle");

        if (inputum.value = inputdois.value){
            botao.style.display = "block";
            title.style.display = "none";
        }else{
            
            botao.style.display = "none";
            title.style.display = "block"
        }
    }
</script>


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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

    <link rel="stylesheet" href="../CSS/firststyle.css">
    <title>Entrada de Visitantes</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');
    </style>

</head>
<body onload = "desativarbutton()">

    <main>
        <form method="POST" action="ENVIOSBD/enviarfinalizavisita.php" enctype="multipart/form-data">
            <div class="wepper_pageencerendosaindas">
                <div class="header_pageencerandosaidas">
                    <di class="contente_pageencerandosaidas">
                        <?php echo $lenderesult['nomevisita'];?>
                    </di>
                    <p id="visitaencerradatitle">Visita Encerrada</p>
                </div>
                <div class="bolinhadireitaum"></div>
                <div class="bolinhadireitadois"></div>
                <div class="bolinhadireitatres"></div>
                <div class="dados_veicular">Dados do Veículo</div>
                <div class="bolinhaesquerdaum"></div>
                <div class="bolinhaesquerdadois"></div>
                <div class="bolinhaesquerdatres"></div>
                <input type="submit" id="Botaoencerraar" class="Botaoencerrar" value="Confirmar Saída"></input>
                <a href="home0232022520portarias458pages5658.php"><div type="submit" class="Botaovoltando">Voltar</div></a>
                <div class="dados_pessoais">Dados Pessoais</div>
                <div class="bolinhaum"></div>
                <div class="bolinhadois"></div>
                <div class="bolinhatres"></div>
                <div class="bolinhaquatro"></div>
                <div class="bolinhacinco"></div>
                <div class="bolinhafoto"><img src="../Galeria/Fotovisitantes/<?php echo $lenderesult['foto'];?>"></div>
                
                <div class="information_dedos_de_visitas">
                <div>Crachá: <?php echo $lenderesult['cracha'];?></div>
                <div>Apartamento: <?php echo $lenderesult['Apartamento'];?></div>
                <div>Autorizado Por: <?php echo $lenderesult['moradorliberou'];?></div>
                <div>Documento do Vistante: <?php echo $lenderesult['documentovisita'];?></div>
                <div>Telefone do Visitante: <?php echo $lenderesult['telefonevisita'];?></div>
                <div>Data de Entrada: <?php echo $lenderesult['datadeentrada'];?> / <?php echo $lenderesult['horadeentrada'];?></div>
                <div>Data de Saída: <?php echo $lenderesult['datadesaida'];?> / <?php echo $lenderesult['horadesaida'];?></div>
                <div>Tipo de Visitante: <?php echo $lenderesult['tipodavisita'];?></div>
                <div>Nome da Empresa: <?php echo $lenderesult['empresa'];?></div>
                <div>Serviços Prestados: <?php echo $lenderesult['servicos'];?></div>
                </div>

                <div class="information_dedos_de_veiculo">
                <div>Nome do Veículo: <?php echo $lenderesult['nomedoveiculo'];?></div>
                <div>Marco do Veículo: <?php echo $lenderesult['marcadoveidulo'];?></div>
                <div>cor do Veículo: <?php echo $lenderesult['cordoveiculo'];?></div>
                <div>Placa do Veículo: <?php echo $lenderesult['placadoveiculo'];?></div>
                
                </div>
                <input type="text" id="id" name="iid" value="<?php echo $lenderesult['id'];?>" hidden >

                <input type="text" id="buttonprimeiro" value="esconder" hidden>
                <input type="text" id="buttonsegundo" value="<?php echo $lenderesult['button'];?>" hidden>

                <input type="text" name="buttonprimeiro" value="" hidden>
                <input type="text" name="buttonsegundo" value="botaodetalhes.png" hidden>
                
                <input type="text" name="datadesaida" value="<?php echo date('d/m/Y');?>" hidden>
                <input type="text" name="horadesaida" value="<?php echo date('H:i:s');?>" hidden>


            </div>
        </form>
    </main>
    
     
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>