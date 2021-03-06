<?php 

include_once("../CONECT/conexao.php");
session_start();
include("../Verify/test_56854258921finich.php");
date_default_timezone_set('America/Sao_Paulo'); 
date_default_timezone_set("Brazil/East");

// selecione toda a minha tabela de moradores no banco de dados cadastro
$sql = "SELECT * FROM funcionarioos";
$consulta = mysqli_query($conexao,$sql);

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

    <!-- fun????o para mostrar e esconder o conteiner com as informa????es da empresa do prestador -->
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
                        Registros cadastrais dos funcion??rios
                    </div>
                    <div class="main_button_page_new_register">
                        <div class="button_get_new_register">
                            <a href="../Records/cadastros58245659582geristros4523112.php"><i class="fas fa-times"></i> <span> Sair da p??gina</span></a>
                        </div>
                    </div>
                    <!-- filtragem de busca no banco de dados na tabela de cadastro de moradores -->


                    <?php
                        $filtro_sql = "";
                        if ( $_POST != NULL) {
                            $filtro = $_POST["filtra-busca"];
                                $filtro_sql = "WHERE id LIKE'%$filtro%'
                                    OR numapartament LIKE'%$filtro%'
                                    OR nomefunc LIKE '%$filtro%'";
                        }
                        $busca2 = filter_input(INPUT_GET,"filtra-busca");
                        $sql = "SELECT * FROM funcionarioos $filtro_sql";
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
                                <th>Documanto</th>
                                <th>Celular</th>
                                <th>Hor??rio</th>
                                <th>Permiss??o</th>
                                <th>Data do Registro</th>
                                <th>Hor??rio do registro</th>
                                <th>Atualizar</th>
                                <th></th>
                            </tr>
                            <?php
                                    while($receberRegistros = mysqli_fetch_array($consulta)){
                                    $id = $receberRegistros['id'];
                                    $bloapart = $receberRegistros['numapartament'];
                                    $funcionario = $receberRegistros['nomefunc'];
                                    $documento = $receberRegistros['documentofunc'];
                                    $Celular = $receberRegistros['celularfunc'];
                                    $horarioexpedi = $receberRegistros['horario'];
                                    $permissao = $receberRegistros['permicao'];
                                    $data_registro = $receberRegistros['Data_registro'];
                                    $horario_registro = $receberRegistros['Hora_registro'];
                                    $foto_funcionario = $receberRegistros['fotofunc'];
                                ?>

                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $bloapart;?></td>
                                <td><?php echo $funcionario;?></td>
                                <td><?php echo $documento;?></td>
                                <td><?php echo $Celular;?></td>
                                <td><?php echo $horarioexpedi;?></td>
                                <td><?php echo $permissao;?></td>
                                <td><?php echo $data_registro;?></td>
                                <td><?php echo $horario_registro;?></td>
                                <td>
                                    <div class="more_button"><a
                                            href="../Records/edit_funcionarios865854625547_condominio45852415212.php?inviarid=<?php echo $receberRegistros['id'];?>">Editar
                                            <i class="fas fa-user-edit"></i></div>
                                </td>
                            </tr>
                            <?php }; ?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </header>

</html>