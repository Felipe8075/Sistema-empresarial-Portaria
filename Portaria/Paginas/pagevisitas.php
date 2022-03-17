


<!-- CONECXÃO COM O BANCO DE DADO MSQL-->
<?php
include_once("../conexao.php");
$sql = "SELECT * FROM visitas";
$consulta = mysqli_query($conexao,$sql);

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
    <title>Pagina 1</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    </style>
</head>
<body>
<main class="main_principal_home_menu_principal">
    
        <div class="tatle_tela_veicle">
            Relação de Visitantes dentro do Condomínio
        </div>
        
        
        <?php
            $filtrandoo = isset($_POST['filtra-busca'])?$_POST['filtra-busca']:"";
            
            $sql = "SELECT * FROM visitas WHERE apart LIKE '$filtrandoo'
             OR nomevisita LIKE '%$filtrandoo%'
             OR documento LIKE '%$filtrandoo%'
             OR placa LIKE '%$filtrandoo%'
             OR moradornome LIKE '%$filtrandoo%'
             OR identifica LIKE '%$filtrandoo%'
             OR marcacarro LIKE '%$filtrandoo%'
             OR nomecarro LIKE '%$filtrandoo%'
             OR corcarro LIKE '%$filtrandoo%'";
            $consulta = mysqli_query($conexao,$sql);

            ?>

            <div class="package_filter_veicle">
                <form method="POST">
                    <input class="inputdoveicle" type="text" name="filtra-busca" placeholder="Buscar Visitantes">
                    <!-- <button type="submit" onclick="submt" class="btn btn-primary">Confirmar busca</button> -->
                </form>
            </div>

            <div class="card">
                            <div class="card-body">
                                <table class="">
                                    
                                    <tbody id="tbody">
                                        <?php
                                        while($receberRegistros = mysqli_fetch_array($consulta)){
                                            $apt = $receberRegistros['apart'];
                                            $blocentr = $receberRegistros['blocomorador'];
                                            $moradorliberou = $receberRegistros['moradornome'];
                                            $visita = $receberRegistros['nomevisita'];
                                            $nomedocar = $receberRegistros['nomecarro'];
                                            $contato = $receberRegistros['contatovisita'];
                                            $placa = $receberRegistros['placa'];
                                            $fot = $receberRegistros['imagemvisita']; 
                                            $hor = $receberRegistros['entradahora'];
                                            $tpovisita = $receberRegistros['tipovisita'];
                                            $datdereg = $receberRegistros['registrodata'];
                                            $marcadocar = $receberRegistros['marcacarro'];
                                            $carrocor = $receberRegistros['corcarro'];
                                            $placadocar = $receberRegistros['placa'];
                                            $ident = $receberRegistros['identifica'];
                                            
                                        ?>

                                        <tr>
                                            <td scope="row" class="verm"><div id="mostra_fot"><img id="img_mor" src="../Galeria/Fotovisitantes/<?php echo $fot;?>"width="105" height="100" alt=""></div></td>
                                        </tr>  

                                        <tr>
                                            <td><div class="nome_do_visitante"><?php echo $visita;?></div></td>
                                        </tr> 

                                        <tr>
                                            <td><div class="Apar_bloc">Apartamento | <span class="cornum"><?php echo $apt;?></span> - Bloco | <span class="cornum"><?php echo $blocentr;?></span></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="telefone_visi">Contato: <?php echo $contato;?></div></td>
                                        </tr> 

                                        <tr>
                                            <td><div class="tipo_visita"><?php echo $tpovisita;?></div></td>
                                        </tr> 

                                        <!-- <tr>
                                            <td><div class="primeira_barra"></div></td>
                                        </tr>  -->

                                        <tr>
                                            <td><div class="nometitulomorador">Morador que Autorizou</div></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><div class="morador_liberou"><?php echo $moradorliberou?></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="date_reg">Dia: <?php echo $datdereg?> | As: <?php echo $hor?></div></td>
                                        </tr>

                                        <!-- <tr>
                                            <td><div class="segunda_barra"></div></td>
                                        </tr>  -->

                                        <tr>
                                            <td><div class="logoveiculo_visita"><i class="fas fa-car-side"></i></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="nome_carro"><?php echo $nomedocar?> | <?php echo $marcadocar?></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="cor_carro"><?php echo $carrocor?></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="placa_carro"><?php echo $placadocar?></div></td>
                                        </tr>

                                        <!-- <tr>
                                            <td><div class="terceira_barra"></div></td>
                                        </tr> -->

                                        <tr>
                                            <td><div class="title_identific">Identificação do Crachá</div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="identficationc"><?php echo $ident?></div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="Saídabtn">Saída do Condomínio</div></td>
                                        </tr>

                                        <tr>
                                            <td><div class="bara_final"></div></td>
                                        </tr>    
                                           
                                        <?php }; ?>        
                                    </tbody>
    
                                </table>
                            </div>
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