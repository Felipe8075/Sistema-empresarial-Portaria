<?php
session_start();
include_once("../conexao.php");
$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM cmoradores WHERE codigo = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

$cunsultatablepet = "SELECT * FROM meuspet";
$resulttablepet = mysqli_query($conexao,$cunsultatablepet);

$casa = $lenderesult['apt'];

$consultveicle = "SELECT * FROM veiculos WHERE 	residencia = '$casa'";
$resulttablevei = mysqli_query($conexao,$consultveicle);

$consultpet = "SELECT * FROM meuspet WHERE 	numapart = '$casa'";
$resulttablepet = mysqli_query($conexao,$consultpet);

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

    <title>Informações de Moradores</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap');
    </style>
</head>

<body>
    <main class="main_page_information_mor" id="myGroup">
        <form action="">
            <div class="package_header_page_information">
                <div class="title_header_page_informations">
                    <span>Informações do Morador</span>
                </div>
                <div class="packgebtninicoinforma">
                    <a href="home0232022520portarias458pages5658.php" class="botão-iniciotlinformat">
                        <ion-icon name="home-outline" class="icone-voltaraoini"></ion-icon>
                        <span>Início</span>
                    </a>
                </div>
            </div>
            <div class="title_dados">
                <span>DADOS DO MORADOR</span>
            </div>

            <div class="package_mey_informations_mor">

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Nome do Morador</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['nomeMor']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Número da Residência</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['apt']; ?></span>
                </div>



                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Local do Bloco</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['alocado']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Sexo do Morador</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['sexo']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Morador Deficiênte</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['deficiente']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Telefone da Residência</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['teleRes']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Telefone Celular</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['teleCel1']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Telefone Celular</span>
                    <br>
                    <span class="font_do_nome"><?php echo $lenderesult['teleCel2']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Telefone de Emegência</span>
                    <br>
                    <span class="font_do_nome Emerge"><?php echo $lenderesult['teleEMR']; ?></span>
                </div>

                <div class="informations_page_mor">
                    <span class="title_name_page_mor">Tipo de Deficiência</span>
                    <br>
                    <span class="font_do_nome Emerge">O Morador não tem nem um tipo de deficiência</span>
                </div>
            </div>
            <div class="image_do_mor_informations">
                <img src="../Galeria/Fotomoradores/<?php echo $lenderesult['fotografia'];?>" alt="SEM FOTO">
            </div>
        </form>
        <div class="tabelasdeinformation">
            <div class="card2 card-body">


                <div class="tatle_tela_veicle">
                    Veículos cadastrados nesta residência
                </div>


                <table class="table table-hover">
                    <tr>
                        <th><span class="tdtipo">Nome </span></th>
                        <th><span class="tdraca">Marca</span></th>
                        <th><span class="rdnome">Cor</span></th>
                        <th><span class="rdnome">Placa</span></th>
                        <th><span class="rdnome">Ano</span></th>
                        <th><span class="rdnome">Foto</span></th>
                        <th><span class="rdnome">Acesso</span></th>
                        </th>


                        <?php
									while($registrosveicle= mysqli_fetch_array($resulttablevei)){
										$nomedovaicle = $registrosveicle['nomeveiculo'];
										$marcaveicle = $registrosveicle['marcaveiculo'];
										$corveicle = $registrosveicle['cordoveiculo'];
										$placaveicle = $registrosveicle['pladoveiculo'];
										$anoveicle = $registrosveicle['anodoveiculo'];
										$fotografia = $registrosveicle['fotodoveiculo'];
                                        $locador = $registrosveicle['alocado'];
									?>


                    <tr>
                        <td>
                            <div class="tdveicle"><?php echo $nomedovaicle;?></div>
                        </td>
                        <td>
                            <div class="tdveicle"><?php echo $marcaveicle;?></div>
                        </td>
                        <td>
                            <div class="tdveicle"><?php echo $corveicle;?></div>
                        </td>
                        <td>
                            <div class="tdveicle"><?php echo $placaveicle;?></div>
                        </td>
                        <td>
                            <div class="tdveicle"><?php echo $anoveicle;?></div>
                        </td>
                        <td><img id="img_mor" src="../Galeria/Veiculos/<?php echo $fotografia;?>" width="80"
                                height="80">
                        </td>
                        <td><img src="../Galeria/imagensdiversas/<?php echo $locador;?>" alt=""></td>
                    </tr>
                    <?php }; ?>
                </table>
            </div>


            <div class="card2 card-body">
                <div class="tatle_tela_veicle">
                    Animais cadastrados nesta residência
                </div>

                <table class="table table-hover ">
                    <tr>
                        <th><span class="tdtipo">Tipo de animal</span></th>
                        <th><span class="tdraca">Raça do animal</span></th>
                        <th><span class="rdnome">Nome do animal</span></th>
                        <th><span class="rdnome">Foto do animal</span></th>


                        <?php
                        while($registrospet = mysqli_fetch_array($resulttablepet)){
                        $teste = $registrospet['numapart'];
                        $tipoani = $registrospet['tipopet'];
                        $racacao = $registrospet['racapet'];
                        $racagato = $registrospet['raca_gato'];
                        $racacorlho = $registrospet['raca_coelho'];
                        $rachamister = $registrospet['raca_hamster'];
                        $nomepet = $registrospet['nomepet'];
                        $fotoani = $registrospet['fotoanimal'];
                        ?>

                    <tr>
                        <td><?php echo $tipoani;?></td>
                        <td><?php echo $racacao,$racagato,$racacorlho,$rachamister;?></td>
                        <td><?php echo $nomepet;?></td>
                        <td><img class="imgpetsindex" src="../Galeria/Fotospet/<?php echo $fotoani;?>" alt=""></td>
                    </tr>
                    <?php }; ?>
                </table>
            </div>
        </div>


    </main>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js">
    < /> <
    script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>