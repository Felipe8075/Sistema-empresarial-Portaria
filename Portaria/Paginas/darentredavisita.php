<?php include_once("CONECT/conexao.php"); ?>

<?php
$id = filter_input (INPUT_GET, 'resultdados');

$sql = "SELECT * FROM visitas WHERE id = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);




?>

<script>
function mostrarparaprestador() {
    comresult = document.getElementById("visitatipo");
    comfonrne = document.getElementById("resultvisitatipo");
    selectcracha = document.getElementById("Identificação");
    carrasco = document.getElementById("inputcarrasco");
    adiv = document.getElementById("paraprestador");

    if (comresult.value != comfonrne.value) {
        adiv.style.display = "none";
        selectcracha.style.display = "none";
        carrasco.style.display = "block";
    } else {
        adiv.style.display = "block";
        selectcracha.style.display = "block";
        carrasco.style.display = "none";
    }
};
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

    <link rel="stylesheet" href="../CSS/pages.css">
    <title>Entrada de Visitantes</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@200&display=swap');
    </style>
    <script>
    function mascara_apart() {
        var numapart = document.getElementById("Identificaçãoip");
        if (numapart.value.length == 2) {
            numapart.value += "-"
        }
    };
    </script>

</head>

<body onload="mostrarparaprestador()">
    <div class="wapper_information_deliver">
        <div class="content_information_deliver">
            <div class="conteiner_information_deliver">
                <div class="titulando_page_retirada_entrega">
                    Controle de Registro e Entrada de Visitantes
                </div>

                <div class="motra_resultado_retirada">
                    <div class="input_escondido">
                        <div class="titulosfinalizarsaidadevisitas">
                            <div class="sub_titleentregs_casa"><span>Identificação:</span> </div>
                            <div class="sub_titleentregs_casa"><span>Residência:</span> </div>
                            <div class="sub_titleentregs_destino"><span> Morador que Autorizou:</span> </div>
                            <div class="sub_titleentregs_volume"><span> Nome da Visita:</span> </div>
                            <div class="sub_titleentregs_data"><span> Documento:</span> </div>
                            <div class="sub_titleentregs_hora"><span> Tipo de Visita:</span> </div>
                            <div class="sub_titleentregs_descri"><span> Contato:</span></div>
                            <div class="sub_titleentregs_descri"><span> Nome do Veículo:</span> </div>
                            <div class="sub_titleentregs_descri"><span> Marca do Veículo:</span> </div>
                            <div class="sub_titleentregs_descri"><span> Placa do Veículo:</span> </div>
                            <div class="sub_titleentregs_descri"><span>Cor do Veículo:</span> </div>

                        </div>
                        <form method="POST" action="ENVIOSBD/enviarregistrovisita.php" enctype="multipart/form-data">
                            <div class="resultdosubtitle">

                                <div><input id="inputcarrasco" type="text" value="Visita comum" disabled>
                                    <select name="Identificação" id="Identificação">
                                        <option value="Visita comum"></option>
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
                                </div>

                                <div>
                                    <input name="apartamentonul" id="Identificaçãoip" onKeyUp="mascara_apart()"
                                        maxlength="7" placeholder="EXEMPLO -> ( B3-605 )" required>
                                </div>

                                <div><input type="text" name="nomedomorador" placeholder="Nome do Morador" required>
                                </div>

                                <!-- <select name="select_nome_moradores" class="selecnomedormora"  required>
                        <option value=""></option>
                        <?php
                            $result_nome_moradores = "SELECT * FROM cmoradores WHERE apt = 'LI25'";
                            $select_nome_moradores = mysqli_query($conexao, $result_nome_moradores);
                            while($row_niveis_acessos = mysqli_fetch_assoc($select_nome_moradores)){ ?>
                                <option value="<?php echo $row_niveis_acessos['nomeMor']; ?>"><?php echo $row_niveis_acessos['nomeMor']; ?></option> <?php
                            }
                        ?>
                    </select>  -->
                                <div><?php echo $lenderesult['nomevisita']; ?></div>
                                <div><?php echo $lenderesult['documento']; ?></div>
                                <div><?php echo $lenderesult['tipovisita']; ?></div>
                                <div><?php echo $lenderesult['contatovisita']; ?></div>
                                <div><input name="nomedocarro" type="text" placeholder="Nome do Veículo"></div>
                                <div><input name="marcadocarro" type="text" placeholder="Marco do Veículo"></div>
                                <div><input name="placadocarro" type="text" placeholder="Placa do Veículo"></div>
                                <div><input name="cordocarro" type="text" placeholder="Cor do Veículo"></div>
                            </div>

                            <div id="paraprestador">
                                Empresa do Prestador: <div><input type="text" name="empresa" value="<?php echo $lenderesult['visit_empresa']; ?>"></div>
                                Empresa do Prestador: <div><input type="text" name="servicos" value="<?php echo $lenderesult['visit_tipe_servico']; ?>"></div>
                            </div>


                            <?php  
            date_default_timezone_set('America/Sao_Paulo'); 
            date_default_timezone_set("Brazil/East");
        ?>

                            <div class="input_escondido">
                                <input type="text" name="nomedavisita" value="<?php echo $lenderesult['nomevisita']; ?>"
                                    hidden>
                                <input type="text" name="documento" value="<?php echo $lenderesult['documento']; ?>"
                                    hidden>
                                <input type="text" id="visitatipo" name="tipodevisita"
                                    value="<?php echo $lenderesult['tipovisita']; ?>" hidden>
                                <input type="text" name="contato" value="<?php echo $lenderesult['contatovisita']; ?>"
                                    hidden>
                                <input type="text" name="dataentrada" value="<?php echo date('d/m/Y');?>" hidden>
                                <input type="text" name="horaentrada" value="<?php echo date('H:i:s');?>" hidden>
                                <input type="text" id="resultvisitatipo" value="Prestador" hidden>
                                <input type="text" name="idedt" value="<?php echo $lenderesult['id']; ?>" hidden>
                                <input type="text" name="afoto" value="<?php echo $lenderesult['imagemvisita'];?>"
                                    hidden>
                                <input type="text" name="btnsair" value="btnsaidavisitaaa.png" hidden>
                                <div class="imag_result_visitantes"><img
                                        src="../Galeria/Fotovisitantes/<?php echo $lenderesult['imagemvisita'];?>"
                                        width="320" height="320"></div>

                                <input type="submit" class="btn btn-outline-success btnsaidaconf"
                                    value="Confirmar Entrada"></a>
                                <a href="home0232022520portarias458pages5658.php"><button type="button"
                                        class="btn btn-primary btnpagesairconfvisi">Voltar</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-tagsinput.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>

</html>