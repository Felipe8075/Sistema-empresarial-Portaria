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
                    $sql = "SELECT * FROM entregas $filtro_sql";
                    $consulta = mysqli_query($conexao,$sql);
                    $busca = mysqli_num_rows($consulta);
                ?>
    <main>
        <div class="conteinertables">
            <div class="wappertables">
                <div class="headertitlestables">
                    <h1>Histórico de correspondências</h1>
                </div>
                <div class="conteiner_da_tabela">

                    <!-- INCLUIDO BUSCO NA TABELA DA REGISTROS DE ENTRADAS DE VISITANTES -->

                    <?php
                    include_once("../CONECT/conexao.php");
                    if ( $_POST != NULL) {
                        $filtro = $_POST["buscacom_filtro"];

                            $filtro_sql = "WHERE residence ='$filtro'
                                or corpacote LIKE '%$filtro%'
                                or fornecedor LIKE '%$filtro%'
                                or volume LIKE '%$filtro%'
                                or dataentrega LIKE '%$filtro%'
                                or 	nomedestino LIKE '%$filtro%'";

                    }
                
                    $busca2 = filter_input(INPUT_GET,"buscacom_filtro");

                    $sql = "SELECT * FROM entregas $filtro_sql";
                    $consulta = mysqli_query($conexao,$sql);
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

                    <div class="cardtables row">
                        <table class="tablelasgeral">
                        <tr>
                            <th>Apart</th>
                            <th>Cor</th>
                            <th>Fornecedor</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Entrada</th>
                            <th>Recebedor</th>
                            <th>Saída</th>
                            <th>Entregador</th>
                            <th>Retirado</th>
                        </tr>
                            <?php 
                                while($registrosentrega = mysqli_fetch_array($consulta)){
                                       $residence = $registrosentrega['residence'];
                                    $corpack = $registrosentrega['corpacote'];
                                    $fornecedor = $registrosentrega['fornecedor'];
                                    $volume = $registrosentrega['volume'];
                                    $descrission = $registrosentrega['informassion'];
                                    $data = $registrosentrega['datarecebida'];
                                    $hora = $registrosentrega['horarecebido'];
                                    // $photo = $registrosentrega['fotografiaentregs'];
                                    $Resposta = $registrosentrega['resposta'];
                                    $recebedor = $registrosentrega['recebidopor'];
                                    $quemretira =$registrosentrega['reiradopor'];
                                    $entregdat = $registrosentrega['dataentrega'];
                                    $entregadhor = $registrosentrega['horaentraega'];
                                    $entregador = $registrosentrega['entreguepor'];
                                    $confirme = $registrosentrega['confirme'];
                            ?>


                            <tr>
                                <td><?php echo $residence;?></td>
                                <td><?php echo $corpack;?></td>
                                <td><?php echo $fornecedor;?></td>
                                <td><?php echo $volume;?></td>
                                <td><?php echo $descrission;?></td>
                                <td><?php echo $data;?><br><?php echo $hora;?></td>
                                <!-- <td><img src="../Galeria/Fotosentregs/<?php echo $photo;?>"width="60" height="60"></td> -->
                                <!-- <td ><a class="btnimagenscorresp" href="confirmentregs.php?resultdados=<?php echo $registrosentrega['id'];?>"><img src="../Galeria/Fotosentregs/<?php echo $Resposta;?>" alt=""></a><img class="imgconfimeentrega" src="../Galeria/Fotosentregs/<?php echo $confirme;?>" alt=""></td> -->
                                <td><?php echo $recebedor;?></td>
                                <td><?php echo $entregdat;?><br><?php echo $entregadhor;?></td>
                                <td><?php echo $quemretira;?></td>
                                <td><?php echo $entregador;?></td>
                            
                            </tr>
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