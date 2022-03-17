<?php

include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id-morador', FILTER_SANTITIZE_NUMBER_INT);
$numero = filter_input(INPUT_POST, 'num-apartamento', FILTER_SANTITIZE_NUMBER_INT);
$bloco = filter_input(INPUT_POST, 'bloco', FILTER_SANTITIZE_STRING);
$alocado = filter_input(INPUT_POST, 'alocacao',FILTER_SANTITIZE_STRING);
$moradornome = filter_input(INPUT_POST, 'nome-moradorC',FILTER_SANTITIZE_STRING);
$datanesciment = filter_input(INPUT_POST, 'data', FILTER_SANTITIZE_STRING);
$document = filter_input(INPUT_POST, 'rgmorador' FILTER_SANTITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'soxomorador', FILTER_SANTITIZE_STRING);
$telresi = filter_input(INPUT_POST, 'telef-residencial', FILTER_SANTITIZE_STRING);
$telcel1 = filter_input(INPUT_POST, 'telef-celular1', FILTER_SANTITIZE_STRING);
$telcel2 = filter_input(INPUT_POST, 'telef-celular2', FILTER_SANTITIZE_STRING);
$status = filter_input(INPUT_POST, 'stat', FILTER_SANTITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANTITIZE_EMAIL);
$deficien = filter_input(INPUT_POST, 'iform-def', FILTER_SANTITIZE_STRING);
$typeDef = filter_input(INPUT_POST, 'tipo-defi', FILTER_SANTITIZE_STRING);
$namededef = filter_input(INPUT_POST, 'nomedodeficiente', FILTER_SANTITIZE_STRING);
$grauparen = filter_input(INPUT_POST, 'grauparentesco', FILTER_SANTITIZE_STRING);
$emergicia = filter_input(INPUT_POST, 'tel', FILTER_SANTITIZE_STRING);





$reset_user = "UPDATE cmoradores SET apt='$numero', bloco='$bloco', alocado='$alocado', nomeMor='$moradornome', datanasci='$datanesciment', documento='$document', sexo='$sexo', teleRes='$telresi', teleCel1='$telcel1', teleCel2='$telcel2', situacao='$status', emailMor='$email', tipoDef='$typeDef', nomeDef='$namededef', grauPar='$grauparen', teleEMR='$emergicia', deficiente='$deficien', modifica=NOW() WHERE codigo='$id'";
$resultadouser = mysqli_query($conexao,$reset_user);

if (mysqli_affected_rows($conexao)){
    $_SESSION['msg'] = "<p style='color:green;'> Morador Alterado com sucesso!</p>";
    header("Location: home.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Morador não pode ser alterado!</p>";
    header("Location: editar.php?id=$id");
}
?>