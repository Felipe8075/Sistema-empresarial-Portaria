<?php
include_once("../conexao.php");

date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

$nome = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM restrito WHERE nomemorador = '$nome'";
$resultadouser = mysqli_query($conexao,$sql);

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <title>Portaria</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
        
    </style>

</head>
    <body>
        <h1 class="listadebloqueios">Lista de bloqueios</h1>
        
        <div class="" id="row">
            <table class="table table-hover alinhatexte">
                <tbody>

                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Documento</th>
                        <th>Bloqueio</th>
                        <th>Tipe de bloqueio</th>
                    </tr>

                    <?php
                    while($receberRegistros = mysqli_fetch_array($resultadouser)){
                    $nome = $receberRegistros['nomebloquado'];
                    $aimg = $receberRegistros['fotografia'];
                    $documento = $receberRegistros['documentobloqueado'];
                    $apartamento =  $receberRegistros['apartamento'];
                    $restri1 = $receberRegistros['restri1'];
                    $restri2 = $receberRegistros['restri2'];
                    ?>
                        <tr >
                            <td><img src="../Galeria/Fotodobloqueado/<?php echo $aimg;?>"width="80" height="80" alt=""></td>
                            <td><div class="descertextcdtmor"><?php echo $nome;?></div></td>
                            <td><div class="descertextcdtmor"><?php echo $documento;?></div></td>
                            <td><div class="descertextcdtmor"><?php echo $apartamento;?></div></td>
                            <td><div class="descertextcdtmor"><?php echo $restri1;?><?php echo $restri2;?></div></td>
                            <td><a class="descertextcdtmor" href="../Paginas/informarestrition.php?inviarid=<?php echo $receberRegistros['ID'];?>"><img src="../Galeria/imagensdiversas/btn_datalhesrolar.png" alt=""></ion-icon></a></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>