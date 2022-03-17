
<!-- OBTENDO CONEXÃO E RECEBEDO DADOS DA BANCO -->

<?php
include_once("../conexao.php");
$sql = "SELECT * FROM registrosdeentrada";
$resultadodabusca = mysqli_query($conexao,$sql);
?>
<!-- (FIM) OBTENDO CONEXÃO E RECEBEDO DADOS DA BANCO -->
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
    <title>Finalizar Saída de Visitante</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    </style>

</head>
<body>


    <main>
        <!-- AREA DO CABEÇALHO -->
        <div class="warpper_header">
            <div class="header">
                <div class="content">
                    <div class="title_finaliza_visita">
                        Saída de Visitantes e Prestadores de Serviços 
                    </div>
                    
                        <a class="Botaovoltandor" href="home0232022520portarias458pages5658.php">
                            Voltar
                        </a>
                    <?php
                        $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";


                        $buscarnatabela = "SELECT * FROM registrosdeentrada WHERE Apartamento LIKE '%$filtrandoo%'
                        OR nomevisita LIKE '%$filtrandoo%'
                        OR datadeentrada LIKE '%$filtrandoo%'
                        OR tipodavisita LIKE '%$filtrandoo%'";
                        $resultadodabusca = mysqli_query($conexao,$buscarnatabela);
                    ?>
                    <form method="POST">
                        <div class="input_pesquesa_saida">
                            <input type="text" name="filtra-busca" placeholder="Buscar exemplo data (00/00/0000)">
                        </div>
                        <div class="btnsubmit">
                            <input type="submit" value="Limpar Campo">
                        </div>
                    </form>

                    
                </div>    
            </div>
        </div>
        <!-- FIM DA AREA DO CABEÇALHO -->


        <!-- AREA DA TABELA CONTENDO OS DADOS DOS BANCO -->
            <div class="warpper_table_saidavi">
                <div class="content_table_saidavi" id="row">
                


                    <table class="table table-sm" >
                    <tr>
                       
                        <th class="borderesquerda">Identificação</th>
                        <th>Apartamento</th>
                        <th>Visitante</th>
                        <th>Documento</th>
                        <th>Entreda</th>
                        <th>Saída</th>
                        <th class="borderdireita">Tipo</th>
                        <th></th>
                        
                        
                    </tr>                
                                
                        <?php
                        while($tablerecebedados = mysqli_fetch_array($resultadodabusca)){
                            $cracha = $tablerecebedados['cracha'];
                            $aparatamento = $tablerecebedados['Apartamento'];
                            $visitaname = $tablerecebedados['nomevisita'];
                            $documento = $tablerecebedados['documentovisita'];
                            $dtaentrada = $tablerecebedados['datadeentrada'];
                            $horaentrada = $tablerecebedados['horadeentrada'];
                            $datasaida = $tablerecebedados['datadesaida'];
                            $horasaida = $tablerecebedados['horadesaida'];
                            $tipodeentrada = $tablerecebedados['tipodavisita'];
                            $botao = $tablerecebedados['button'];
                            $outrobutton = $tablerecebedados['buttonII'];

                        ?>
                        
                        

                        <tr>
                            <td><?php echo $cracha;?></td>
                            <td><?php echo $aparatamento;?></td>
                            <td><?php echo $visitaname?></td>
                            <td ><?php echo $documento;?></td>
                            <td class="diminuirfonte"><?php echo $dtaentrada;?><br><?php echo $horaentrada;?></td>
                            <td class="diminuirfonte"><?php echo $datasaida;?><br><?php echo $horasaida;?></td>
                            <td ><?php echo $tipodeentrada;?></td>
                            <td><a href="pageencerrarsaida.php?resultdados=<?php echo $tablerecebedados['id'];?>"><img src="../Galeria/imagensdiversas/<?php echo $botao;?>" alt=""></a><a href="pageencerrarsaida.php?resultdados=<?php echo $tablerecebedados['id'];?>"><img src="../Galeria/imagensdiversas/<?php echo $outrobutton;?>" alt=""></a></td>
                        </tr>
                            
                        <?php }; ?>
                    </table>
                </div>
            </div>

        <!-- FIM DA AREA DA TABELA CONTENDO OS DADOS DOS BANCO -->
    </main>
       
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>