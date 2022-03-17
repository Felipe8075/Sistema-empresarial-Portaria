<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("../conexao.php");


$cunsultatableentregas = "SELECT * FROM entregas";
$resulttableentregas = mysqli_query($conexao,$cunsultatableentregas);



    
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


    <script>
        function habilitar(){
            var camp1 = document.getElementById("pronto");
            var camp2 = document.getElementsByClassName("resultadostatus");
            var button = document.getElementsByClassName("button");

            if(camp1.value != camp2.value){
                // button.style.display = "none";
                button.disabled = false;
            }else{
                // button.style.display = "block";
                button.disabled = true;
            }
        }

    </script>
</head>
<body onload="habilitar()">
            <?php
                $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";
                
                $cunsultatableentregas = "SELECT * FROM entregas WHERE residence LIKE '%$filtrandoo%'";
                $resulttableentregas = mysqli_query($conexao,$cunsultatableentregas);

            ?>
            <form method="POST">
                <input  class="inputdoveicle" type="text" name="filtra-busca" placeholder="Buscar correspondência"/>
            </form>
<main class="main_databela_pendente">
        <div id="paitable">
            <div id="row">
                <table class="table_entregas" >
                    <tr>
                        <th class="borderesquerda">Apart</th>
                        <th>Cor</th>
                        <th>Remetente</th>
                        <th>Volume</th>
                        <th>Descrição</th>
                        <th>Entrada</th>
                        <!-- <th>Foto</th> -->
                        <th>Entregar</th>
                        <th>Registrado por</th>
                        <th>Retirada</th>
                        <th>Retirado por</th>
                        <th class="borderdireita">Entregue por</th>
                    </tr>                
                                
                        <?php
                        while($registrosentrega = mysqli_fetch_array($resulttableentregas)){
                            $residence = $registrosentrega['residence'];
                            $corpack = $registrosentrega['corpacote'];
                            $fornecedor = $registrosentrega['fornecedor'];
                            $volume = $registrosentrega['volume'];
                            $descrission = $registrosentrega['informassion'];
                            $data = $registrosentrega['datarecebida'];
                            $hora = $registrosentrega['horarecebido'];
                            // $photo = $registrosentrega['fotografiaentregs'];
                            $Resposta = $registrosentrega['resposta'];
                            $recebedor = $registrosentrega['recebidopor'];
                            $quemretira =$registrosentrega['reiradopor'];
                            $entregdat = $registrosentrega['dataentrega'];
                            $entregadhor = $registrosentrega['horaentraega'];
                            $entregador = $registrosentrega['entreguepor'];
                            $confirme = $registrosentrega['confirme'];
                            
                        ?>
                        
                        <tr>
                            <td><?php echo $residence;?></td>
                            <td><?php echo $corpack;?></td>
                            <td><?php echo $fornecedor;?></td>
                            <td><?php echo $volume;?></td>
                            <td><?php echo $descrission;?></td>
                            <td><?php echo $data;?><br><?php echo $hora;?></td>
                            <!-- <td><img src="../Galeria/Fotosentregs/<?php echo $photo;?>"width="60" height="60"></td> -->
                            <td ><a class="btnimagenscorresp" href="confirmentregs.php?resultdados=<?php echo $registrosentrega['id'];?>"><img src="../Galeria/Fotosentregs/<?php echo $Resposta;?>" alt=""></a><img class="imgconfimeentrega" src="../Galeria/Fotosentregs/<?php echo $confirme;?>" alt=""></td>
                            <td><?php echo $recebedor;?></td>
                            <td><?php echo $entregdat;?><br><?php echo $entregadhor;?></td>
                            <td><?php echo $quemretira;?></td>
                            <td><?php echo $entregador;?></td>
                            
                        </tr>
                            
                        <?php }; ?>
                        
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