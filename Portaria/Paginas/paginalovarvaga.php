<?php
session_start();
include_once("../conexao.php");
$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM veiculos WHERE id = '$id'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../functions.js"></script>
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    </style>
</head>

<body>
    <form action="Locarcarronoestacionamento.php" method="post">
        <main class="principalpartlocarvaga">
            <div class="wapperlocarccar">
                <div class="headerlocarcar">
                    <h1>Liberar vaga de estacionamento</h1>

                   <input type="text" name="iddocarro" value="<?php echo $lenderesult['id'];?>" hidden>
                    <input type="text" name="umavagaocupada" value="bnt_saida_vaga.png" hidden>
                    <p>Apartamento: <?php echo $lenderesult['residencia'];?></p><input type="text" name="numaprtamentocar"
                        value="<?php echo $lenderesult['residencia'];?>" hidden>
                    <p>Nome do veículo: <?php echo $lenderesult['nomeveiculo'];?></p><input type="text" name="nomecar"
                        value="<?php echo $lenderesult['nomeveiculo'];?>" hidden>
                    <p>Marca do veículo: <?php echo $lenderesult['marcaveiculo'];?></p><input type="text" name="marcacar"
                        value="<?php echo $lenderesult['marcaveiculo'];?>" hidden>
                    <p>Cor do veículo: <?php echo $lenderesult['cordoveiculo'];?></p><input type="text" name="corcar"
                        value="<?php echo $lenderesult['cordoveiculo'];?>" hidden>
                    <p>Placa do veículo: <?php echo $lenderesult['pladoveiculo'];?></p><input type="text" name="placacar"
                        value="<?php echo $lenderesult['pladoveiculo'];?>" hidden>
                    <p>Ano do veículo: <?php echo $lenderesult['anodoveiculo'];?></p><input type="text" name="anocar"
                        value="<?php echo $lenderesult['anodoveiculo'];?>" hidden>
                </div>
                <button>Liberar</button>
            </div>
        </main>
    </form>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js">
    < /> <
    script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>