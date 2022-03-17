<?php 
include_once("../CONECT/conexao.php");
date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

// selecione toda a minha tabela de moradores no banco de dados cadastro
$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM veiculos WHERE id = '$id'";
$resultadouser = mysqli_query($conexao,$sql);
$lenderesult = mysqli_fetch_assoc($resultadouser);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar cadastro de morador</title>
    <link rel="stylesheet" href="../../CSS/pages.css" />
    <link rel="stylesheet" href="../../CSS/tables.css" />
    <link rel="stylesheet" href="../../CSS/fonts.css">
    <script src="../../js/scrips.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.css" />

    <!-- função para mostrar e esconder o conteiner com as informações da empresa do prestador -->
    <script>
    $(document).ready(function() {

        $('#typedeficiente').on('change', function() {

            var selectValoor = '#' + $(this).val();

            $('#contentdeficiente').children('div').hide();

            $('#contentdeficiente').children(selectValoor).show();

        });

    });
    </script>
</head>

<body>
    <header>
        <main class="page_edit_register_resident">
            <form action="../UPLOADS/upload56584525bd795_register_veiculo.php" method="POST">
                <div class="wepper_edit_register_resident">
                    <div class="content_edit_register_resident">
                        <div class="header_edit_register_resident">
                            <p>Editar dados do veículo</p>
                            <div class="button_voltar_home">
                                <a href="cadastros58245659582geristros4523112.php">Voltar</a>
                            </div>
                        </div>
                        <input type="text" name="id" value="<?php echo $lenderesult['id'];?>" hidden>
                        <div class="dice_register_resident">
                            <div class="min_input">
                                <label>Apartamento:</label>
                                <input type="text" name="Apartamento" value="<?php echo $lenderesult['residencia']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Estacionamento:</label>
                                <input type="text" name="vaga_estacionamento" value="<?php echo $lenderesult['blocomorador']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Nome do veículo:</label>
                                <input type="text" name="Nome_veiculo"
                                    value="<?php echo $lenderesult['nomeveiculo']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Marca:</label>
                                <input type="text" name="marca_veiculo"
                                    value="<?php echo $lenderesult['marcaveiculo']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Cor do veículo:</label>
                                <input type="text" name="cor_veiculo" value="<?php echo $lenderesult['cordoveiculo'];?>">
                            </div>
                            <div class="min_input" id="responsavel">
                                <label>Placa do veículo:</label>
                                <input type="text" name="placa_veiculo" value="<?php echo $lenderesult['pladoveiculo'];?>">
                            </div>
                            <div class="min_input">
                                <label>Ano do veículo:</label>
                                <input type="text" name="ano_veiculo" value="<?php echo $lenderesult['anodoveiculo'];?>">
                            </div>
                            
                        </div>
                        <div class="photo_register">
                            <div class="content_photo">
                                <img src="../../Galeria/Veiculos/<?php echo $lenderesult['fotodoveiculo']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button_edit_register">
                    <div>
                        <button type="submit"
                            class="button-inter item9"><span></span><span></span><span></span><span></span>Editar
                            dados</button>
                    </div>
                </div>
            </form>
            <div class="button_photo_register">
            <button class="button-inter item9" data-bs-toggle="modal"
                data-bs-target="#modaleditphotoregister"><span></span><span></span><span></span><span></span>Editar
                foto</button>
            </div>
            <!-- Cadastrar novo morador no banco -->
            <div class="modal fade" id="modaleditphotoregister" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="max_height_modal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../UPLOADS/upload6524525845_photo7856548_register_veiculos.php" enctype="multipart/form-data">
                                <div class="weppermodal_edit_photo">
                                    <div class="conteudomodal">
                                        <!-- <label class="control-label">Você esta prestes á alterar fotografia deste morador</label> -->
                                        <input name="id" type="text" value="<?php echo $lenderesult['id'];?>" required hidden>
                                    </div>
                                        <div class="container-foto-visit" onclick="Botaoativarfotovisita()">
                                            <div class="wrapper-foto-visit">

                                                <div class="image-foto-visit">
                                                    <img id="fotovisit" src="" alt="">
                                                </div>

                                                <div class="content-foto-visit">
                                                    <div class="icon-foto-visit">
                                                        <ion-icon name="camera-outline"></ion-icon>
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
                                    <div class="btncadentregas">
                                    <button type="submit"
                                    class="button-inter item9"><span></span><span></span><span></span><span></span>Salvar foto</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </main>
    </header>

</html>