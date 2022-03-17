<?php
session_start();
include_once("../CONECT/conexao.php");

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
    <link rel="stylesheet" href="../../CSS/tables.css">
    <link rel="stylesheet" href="../../CSS/fonts.css">
    <title>Registro de visitas</title>
</head>

<body>
    <!-- TABELA DE PRÉ AUTORIZAÇÕES -->
    <?php
                    $filtro_sql = "";
                    $sql = "select * from visitas $filtro_sql";
                    $consulta = mysqli_query($conexao,$sql);
                    $busca = mysqli_num_rows($consulta);
                ?>
    <main>
        <div class="conteinertables">
            <div class="wappertables">
                <div class="headertitlestables">
                    <h1>Lista de visitas pré cadastradas</h1>
                </div>
                <div class="conteiner_da_tabela">

                    <!-- INCLUIDO BUSCO NA TABELA DA REGISTROS DE ENTRADAS DE VISITANTES -->

                    <?php
                    include_once("../CONECT/conexao.php");
                    if ( $_POST != NULL) {
                        $filtro = $_POST["buscacom_filtro"];

                            $filtro_sql = "WHERE apart ='$filtro'
                                or nomevisita LIKE '%$filtro%'
                                or nomecarro LIKE '%$filtro%'
                                or corcarro LIKE '%$filtro%'
                                or placa LIKE '%$filtro%'
                                or 	documento LIKE '%$filtro%'";

                    }
                
                    $busca2 = filter_input(INPUT_GET,"buscacom_filtro");

                    $sql = "select * from visitas $filtro_sql";
                    $consulta = mysqli_query($conexao,$sql);
                    $busca = mysqli_num_rows($consulta);
                    ?>
                    <!-- FIM DA INCLUSÃO DO CAMPO BUSCO NA TABELA DA REGISTROS DE ENTRADAS DE VISITANTES -->

                    <div class="contentcampbuscar">
                        <form method="POST">
                            <div>
                                <label>Busca de visitantes</label>
                            </div>
                            <input type="text" name="buscacom_filtro" class="form-control"
                                placeholder="Nome, Documento e tipo">
                            <button class="" type="submit">Limpar Campo</button>
                        </form>
                       <div class="buttonhomer">
                            <a href="../home0232022520portarias458pages5658.php"><button class="" type="submit">Home</button></a>
                        </div>
                    </div>

                    <!-- <div class="headertables">
                        <div id="nome">Nome do visitante</div>
                        <div id="telefone">Telefone</div>
                        <div id="documento">Documento</div>
                        <div>Tipo de visita</div>
                    </div> -->
                    <div class="cardtables row">
                        <table class="tablelasgeral">
                            <tr>
                                <th>Nome do visitante</th>
                                <th>Telefone</th>
                                <th>Documento</th>
                                <th>Tipo de visita</th>
                                <th></th>
                            </tr>

                            <?php 
                                        while($receberRegistros = mysqli_fetch_array($consulta)){
                                            $visita = $receberRegistros['nomevisita'];
                                            $nomedocar = $receberRegistros['nomecarro'];
                                            $contato = $receberRegistros['contatovisita'];
                                            $placa = $receberRegistros['placa'];
                                            $fot = $receberRegistros['imagemvisita']; 
                                            $hor = $receberRegistros['entradahora'];
                                            $tpovisita = $receberRegistros['tipovisita'];
                                            $marcadocar = $receberRegistros['marcacarro'];
                                            $carrocor = $receberRegistros['corcarro'];
                                            $placadocar = $receberRegistros['placa'];
                                            $btnentrar = $receberRegistros['imgbtnentredavisita'];
                                            $document = $receberRegistros['documento'];
                                        ?>



                            <tr>
                                <td><?php echo $visita;?></td>
                                <td><?php echo $contato;?></td>
                                <td><?php echo $document;?></td>
                                <td><?php echo $tpovisita;?></td>
                                <td>
                                    <div><a
                                            href="../darentredavisita.php?resultdados=<?php echo $receberRegistros['id'];?>"><img
                                                src="../../Galeria/imagensdiversas/<?php echo $btnentrar;?>"
                                                alt=""></a></a></div>
                                </td>
                                <?php }; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>

</html>