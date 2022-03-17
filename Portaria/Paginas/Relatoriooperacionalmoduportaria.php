<?php
include_once("../conexao.php");
session_start();

$testedenome = $_SESSION['nome'];

date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

$dataatual = date('d/m/Y');


// = contador de tabelas para receber-mos a quantidade de correpondências que foram registradas no dia= 
    $selecionetabentregas = "SELECT * FROM entregas  WHERE  datarecebida = '$dataatual'";              
    $resultadodatabselecinada = mysqli_query($conexao,$selecionetabentregas);                         
    $resultvalordacontagemtabentregas = mysqli_num_rows($resultadodatabselecinada);                  
//================================================================================================= 

// = contador de tabelas para receber-mos a quantidade de correpondências que foram entregues no dia= 
$selecionetabentregasret = "SELECT * FROM entregas  WHERE  dataentrega = '$dataatual'";               
$resultadodatabselecinadaret = mysqli_query($conexao,$selecionetabentregasret);                     
$resultvalordacontagemtabentregasret = mysqli_num_rows($resultadodatabselecinadaret);              
//=============================================================================================== 

// = contador de tabelas para receber-mos a quantidade de visita que deram entrada no dia= // 
$selecionetabregistrosvisitas = "SELECT * FROM registrosdeentrada  WHERE  datadeentrada = '$dataatual'";   
$resultadodatabselecinadaregistrosvisitas = mysqli_query($conexao,$selecionetabregistrosvisitas);          
$resultvalordacontagemtabregistrosvisitas = mysqli_num_rows($resultadodatabselecinadaregistrosvisitas);   
//===================================================================================================

// = contador de tabelas para receber-mos a quantidade de visita que deram entrada no dia= // 
$selecionetabregistrosvisitasrest = "SELECT * FROM registrosdeentrada  WHERE  datadesaida = '$dataatual'";   
$resultadodatabselecinadaregistrosvisitasrest = mysqli_query($conexao,$selecionetabregistrosvisitasrest);          
$resultvalordacontagemtabregistrosvisitasrest = mysqli_num_rows($resultadodatabselecinadaregistrosvisitasrest);   
//===================================================================================================


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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Portaria</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    </style>

</head>

<body>

    <main>
        <form method="POST" action="ENVIOSBD/enviarrelatorio.php">
            <div class="conteiner">

                <div class="wappercontent">
                    <div class="title">
                        <h4>Relatório Operacional</h4>
                    </div>


                    <div class="content">
                        <?php  //Formtação de data para o brasil
                            date_default_timezone_set('America/Sao_Paulo'); 
                            date_default_timezone_set("Brazil/East");
                        ?>
                        <p>Data da operação: <?php echo date('d/m/Y'); ?></p><input type="text" name="datarelatorio"
                            value="<?php echo date('d/m/Y'); ?>" hidden> <!-- linha que vai para salvar no banco -->
                        <p>Local de trabelho: Viva Vista Itaqua</p><input type="text" name="nomecondiminio"
                            value="Viva Vista Itaqua" hidden> <!-- linha que vai para salvar no banco -->
                        <p>Colaborador: <?php echo $testedenome;?></p><input type="text" name="nomefuncionario"
                            value="<?php echo $testedenome;?>" hidden> <!-- linha que vai para salvar no banco -->
                        <p>Entrada: <select name="horaentrada" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="07:00">07:00</option>
                                <option value="19:00">19:00</option>
                            </select>Saída: <select name="horasaida" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="07:00">07:00</option>
                                <option value="19:00">19:00</option>
                            </select></p>
                        <h5>Materiais e utilitários do posto</h5>

                        <p><select name="qtdnextel" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Nextel</p>
                        <p><select name="qtdCarregado" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Carregado</p>
                        <p><select name="qtdInterfone" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Interfone intelbras</p>
                            <p><select name="qtFrigobar" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Frigobar</p>
                            <p><select name="qtdMicro" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Micro ondas</p>
                            <p><select name="qtdLivro" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Livro de ocorrências</p>
                            <p><select name="qtdMonitores" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Monitores</p>
                            <p><select name="qtdMouse" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Mouse</p>
                            <p><select name="qtdTeclado" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Teclado</p>
                            <p><select name="qtdCPU" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>CPU</p>
                            <p><select name="qtdGuarda" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Guarda chuva</p>
                            <p><select name="qtdRelogio" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Relogio de ponto</p>
                            <p><select name="qtdQHTs" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>QHTs</p>
                            <p><select name="qtdDVR" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>DVR</p>
                            <p><select name="qtdVentilador" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                            </select>Ventilador</p>
                        <p><select name="qtdcameras" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                            </select> Câmeras em operação</p>
                        <p><select name="qtdchaves" id="">
                                <!-- linha que vai para salvar no banco -->
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                            </select> Chaves</p>
                            <p><input type="text" name="Itensnaolistado" placeholder="Itens não listado"></p>

                        <h5>Controle Geral</h5>

                        <p><?php echo $resultvalordacontagemtabentregas;?> Correspondências protocoladas hoje</p><input
                            type="text" name="contagemcorrespprot"
                            value="<?php echo $resultvalordacontagemtabentregas;?>" hidden>
                        <!-- linha que vai para salvar no banco -->
                        <p><?php echo $resultvalordacontagemtabentregasret?> Correspondências protocoladas hoje que
                            foram entregues</p><input type="text" name="contagemcorrespentre"
                            value="<?php echo $resultvalordacontagemtabentregasret;?>" hidden>
                        <!-- linha que vai para salvar no banco -->
                        <p><?php echo $resultvalordacontagemtabregistrosvisitas;?> Visitas que deram entraram hoje</p>
                        <input type="text" name="contagemvisiprot"
                            value="<?php echo $resultvalordacontagemtabregistrosvisitas;?>" hidden>
                        <!-- linha que vai para salvar no banco -->
                        <p><?php echo $resultvalordacontagemtabregistrosvisitasrest?> Visitas que deram entraram hoje e
                            já saíram</p><input type="text" name="contagemvisijasai"
                            value="<?php echo $resultvalordacontagemtabregistrosvisitasrest;?>" hidden>
                        <!-- linha que vai para salvar no banco -->


                        <h5>Ocorrências do plantão</h5>

                        <p><textarea name="relatarocorencia" id="" placeholder="Ocorrências do dia"></textarea></p>

                        <p>Passagem de posta para:
                            <select name="nomeporte1" >

                                <option value="">SELECIONE O PLANTONISTA</option>
                                <?php
                                    $result_categoria = "SELECT * FROM user";
                                    $resultado_categoria = mysqli_query($conexao, $result_categoria);
                                    while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                    <option value="<?php echo $row_categoria['Nome']; ?>">
                                    <?php echo $row_categoria['Nome']; ?></option> <?php
                                    }
                                ?>
                            </select> ou <input type="text" name="nomeporte2" placeholder="Plantonistas FT"></p>
                    </div>
                    <div class="btnsrelatorio">
                        <button type="submit"><i class="fas fa-file-download"></i></button>
                        <a href="home0232022520portarias458pages5658.php"><i class="fas fa-file-excel"></i>
                    </div >
                    <!-- <div class="sair-relatorio">
                        
                    </a></div> -->
                </div>
            </div>
        </form>
    </main>

</body>

</html>