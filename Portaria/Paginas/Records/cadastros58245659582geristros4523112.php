<?php 

include_once("../CONECT/conexao.php");
session_start();
include("../Verify/test_56854258921finich.php");
date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

// selecione toda a minha tabela de moradores no banco de dados cadastro
$sql = "select * FROM cmoradores";
$consulta = mysqli_query($conexao,$sql);
$busca = mysqli_num_rows($consulta);

$nameprimeruser = $_SESSION['Nomeprimeuser'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastrar morador</title>
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
    <script>
    $(document).ready(function() {

        $('#animais').on('change', function() {

            var Selecinarvalor = '#' + $(this).val();

            $('#paiselect').children('div').hide();

            $('#paiselect').children(Selecinarvalor).show();

        });

    });
    </script>
</head>

<body>
    <header>
        <main class="main_page_records">
            <div class="wapper_content_records">
                <div class="content_records">
                    <div class="header_title_record">
                        Registros cadastrais de moradores
                    </div>
                    <div class="main_button_page_new_register">
                        <div class="button_get_new_register">
                            <a href="#modalcadastrarmorador" data-bs-toggle="modal"><i class="fas fa-plus"></i>
                                <span>Novo
                                    registro</span></a>
                        </div>
                        <div class="button_get_new_register">
                            <a href="#modalcadastrarfuncionarios" data-bs-toggle="modal"><i class="fas fa-plus"></i>
                                <span>Funcionários</span></a>
                        </div>
                        <div class="button_get_new_register">
                            <a href="#modalcadastrarveiculo" data-bs-toggle="modal"><i class="fas fa-plus"></i>
                                <span>Novo Veículo</span></a>
                        </div>
                        <div class="button_get_new_register">
                            <a href="#modalcadastraranimais" data-bs-toggle="modal"><i class="fas fa-plus"></i>
                                <span>Novo animal</span></a>
                        </div>
                        <div class="button_get_form">
                            <a href="../Prints/Registration_form.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                    <path
                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                </svg><span> Formulário</span></a>
                        </div>
                        <div class="button_get_new_register">
                            <a href="Logoutrecod.php"><i class="fas fa-times"></i> <span> Sair da página</span></a>
                        </div>
                    </div>
                    <!-- filtragem de busca no banco de dados na tabela de cadastro de moradores -->


                    <?php
                        $filtro_sql = "";
                        if ( $_POST != NULL) {
                            $filtro = $_POST["filtra-busca"];
                                $filtro_sql = "WHERE apt ='%$filtro%'
                                    OR codigo LIKE '%$filtro%'
                                    OR nomeMor LIKE '%$filtro%'";
                        }
                        $busca2 = filter_input(INPUT_GET,"filtra-busca");
                        $sql = "select * from cmoradores $filtro_sql";
                        $consulta = mysqli_query($conexao,$sql);
                    ?>
                    <div class="page_rogister">
                        <div class="conteudomodal">
                            <form action="" method="POST">
                                <label class="control-label">Buscar registro:</label>
                                <input name="filtra-busca" type="text" placeholder="Registro, Apartamento ou Nome">
                            </form>
                        </div>
                    </div>
                    <div class="get_table_records row">
                        <table class="table table-striped">
                            <tr>
                                <th>Registro</th>
                                <th>Apart</th>
                                <th>Nome</th>
                                <th>Nascimento</th>
                                <th>Sexo</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                <th>Tipo</th>
                                <th>Data do Registro</th>
                                <th>Detalhes</th>
                                <th>Atualizar</th>
                                <th>Bloquear</th>
                                <th></th>
                            </tr>
                            <?php
                                    while($receberRegistros = mysqli_fetch_array($consulta)){
                                    $id = $receberRegistros['codigo'];
                                    $bloapart = $receberRegistros['apt'];
                                    $morador = $receberRegistros['nomeMor'];
                                    $nascimento = $receberRegistros['anonasc'];
                                    $sexo = $receberRegistros['sexo'];
                                    $Residencia = $receberRegistros['teleRes'];
                                    $celular = $receberRegistros['teleCel1'];
                                    $tipomorador = $receberRegistros['situacao'];
                                    $datacadastro = $receberRegistros['datacadastro'];
                                ?>

                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $bloapart;?></td>
                                <td><?php echo $morador;?></td>
                                <td><?php echo $nascimento;?></td>
                                <td><?php echo $sexo;?></td>
                                <td><?php echo $Residencia;?></td>
                                <td><?php echo $celular;?></td>
                                <td><?php echo $tipomorador;?></td>
                                <td><?php echo $datacadastro;?></td>
                                <td>
                                    <div class="more_button"><a href="#modalsabermaisinforma" data-bs-toggle="modal"
                                            data-trazapartamento="<?php echo $receberRegistros['apt'];?>"
                                            data-traznomemorador="<?php echo $receberRegistros['nomeMor'];?>"
                                            data-trazladoalocado="<?php echo $receberRegistros['alocado'];?>"
                                            data-trazanonascimento="<?php echo $receberRegistros['anonasc'];?>"
                                            data-trazdocumento="<?php echo $receberRegistros['documento'];?>"
                                            data-trazsexo="<?php echo $receberRegistros['sexo'];?>"
                                            data-traztelefoneresidencia="<?php echo $receberRegistros['teleRes'];?>"
                                            data-trazcelular="<?php echo $receberRegistros['teleCel1'];?>"
                                            data-trazcelularemergencia="<?php echo $receberRegistros['teleEMR'];?>"
                                            data-trazportadorcelemergencia="<?php echo $receberRegistros['teleCel2'];?>"
                                            data-traztiporesidente="<?php echo $receberRegistros['situacao'];?>"
                                            data-trazdeficiente="<?php echo $receberRegistros['deficiente'];?>"
                                            data-traztipodeficiencia="<?php echo $receberRegistros['tipoDef'];?>"
                                            data-trazemailmorador="<?php echo $receberRegistros['emailMor'];?>"
                                            data-trazdatadocadastro="<?php echo $receberRegistros['datacadastro'];?>"
                                            data-trazidademorador="<?php echo $receberRegistros['idade'];?>">Saber <i
                                                class="fas fa-plus"></i></a></div>
                                </td>
                                <td>
                                    <div class="more_button"><a
                                            href="edit_resident865958547_condominio45852415212.php?inviarid=<?php echo $receberRegistros['codigo'];?>">Editar
                                            <i class="fas fa-user-edit"></i></div>
                                </td>
                                <td>
                                    <div class="more_button"><a href="#modalbloquearvisita" data-bs-toggle="modal"
                                            data-trazapartamento="<?php echo $receberRegistros['apt'];?>"
                                            data-traznomemorador="<?php echo $receberRegistros['nomeMor'];?>"
                                            data-traztelefoneresidencia="<?php echo $receberRegistros['teleRes'];?>"
                                            data-trazcelular="<?php echo $receberRegistros['teleCel1'];?>"
                                            data-trazemailmorador="<?php echo $receberRegistros['emailMor'];?>"
                                            data-trazidmorador="<?php echo $receberRegistros['codigo'];?>">Acesso <i
                                                class="fab fa-expeditedssl"></i></div>
                                </td>
                            </tr>
                            <?php }; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- INICIO DE INCLUSÃO DE MODAIS -->

            <!-- Cadastrar novo morador no banco -->
            <div class="modal fade" id="modalcadastrarmorador" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="max_height_modal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../ENVIOSBD/enviafichamorador.php"
                                enctype="multipart/form-data">
                                <div class="weppermodal">
                                    <div class="conteudomodal">
                                        <label class="control-label">Nome do(a) morador(a):</label>
                                        <input name="nome-moradorC" type="text" placeholder="Nome completo" required>
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Bloco e Apartamento:</label>
                                        <input name="num-apartamento" type="text"
                                            placeholder="Digita o bloco e apartamento" required>
                                    </div>

                                    <div class="selectmodal">
                                        <label class="control-label">Selecine o lado do bloco:</label>
                                        <select name="alocacao" id="typevisit">
                                            <option value="">Selecione</option>
                                            <option value="Frente">Frente</option>
                                            <option value="Fundo">Fundo</option>
                                            <option value="Meio">Meio</option>
                                            <option value="Esquerda">Esquerda</option>
                                            <option value="Direita">Direita</option>
                                        </select>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Ano de nascimento:</label>
                                        <input type="text" name="data" id="datanascimento" placeholder="Exemplo: 1998"
                                            onblur="somaridade()" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Documento do(a) morador(a):</label>
                                        <input name="documentacao" type="text" placeholder="Exemplo: 00.000.000-0"
                                            id="doocumento" autocomplete="off" maxlength="12"
                                            onkeyup="Mascara_rghome('##.###.###-#', this)" required>
                                    </div>
                                    <div class="selectmodal">
                                        <label class="control-label">Selecine o sexo:</label>
                                        <select name="sexo" id="typevisit">
                                            <option value="">Selecione</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                        </select>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Telefone do(a) morador(a):</label>
                                        <input name="telef-residencial" type="text" id="masckcelular"
                                            onKeyUp="mascara_celular()" placeholder="Exemplo: 2686-8569" required>
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Celular do(a) morador(a):</label>
                                        <input name="telef-celular1" type="text" id="masckcelular"
                                            onKeyUp="mascara_celular()" placeholder="Exemplo: 95555-5555" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Celular para emergência:</label>
                                        <input name="celemergencia" type="text" id="masckcelular"
                                            onKeyUp="mascara_celular()" placeholder="Exemplo: 95555-5555">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Portador do celular de emergência:</label>
                                        <input name="atendeamargencia" type="text"
                                            placeholder="Digite o nome do portador">
                                    </div>

                                    <div class="selectmodal">
                                        <label class="control-label">Tipo de residente:</label>
                                        <select name="situacao" id="deveiculos" required>
                                            <option value=""></option>
                                            <option value="Proprietário">Proprietário</option>
                                            <option value="Inquilino">Inquilino</option>
                                            <option value="Familiar">Familiar</option>
                                            <option value="Conjugue">Conjugue</option>
                                        </select>
                                    </div>

                                    <div class="selectmodal">
                                        <label class="control-label">Portador de defeciência:</label>
                                        <select name="existe" id="typedeficiente" required>
                                            <option value="">Selecione</option>
                                            <option value="SIM">Sim</option>
                                            <option value="O morador não é portador de deficiência">Não</option>
                                        </select>
                                    </div>

                                    <div id="contentdeficiente">
                                        <div class="econderiputsdeficiente" id="SIM">
                                            <div class="conteudomodal">
                                                <label class="control-label">Tipo de deficiência:</label>
                                                <input name="tipo-defi" type="text"
                                                    placeholder="Digite o nome da deficiência">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">E-mail do(a) morador(a):</label>
                                        <input name="email" type="email" placeholder="Digite o e-mail corretamente"
                                            required>
                                    </div>
                                    <form method="POST">
                                        <div class="conteudomodal">
                                            <label class="control-label">Senha provisória:</label>
                                            <input name="senhatemp" type="password" placeholder="Digite uma senha"
                                                id="formmoradorsenha" required>
                                            <button type="button" class="oneicon" onclick="mostrarSenha()"><i
                                                    class="fas fa-eye" id="viewone"></i><i class="fas fa-eye-slash"
                                                    id="viewduo"></i></button>
                                        </div>
                                    </form>
                                    <div class="conteudomodal">
                                        <label class="control-label">Data atual:</label>
                                        <input name="daycadastro" type="text" value="<?php echo date('d/m/Y');?>"
                                            required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Idado do(a) morador(a):</label>
                                        <input name="idademorador" type="text" id="resultadonascimento" required>
                                    </div>

                                    <input type="text" name="apartamentonumber" class="input-dados-cdtmoradores"
                                        id="datahoje" value="<?php echo date('Y'); ?>" hidden>
                                    <div class="contfotodavisita">
                                        <div class="container-foto-visit" onclick="Botaoativarfotovisita()">
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

                                    <div class="conteudomodal">
                                        <input name="nome_registrador" type="hidden" value="<?php echo $testedenome;?>"
                                            placeholder="Nome do Porteiro Registrador" required>
                                    </div>

                                    <input type="hidden" name="dataentrada" value="<?php echo date('d/m/Y');?>">
                                    <input type="hidden" name="entradahora" value="<?php echo date('H:i:s');?>">

                                    <div class="btncadentregas">
                                        <button class="" type="submit">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Cadastrar saber mais do cadastro de moradores -->
            <div class="modal fade" id="modalsabermaisinforma" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../Prints/print_form_register_resident.php"
                                enctype="multipart/form-data">
                                <div class="weppermodal">
                                    <div class="conteudomodal">
                                        <label class="control-label">Documento do morador saíra na impressão</label>
                                        <input name="documentomorador" type="text" id="documento" autocomplete="off"
                                            maxlength="12" value="" hidden>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Nome do(a) morador(a):</label>
                                        <input name="nomemorador" type="text" id="nomemorador" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Bloco e Apartamento:</label>
                                        <input name="apartamento" type="text" id="apartamento" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Lado do bloco:</label>
                                        <input name="blocoalocado" type="text" id="alocado" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Ano de nascimento:</label>
                                        <input type="text" name="anodenascimento" id="anonascimento" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Sexo do morador(a):</label>
                                        <input name="sexomanor" type="text" id="sexomorador" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Telefone do(a) morador(a):</label>
                                        <input name="telefoneresidencial" type="text" id="telefonecasa" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Celular do(a) morador(a):</label>
                                        <input name="celulardomorador" type="text" id="celularmorador" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Celular para emergência:</label>
                                        <input name="celulardeemergencia" type="text" id="celularemergencia" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Portador do celular de emergência:</label>
                                        <input name="portadorcelemergencia" type="text" id="portador" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Tipo de residente:</label>
                                        <input name="tipodemorador" type="text" id="tiporesidente" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Portador de defeciência?:</label>
                                        <input name="deficienteportador" type="text" id="sedeficiente" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Tipo de deficiência:</label>
                                        <input name="tipodadeficiencia" type="text" id="tipodeficiencia" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">E-mail do(a) morador(a):</label>
                                        <input name="emaildomorador" type="email" id="emailmorador" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Data do Cadastro:</label>
                                        <input name="cadastrodata" type="text" id="datadocadastro" value="">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Idado do(a) morador(a):</label>
                                        <input name="moradoridade" type="text" id="idademorador" value="">
                                    </div>

                                    <div class="btncadentregas">
                                        <button class="" type="submit">Imprimir</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Cadastrar bloquear acesso de visitas -->
            <div class="modal fade" id="modalbloquearvisita" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../ENVIOSBD/enviarrestricaobd.php"
                                enctype="multipart/form-data">
                                <div class="weppermodal">

                                    <div class="conteudomodal">
                                        <label class="control-label">Nome do(a) morador(a) solicitante:</label>
                                        <input name="nomedomorador" type="text" id="nomemorador" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Bloco e Apartamento:</label>
                                        <input name="apartamento" type="text" id="apartamento" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Telefone do(a) morador(a):</label>
                                        <input name="telefoneresidencia" type="text" id="telefonecasa" value="">
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Celular do(a) morador(a):</label>
                                        <input name="celular" type="text" id="celularmorador" value="">
                                    </div>
                                    <div class="conteudomodal" hidden>
                                        <label class="control-label">E-mail do(a) morador(a):</label>
                                        <input name="emaildomorador" type="email" id="emailmorador" value="">
                                    </div>
                                    <div class="conteudomodal" hidden>
                                        <label class="control-label">Data do Cadastro:</label>
                                        <input name="datadobloqueio" type="text" value="<?php echo date('d/m/Y');?>">
                                    </div>
                                    <input name="imgdeatent" type="text" value="atent.png" hidden>
                                    <input name="ID" type="text" id="getcod" value="" hidden>

                                    <div class="selectmodal">
                                        <label class="control-label">Tipos de restrições:</label>
                                        <select name="selecione_tipo_restri1" id="typedeficiente" required>
                                            <option value="">Selecione o tipo</option>
                                            <option value="SAÍDA APENAS COM PERMISSÃO">SAÍDA APENAS COM PERMISSÃO
                                            </option>
                                            <option value="MEDIDA PROTETIVA">MEDIDA PROTETIVA</option>
                                            <option value="ACESSO PROÍBIDO">ACESSO PROÍBIDO</option>
                                            <option value="">OUTROS</option>
                                        </select>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Outros tipos de restrições:</label>
                                        <input name="selecione_tipo_restri2" type="text"
                                            placeholder="Digite o tipo de restrição se não estiver na lista ">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Nome completo:</label>
                                        <input name="nomedobloqueado" type="text"
                                            placeholder="Digite o nome da pessoas que esta restrita">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Documnto (obrigatório):</label>
                                        <input name="documentodobloqueado" type="text" placeholder="Documentação(RG)"
                                            id="doocumentorestringir" autocomplete="off" maxlength="12"
                                            onkeyup="Mascara_rg('##.###.###-#', this)">
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Outros tipos de restrições:</label>
                                        <textarea name="descridobloqueio" id=""
                                            placeholder="Descreva detalhadamente o motivo do bloqueio"></textarea>
                                    </div>
                                    <div class="contfotodavisita">
                                        <div class="container-foto-visit" onclick="Botaoativarfotobloqueados()">
                                            <div class="addphotoblock">
                                                <!-- add div somene para manter o padrão de edição no css-->
                                                <div class="wrapper-foto-visit">
                                                    <!-- div origonal que esta com o padão no css -->

                                                    <div class="image-foto-visit">
                                                        <img id="fotobloqueados" src="" alt="">
                                                    </div>

                                                    <div class="content-foto-visit">
                                                        <div class="icon-foto-block">
                                                            <ion-icon name="lock-closed-outline"></ion-icon>
                                                        </div>
                                                        <div class="text-foto-visit">Imagem Obrigatória</div>
                                                    </div>
                                                    <div id="sair-bt-foto-visit"><i class="fas fa-times"></i></div>
                                                    <div class="nome-aquivo-foto-visit">Nome do Arquivo</i></div>
                                                </div>
                                            </div>
                                            <label for="inputlg" for="name"></label>
                                            <input id="bt-carfot-foto-bloqueados" type="file" name="fotoo" hidden>
                                        </div>
                                    </div>
                                    <div class="btncadentregas">
                                        <button class="" type="submit">Bloquear</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cadastrar novo funcinário no banco -->
            <div class="modal fade" id="modalcadastrarfuncionarios" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="max_height_modal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../ENVIOSBD/enviarfuncionariosbd.php"
                                enctype="multipart/form-data">
                                <div class="weppermodal">
                                    <div class="conteudomodal">
                                        <label class="control-label">Nome do(a) funcionário(a):</label>
                                        <input name="Nome_funcionario" type="text" placeholder="Nome completo" required>
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Bloco e Apartamento:</label>
                                        <input name="Aprtamento" type="text"
                                            placeholder="Digita o bloco e apartamento de trabalho" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Telefone do funcionário(a):</label>
                                        <input type="text" name="Telefone_funcionario" id="datanascimento"
                                            placeholder="Exemplo: 1998" onblur="somaridade()" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Documento do(a) funcionário(a):</label>
                                        <input name="documentofuncionario" type="text"
                                            placeholder="Exemplo: 00.000.000-0" id="documentfuncionario"
                                            autocomplete="off" onkeyup="Mascara_rgfuncionario('##.###.###-#', this)"
                                            maxlength="12" required>
                                    </div>
                                    <div class="selectmodal">
                                        <label class="control-label">Selecine Tipo de acesso:</label>
                                        <select name="select_tipodeentrada">
                                            <option value="">Selecione o tipo</option>
                                            <option value="Sem comunicar">Sem comunicar</option>
                                            <option value="Comunicar">Comunicar</option>
                                        </select>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Horário de entrada:</label>
                                        <input name="horarioentrada" type="time" required>
                                    </div>
                                    <div class="contfotodavisita">
                                        <div class="container-foto-visit" onclick="Botaoativarfotofuncionario()">
                                            <div class="addphotofuncionario">
                                                <!-- add div somene para manter o padrão de edição no css-->
                                                <div class="wrapper-foto-visit">
                                                    <!-- div origonal que esta com o padão no css -->

                                                    <div class="image-foto-visit">
                                                        <img id="fotofuncionarios" src="" alt="">
                                                    </div>

                                                    <div class="content-foto-visit">
                                                        <div class="icon-foto-block">
                                                            <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                                                        </div>
                                                        <div class="text-foto-visit">Imagem Obrigatória</div>
                                                    </div>
                                                    <div id="sair-bt-foto-visit"><i class="fas fa-times"></i></div>
                                                    <div class="nome-aquivo-foto-visit">Nome do Arquivo</i></div>
                                                </div>
                                            </div>
                                            <label for="inputlg" for="name"></label>
                                            <input id="bt-carfot-foto-funcionarios" type="file" name="fotoo" hidden>
                                        </div>
                                    </div>
                                    <div class="conteudomodal">
                                        <input name="nome_registrador" type="hidden" value="<?php echo $testedenome;?>"
                                            placeholder="Nome do Porteiro Registrador" required>
                                    </div>

                                    <input type="hidden" name="data_cadastro" value="<?php echo date('d/m/Y');?>">
                                    <input type="hidden" name="hora_cadastro" value="<?php echo date('H:i:s');?>">

                                    <div class="btncadentregas">
                                        <a href="../LISTTABLES/table_458524552funcionarios.php">Listas</a>
                                        <button class="" type="submit">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Cadastrar novo veículo no banco -->
            <div class="modal fade" id="modalcadastrarveiculo" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="max_height_modal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../ENVIOSBD/enviarcarrobd.php" enctype="multipart/form-data">
                                <div class="weppermodal">
                                    <div class="conteudomodal">
                                        <label class="control-label">Bloco e Apartamento:</label>
                                        <input name="Apartamento_bloco" type="text"
                                            placeholder="Digita o bloco e apartamento" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Vaga de estacionamento:</label>
                                        <input name="Estacionamento" type="text" placeholder="Digita o N° da vaga"
                                            required>
                                    </div>

                                    <div class="conteudomodal">
                                        <label class="control-label">Nome do veículo:</label>
                                        <input name="Nome_veiculo" type="text" placeholder="Digite o nome" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Marca do veículo:</label>
                                        <input type="text" name="Marca_veiculo" placeholder="Exemplo: Chevrolet"
                                            onblur="somaridade()" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Cor do veículo:</label>
                                        <input type="text" name="Cor_veiculo" placeholder="Exemplo: Preto"
                                            onblur="somaridade()" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Placa do veículo:</label>
                                        <input type="text" name="Placa_veiculo" placeholder="Exemplo: GTD-4582"
                                            onblur="somaridade()" required>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Ano do veículo:</label>
                                        <input name="Ano_veiculo" type="text" placeholder="Exemplo: 2019" required>
                                    </div>
                                    <div class="contfotodavisita">
                                        <div class="container-foto-visit" onclick="Botaoativarfotoveiculo()">
                                            <div class="addphotoveiculo">
                                                <!-- add div somene para manter o padrão de edição no css-->
                                                <div class="wrapper-foto-visit">
                                                    <!-- div origonal que esta com o padão no css -->

                                                    <div class="image-foto-visit">
                                                        <img id="fotoveiculo" src="" alt="">
                                                    </div>

                                                    <div class="content-foto-visit">
                                                        <div class="icon-foto-block">
                                                            <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                                                        </div>
                                                        <div class="text-foto-visit">Imagem Obrigatória</div>
                                                    </div>
                                                    <div id="sair-bt-foto-visit"><i class="fas fa-times"></i></div>
                                                    <div class="nome-aquivo-foto-visit">Nome do Arquivo</i></div>
                                                </div>
                                            </div>
                                            <label for="inputlg" for="name"></label>
                                            <input id="bt-carfot-foto-veiculo" type="file" name="fotoo" hidden>
                                        </div>
                                    </div>
                                    <input type="hidden" name="datecad" value="<?php echo date('d/m/Y');?>">
                                    <input type="hidden" name="horacad" value="<?php echo date('H:i:s');?>">
                                    <div class="btncadentregas">
                                        <a href="../LISTTABLES/table_458526235234552veiculos.php">Listas</a>
                                        <button class="" type="submit">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Cadastrar novo animais no banco -->
            <div class="modal fade" id="modalcadastraranimais" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="max_height_modal">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="../ENVIOSBD/enviarpetbd.php" enctype="multipart/form-data">
                                <div class="weppermodal">
                                    <div class="conteudomodal">
                                        <label class="control-label">Bloco e Apartamento:</label>
                                        <input name="Apartamento_pet" type="text"
                                            placeholder="Digite o bloco e apartamento" required>
                                    </div>

                                    <div class="selectmodal">
                                        <label class="control-label">Selecine Tipo de animal:</label>
                                        <select name="Tipo_animal" id="animais">
                                            <option value="">Tipo de Animal:</option>
                                            <option value="Cães">Cães</option>
                                            <option value="Gatos">Gatos</option>
                                            <option value="Coelhos">Coelhos</option>
                                            <option value="Hamsters">Hamsters</option>
                                        </select>
                                    </div>
                                    <div id="paiselect">
                                        <div class="selectmodal" id="Cães">
                                            <label class="control-label">Selecine Tipo de animal:</label>
                                            <select name="anomal_cao">
                                                <option value="">Tipo de Raças de Cães:</option>
                                                <option value="Akita">Akita</option>
                                                <option value="Basset hound">Basset hound</option>
                                                <option value="Beagle">Beagle</option>
                                                <option value="Bichon frisé">Bichon frisé</option>
                                                <option value="Boiadeiro australiano">Boiadeiro australiano</option>
                                                <option value="Border collie">Border collie</option>
                                                <option value="Boston terrier">Boston terrier</option>
                                                <option value="Boxer">Boxer</option>
                                                <option value="Buldogue francês">Buldogue francês</option>
                                                <option value="Buldogue inglês">Buldogue inglês</option>
                                                <option value="Bull terrier">Bull terrier</option>
                                                <option value="Cane corso">Cane corso</option>
                                                <option value="Cavalier king charles spaniel">Cavalier king charles
                                                    spaniel</option>
                                                <option value="Chihuahua">Chihuahua</option>
                                                <option value="Chow chow">Chow chow</option>
                                                <option value="Cocker spaniel inglês">Cocker spaniel inglês</option>
                                                <option value="Dachshund">Dachshund</option>
                                                <option value="Dálmata">Dálmata</option>
                                                <option value="Doberman">Doberman</option>
                                                <option value="Dogo argentino">Dogo argentino</option>
                                                <option value="Dogue alemão">Dogue alemão</option>
                                                <option value="Fila brasileiro">Fila brasileiro</option>
                                                <option value="Golden retriever">Golden retriever</option>
                                                <option value="Husky siberiano">Husky siberiano</option>
                                                <option value="Jack russell terrier">Jack russell terrier</option>
                                                <option value="Labrador retriever">Labrador retriever</option>
                                                <option value="Lhasa apso">Lhasa apso</option>
                                                <option value="Lulu da pomerânia">Lulu da pomerânia</option>
                                                <option value="Maltês">Maltês</option>
                                                <option value="Mastiff inglês">Mastiff inglês</option>
                                                <option value="Mastim tibetano">Mastim tibetano</option>
                                                <option value="Pastor alemão">Pastor alemão</option>
                                                <option value="Pastor australiano">Pastor australiano</option>
                                                <option value="Pastor de Shetland">Pastor de Shetland</option>
                                                <option value="Pequinês">Pequinês</option>
                                                <option value="Pinscher">Pinscher</option>
                                                <option value="Pit bull">Pit bull</option>
                                                <option value="Poodle">Poodle</option>
                                                <option value="Pug">Pug</option>
                                                <option value="Rottweiler">Rottweiler</option>
                                                <option value="Schnauzer">Schnauzer</option>
                                                <option value="Shar-pei">Shar-pei</option>
                                                <option value="Shiba">Shiba</option>
                                                <option value="Shih tzu">Shih tzu</option>
                                                <option value="Staffordshire bull terrier">Staffordshire bull terrier
                                                </option>
                                                <option value="Weimaraner">Weimaraner</option>
                                                <option value="Yorkshire">Yorkshire</option>
                                                <option value="Raça indefinida">Raça indefinida</option>
                                            </select>
                                        </div>
                                        <div class="selectmodal" id="Gatos">
                                            <label class="control-label">Selecine Tipo de animal:</label>
                                            <select name="animal_gato">
                                                <option value="">Tipo de Raças de Gatos:</option>
                                                <option value="Abissínio">Abissínio</option>
                                                <option value="Angorá">Angorá</option>
                                                <option value="Ashera">Ashera</option>
                                                <option value="Balinês">Balinês</option>
                                                <option value="Bengal">Bengal</option>
                                                <option value="Bobtail americano">Bobtail americano</option>
                                                <option value="Bobtail japonês">Bobtail japonês</option>
                                                <option value="Bombay">Bombay</option>
                                                <option value="Burmês">Burmês</option>
                                                <option value="Burmês vermelho">Burmês vermelho</option>
                                                <option value="Chartreux">Chartreux</option>
                                                <option value="Colorpoint de Pêlo Curto">Colorpoint de Pêlo Curto
                                                </option>
                                                <option value="Cornish Rex">Cornish Rex</option>
                                                <option value="Curl Americano">Curl Americano</option>
                                                <option value="Devon Rex">Devon Rex</option>
                                                <option value="Himalaio">Himalaio</option>
                                                <option value="Jaguatirica">Jaguatirica</option>
                                                <option value="Javanês">Javanês</option>
                                                <option value="Korat">Korat</option>
                                                <option value="LaPerm">LaPerm</option>
                                                <option value="Maine Coon">Maine Coon</option>
                                                <option value="Manx">Manx</option>
                                                <option value="Cymric">Cymric</option>
                                                <option value="Mau Egípcio">Mau Egípcio</option>
                                                <option value="Mist Australiano">Mist Australiano</option>
                                                <option value="Munchkin">Munchkin</option>
                                                <option value="Norueguês da Floresta">Norueguês da Floresta</option>
                                                <option value="Pelo curto americano">Pelo curto americano</option>
                                                <option value="Pelo curto brasileiro">Pelo curto brasileiro</option>
                                                <option value="Pelo curto europeu">Pelo curto europeu</option>
                                                <option value="Pelo curto inglês">Pelo curto inglês</option>
                                                <option value="Persa">Persa</option>
                                                <option value="Pixie-bob">Pixie-bob</option>
                                                <option value="Ragdol">Ragdol</option>
                                                <option value="Ocicat">Ocicat</option>
                                                <option value="Russo Azul">Russo Azul</option>
                                                <option value="Sagrado da Birmânia">Sagrado da Birmânia</option>
                                                <option value="Savannah">Savannah</option>
                                                <option value="Scottish Fold">Scottish Fold</option>
                                                <option value="Selkirk Rex">Selkirk Rex</option>
                                                <option value="Siamês">Siamês</option>
                                                <option value="Siberiano">Siberiano</option>
                                                <option value="Singapura">Singapura</option>
                                                <option value="Somali">Somali</option>
                                                <option value="Sphynx">Sphynx</option>
                                                <option value="Thai">Thai</option>
                                                <option value="Toyger">Toyger</option>
                                                <option value="Usuri">Usuri</option>
                                                <option value="Raça indefinida">Raça indefinida</option>
                                            </select>
                                        </div>
                                        <div class="selectmodal" id="Coelhos">
                                            <label class="control-label">Selecine Tipo de animal:</label>
                                            <select name="animal_coelho">
                                                <option value="">Tipo de Raças de Coelhos:</option>
                                                <option value="Rex">Rex</option>
                                                <option value="Holland lop">Holland lop</option>
                                                <option value="Ashera">Cabeça de leão</option>
                                                <option value="Balinês">lionhead</option>
                                                <option value="Angorá inglês">Angorá inglês</option>
                                                <option value="Anão holandês">Anão holandês</option>
                                                <option value="Raça indefinida">Raça indefinida</option>
                                            </select>
                                        </div>
                                        <div class="selectmodal" id="Hamsters">
                                            <label class="control-label">Selecine Tipo de animal:</label>
                                            <select name="animal_hamster">
                                                <option value="">Tipo de Raças de Hamsters:</option>
                                                <option value="anão">anão</option>
                                                <option value="chinês">chinês</option>
                                                <option value="russo">russo</option>
                                                <option value="húngaro">húngaro</option>
                                                <option value="Angorá inglês">anão russo de Campbell.</option>
                                                <option value="Raça indefinida">Raça indefinida</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="conteudomodal">
                                        <label class="control-label">Nome ou aplelido do animal:</label>
                                        <input name="animal_nome" type="text"
                                            placeholder="Digite o nome ou apelido" e required>
                                    </div>
                                    <div class="contfotodavisita">
                                        <div class="container-foto-visit" onclick="Botaoativarfotoanimais()">
                                            <div class="addphotoanimais">
                                                <!-- add div somene para manter o padrão de edição no css-->
                                                <div class="wrapper-foto-visit">
                                                    <!-- div origonal que esta com o padão no css -->

                                                    <div class="image-foto-visit">
                                                        <img id="fotoanimais" src="" alt="">
                                                    </div>

                                                    <div class="content-foto-visit">
                                                        <div class="icon-foto-block">
                                                            <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                                                        </div>
                                                        <div class="text-foto-visit">Imagem Obrigatória</div>
                                                    </div>
                                                    <div id="sair-bt-foto-visit"><i class="fas fa-times"></i></div>
                                                    <div class="nome-aquivo-foto-visit">Nome do Arquivo</i></div>
                                                </div>
                                            </div>
                                            <label for="inputlg" for="name"></label>
                                            <input id="bt-carfot-foto-animais" type="file" name="fotoo" hidden>
                                        </div>
                                    </div>
                                    <div class="conteudomodal">
                                        <input name="nome_registrador" type="hidden" value="<?php echo $testedenome;?>"
                                            placeholder="Nome do Porteiro Registrador" required>
                                    </div>

                                    <input type="hidden" name="data_cadastro" value="<?php echo date('d/m/Y');?>">
                                    <input type="hidden" name="hora_cadastro" value="<?php echo date('H:i:s');?>">

                                    <div class="btncadentregas">
                                        <a href="../LISTTABLES/table_458526235234552animais.php">Listas</a>
                                        <button class="" type="submit">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
            < /> <!--Include all compiled plugins(below), or include individual files as needed-- > <
            script src = "../../js/bootstrap.min.js" >
            </script>
            <script type="text/javascript">
            $('#modalsabermaisinforma').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recebecasa = button.data('trazapartamento') // Extract info from data-* attributes
                var recebenome = button.data('traznomemorador')
                var recebealocado = button.data('trazladoalocado')
                var recebenascimento = button.data('trazanonascimento')
                var recebedocumento = button.data('trazdocumento')
                var recebesexo = button.data('trazsexo')
                var recebetelresidencia = button.data('traztelefoneresidencia')
                var recebecelular = button.data('trazcelular')
                var recebecelemerg = button.data('trazcelularemergencia')
                var recebeportador = button.data('trazportadorcelemergencia')
                var recebetiporesidente = button.data('traztiporesidente')
                var recebedeficiente = button.data('trazdeficiente')
                var recebetipodefici = button.data('traztipodeficiencia')
                var recebeemail = button.data('trazemailmorador')
                var recebedatacadastro = button.data('trazdatadocadastro')
                var recebeidade = button.data('trazidademorador')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Dados do morador: ' + recebenome)
                modal.find('#apartamento').val(recebecasa)
                modal.find('#nomemorador').val(recebenome)
                modal.find('#alocado').val(recebealocado)
                modal.find('#anonascimento').val(recebenascimento)
                modal.find('#documento').val(recebedocumento)
                modal.find('#sexomorador').val(recebesexo)
                modal.find('#telefonecasa').val(recebetelresidencia)
                modal.find('#celularmorador').val(recebecelular)
                modal.find('#celularemergencia').val(recebecelemerg)
                modal.find('#portador').val(recebeportador)
                modal.find('#tiporesidente').val(recebetiporesidente)
                modal.find('#sedeficiente').val(recebedeficiente)
                modal.find('#tipodeficiencia').val(recebetipodefici)
                modal.find('#emailmorador').val(recebeemail)
                modal.find('#datadocadastro').val(recebedatacadastro)
                modal.find('#idademorador').val(recebeidade)
            })

            $('#modalbloquearvisita').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recebecasa = button.data('trazapartamento') // Extract info from data-* attributes
                var recebenome = button.data('traznomemorador')
                var recebetelresidencia = button.data('traztelefoneresidencia')
                var recebecelular = button.data('trazcelular')
                var recebeemail = button.data('trazemailmorador')
                var recebeid = button.data('trazidmorador')


                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Restringir acesso solicitado')
                modal.find('#apartamento').val(recebecasa)
                modal.find('#nomemorador').val(recebenome)
                modal.find('#telefonecasa').val(recebetelresidencia)
                modal.find('#celularmorador').val(recebecelular)
                modal.find('#emailmorador').val(recebeemail)
                modal.find('#getcod').val(recebeid)
            })
            </script>
        </main>
    </header>

</html>