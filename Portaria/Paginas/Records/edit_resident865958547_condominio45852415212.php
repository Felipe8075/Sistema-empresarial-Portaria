<?php 
include_once("../CONECT/conexao.php");
date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

// selecione toda a minha tabela de moradores no banco de dados cadastro
$id = filter_input (INPUT_GET, 'inviarid');
$sql = "SELECT * FROM cmoradores WHERE codigo = '$id'";
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
            <form action="../UPLOADS/upload56584525bd795_register.php" method="POST">
                <div class="wepper_edit_register_resident">
                    <div class="content_edit_register_resident">
                        <div class="header_edit_register_resident">
                            <p>Editar dados do morador</p>
                            <div class="button_voltar_home">
                                <a href="cadastros58245659582geristros4523112.php">Voltar</a>
                            </div>
                        </div>
                        <input type="text" name="id" value="<?php echo $lenderesult['codigo'];?>" hidden>
                        <div class="dice_register_resident">
                            <div class="max_input">
                                <label>Nome do morador:</label>
                                <input type="text" name="nome_moradorC" value="<?php echo $lenderesult['nomeMor']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Apartamento:</label>
                                <input type="text" name="num-apartamento" value="<?php echo $lenderesult['apt']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Ano de nascimento:</label>
                                <input type="text" name="nascimento-date"
                                    value="<?php echo $lenderesult['anonasc']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Lado Alocado:</label>
                                <select name="alocacao" id="">
                                    <option value="<?php echo $lenderesult['alocado'];?>">
                                        <?php echo $lenderesult['alocado'];?></option>
                                    <option value="Frente">Frente</option>
                                    <option value="Esquerda">Esquerda</option>
                                    <option value="Direita">Direita</option>
                                    <option value="Meio">Meio</option>
                                    <option value="Fundo">Fundo</option>
                                </select>
                            </div>
                            <div class="min_input">
                                <label>Sexo:</label>
                                <select name="sexo" id="">
                                    <option value="<?php echo $lenderesult['sexo'];?>">
                                        <?php echo $lenderesult['sexo'];?></option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>
                            <div class="min_input">
                                <label>Telefone residêncial:</label>
                                <input type="text" name="telef-residencial"
                                    value="<?php echo $lenderesult['teleRes']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Telefone celular:</label>
                                <input type="text" name="telef-celular1"
                                    value="<?php echo $lenderesult['teleCel1']; ?>">
                            </div>
                            <div class="min_input">
                                <label>Residente:</label>
                                <select name="situacao" id="">
                                    <option value="<?php echo $lenderesult['situacao'];?>">
                                        <?php echo $lenderesult['situacao'];?></option>
                                    <option value="Proprietário">Proprietário</option>
                                    <option value="Inquilino">Inquilino</option>
                                    <option value="Familiar">Familiar</option>
                                    <option value="Conjugue">Conjugue</option>
                                </select>
                            </div>
                            <div class="min_input">
                                <label>Telefone Emergência:</label>
                                <input type="text" name="tel-emergencia" value="<?php echo $lenderesult['teleEMR'];?>">
                            </div>
                            <div class="min_input" id="responsavel">
                                <label>Responsável pelo celular de emergência:</label>
                                <input type="text" name="telef-celular2" value="<?php echo $lenderesult['teleCel2'];?>">
                            </div>
                            <div class="max_input">
                                <label>tipo de deficiência:</label>
                                <input type="text" name="existe" value="<?php echo $lenderesult['tipoDef'];?>">
                            </div>
                            <div class="max_input">
                                <label>E-mail do morador:</label>
                                <input type="text" name="email" value="<?php echo $lenderesult['emailMor']; ?>">
                            </div>
                        </div>
                        <div class="photo_register">
                            <div class="content_photo">
                                <img src="../../Galeria/Fotomoradores/<?php echo $lenderesult['fotografia']; ?>" alt="">
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
                            <form method="POST" action="../UPLOADS/upload6524525845_photo7856548_register.php" enctype="multipart/form-data">
                                <div class="weppermodal_edit_photo">
                                    <div class="conteudomodal">
                                        <!-- <label class="control-label">Você esta prestes á alterar fotografia deste morador</label> -->
                                        <input name="id" type="text" value="<?php echo $lenderesult['codigo'];?>" required hidden>
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