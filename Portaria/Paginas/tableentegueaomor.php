<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("../conexao.php");
$retiradaentr = "SELECT * FROM  entregasretirada ";

$resultadoderetiradaentrega = mysqli_query($conexao,$retiradaentr);

    
?>


<!--TÉRMINNO-->


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
    <script src="./functions.js"></script>
    <title>Corrrespondências</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    </style>
</head>
<body>
<main class="main_databela">
        
        </div> 
            <?php
                $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";
                
                $cunsultatableentregas = "SELECT * FROM entregasretirada WHERE apartamento LIKE '%$filtrandoo%'";
                $resulttableentregas = mysqli_query($conexao,$cunsultatableentregas);

            ?>
            <form method="POST">
                <input  class="inputdoveicle" type="text" name="filtra-busca" placeholder="Buscar correspondência"/>
            </form>
            <div id="row">
                <table class="table_entregas">
                    <tr>
                        <th class="borderesquerda">Apart</th>
                        <th>Bloco</th>
                        <th>Cor</th>
                        <th>Remetente</th>
                        <th>Volume</th>
                        <th>Descrição</th>
                        <th>Entrada</th>
                        <th>Foto</th>
                        <th>Entregar</th>
                        <th>Registrado por</th>
                        <th>Retirada</th>
                        <th>Retirado por</th>
                        <th class="borderdireita">Entregue por</th>
                        
                    </tr>                
                                
    
                        <?php
                        while($entregueaomor = mysqli_fetch_array($resultadoderetiradaentrega)){
                            $part = $entregueaomor ['apartamento'];
                            $blocoret = $entregueaomor['bloco'];
                            $corret = $entregueaomor['pacotecor'];
                            $remet = $entregueaomor['remetente'];
                            $volul = $entregueaomor['volume'];
                            $descris = $entregueaomor['informacao'];
                            $chagadaco = $entregueaomor['datarecebe'];
                            $chegadhor = $entregueaomor['horarecebida'];
                            $entregdat = $entregueaomor['dataentrega'];
                            $entregadhor = $entregueaomor['horaentraega'];
                            $status = $entregueaomor['statuus'];
                            $quemretira =$entregueaomor['reiradopor'];
                            $imagem = $entregueaomor['fotocoresp'];
                        ?>

                        <tr>
                            <td><?php echo $part;?></td>
                            <td><?php echo $blocoret;?></td>
                            <td><?php echo $corret;?></td>
                            <td><?php echo $remet;?></td>
                            <td><?php echo $volul;?></td>
                            <td><?php echo $descris;?></td>
                            <td><?php echo $chagadaco;?><br><?php echo $chegadhor;?></td>
                            <td><img src="../Galeria/Fotosentregs/<?php echo $imagem;?>"width="60" height="60"></td>
                            <td><?php echo $status;?></td>
                            <td><?php echo $quemretira;?></td>
                            <td><?php echo $entregdat;?><br><?php echo $entregadhor;?></td>
                        </tr>
                        <?php }?>
                        
                        
                </table>

            </div>




            <script>
                $(document).ready(function(){
                    $('#selection').on('change',function(){
                        var selectvalor = '#'+$(this).val();
                        $('#paitable').children('div').hide();

                        $('#paitable').children(selectvalor).show();
                    });

                });
            </script>
        </div>
</main>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>