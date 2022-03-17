<?php
session_start();
include_once("../conexao.php");

$id = filter_input (INPUT_GET, 'resultdados');
$sql = "SELECT * FROM cmoradores WHERE codigo = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

?>
<?php  
    date_default_timezone_set('America/Sao_Paulo'); 
    date_default_timezone_set("Brazil/East");
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
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../CSS/firststyle.css">
    <script src="../functions.js"></script>
    <title>Registro de visitas</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
    </style>

</head>

<body>

    <main>
        <!-- A TAG MAIN TEM A FUNÇÃO DE ENGLOBAR TODA NOSSA ESTRUTURA DA PAGINA DE LIBERAÇÃO DO VISITANTES -->

        <!--INICIO DO PACOTE DO CABEÇALHO-->
        <div class="header-package">
            <!--INICIO CABEÇALHO-->
            <div class="header">
                <h2>Registros e Busca de Visitantes</h2>
            </div>
            <div class="package-btninicio">
                <a href="../index.php" class="botão-iniciotlvisita">
                    <ion-icon name="home-outline" class="icone-voltaraoini"></ion-icon>
                    <span>Início</span>
                </a>
            </div>
            <!--FIM CABEÇALHO-->
        </div>
        <!--FIM DO PACOTE DO CABEÇALHO-->

        <!-- MEIO DA PAGINA CONTENDO OS DADOS DOS VISITANTES  -->

        <div class="package-information-resident" id="myGroup">
            <form method="POST" action="convisitas.php" enctype="multipart/form-data">

                <div class="header-title-visitor-data">
                    <span>DADOS DO VISITANTE</span>
                </div>
                <div class="dice-informations-visitor">

                    <input type="text" name="nomedomorador" value="<?php echo $lenderesult['nomeMor'];?>" hidden required>
                    <input type="text" name="apartamentonul" value="<?php echo $lenderesult['apt'];?>" hidden required>
                    <input type="text" name="dataentrada" value="<?php echo date('d/m/Y');?>" hidden>
                    <input type="text" name="btnsair" value="btnsaidavisitaaa.png" hidden>

                    <div class="main-divs-input">
                        <input type="text" name="nome-visita" class="inputs-pg-visitan-maior-vi" autocomplete="off"
                            placeholder="Nome do Visitante" required>
                    </div>
                    <select name="visita" class="selecttypealocadofun">
                        <option selected>Tipo de Visita:</option>
                        <option value="Amigo(a)">Amigo(a)</option>
                        <option value="Filho(a)">Filho(a)</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Prestador de serviços">Prestador de serviços</option>
                    </select>
                    <div class="main-divs-visitor">
                        <input type="text" name="doc" class="inputs-pg-visitan-medio" autocomplete="off"
                            placeholder="Documento" onkeyup="Mascara_rg('##.###.###-#', this)" required>
                    </div>
                    <div class="main-divs-visitor">
                        <input type="text" name="contatos" class="inputs-pg-visitan-medio" placeholder="Contato"
                            required>
                    </div>
                    <div class="main-divs-visitor">
                        <input type="text" name="nomecar" class="inputs-pg-visitan-medio" placeholder="Nome do Veículo">
                    </div>
                    <div class="main-divs-visitor">
                        <input type="text" name="marcanome" class="inputs-pg-visitan-medio"
                            placeholder="Marca do Veículo">
                    </div>
                    <div class="main-divs-visitor">
                        <input type="text" name="carcor" class="inputs-pg-visitan-medio" placeholder="cor do Veículo">
                    </div>
                    <div class="main-divs-visitor">
                        <input type="text" name="placa" class="inputs-pg-visitan-medio" placeholder="placa do Veículo">
                    </div>

                    <?php  date_default_timezone_set('America/Sao_Paulo'); ?>
                    <input name="entradahora" type="text" value="<?php echo date('H:i:s');?>" hidden>


                    <input type="text" name="imagbtnliberar" value="btnentredavisitantes.png" hidden>
                </div>
           
                <div id="paraprestador2" >
                    <select name="Identificação" class="selecttypealocadofun">
                        <option value="Visita comum">Selecine o crácha</option>
                        <option value="01">Entrada c/ Crácha 01</option>
                        <option value="02">Entrada c/ Crácha 02</option>
                        <option value="03">Entrada c/ Crácha 03</option>
                        <option value="04">Entrada c/ Crácha 04</option>
                        <option value="05">Entrada c/ Crácha 05</option>
                        <option value="06">Entrada c/ Crácha 06</option>
                        <option value="07">Entrada c/ Crácha 07</option>
                        <option value="08">Entrada c/ Crácha 08</option>
                        <option value="09">Entrada c/ Crácha 09</option>
                        <option value="10">Entrada c/ Crácha 10</option>
                        <option value="11">Entrada c/ Crácha 11</option>
                        <option value="12">Entrada c/ Crácha 12</option>
                        <option value="13">Entrada c/ Crácha 13</option>
                        <option value="14">Entrada c/ Crácha 14</option>
                        <option value="15">Entrada c/ Crácha 15</option>
                        <option value="16">Entrada c/ Crácha 16</option>
                        <option value="17">Entrada c/ Crácha 17</option>
                        <option value="18">Entrada c/ Crácha 18</option>
                        <option value="19">Entrada c/ Crácha 19</option>
                        <option value="20">Entrada c/ Crácha 20</option>
                    </select>
                    <input type="text" name="empresa" placeholder="Empresa do Prestador">
                    <textarea name="servicos" id="text_area_pagevisit2" placeholder="Serviços Prestados"></textarea>
                </div>


                <div class="container-foto-visit">
                    <div class="wrapper-foto-visit">

                        <div class="image-foto-visit">
                            <img id="fotovisit" src="" alt="">
                        </div>

                        <div class="content-foto-visit">
                            <div class="icon-foto-visit">
                                <ion-icon name="walk-outline"></ion-icon></i>
                            </div>
                            <div class="text-foto-visit">Selecione uma imagem</div>
                        </div>
                        <div id="sair-bt-foto-visit"><i class="fas fa-times"></i></div>
                        <div class="nome-aquivo-foto-visit">Nome do Arquivo</i></div>
                    </div>
                    <label for="inputlg" for="name"></label>
                    <input id="bt-carfot-foto-visit" type="file" name="fotoo" hidden>
                </div>
        </div>

        <button type="button" onclick="Botaoativarfotovisita()" id="custom-btn-foto-visit"
            class="btn btn-outline-primary btn-pegar-foto">Buscar Foto</button>
        <button type="submit" class="btn btn-outline-success btn-libaendovisita">Liberar Visita</button>



        <!-- FIM DO MEIO DA PAGINA CONTENDO OS DADOS DOS VISITANTES  -->
    </main>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tagsinput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>

</html>