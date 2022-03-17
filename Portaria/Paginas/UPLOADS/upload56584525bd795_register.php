<?php include_once"../CONECT/conexao.php";?>

<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

$nomedomorador = filter_input(INPUT_POST, 'nome_moradorC', FILTER_DEFAULT);
$aparbloco = filter_input(INPUT_POST, 'num-apartamento', FILTER_DEFAULT);
$datadenascimento = filter_input(INPUT_POST, 'nascimento-date', FILTER_DEFAULT);
$residencetele = filter_input(INPUT_POST, 'telef-residencial', FILTER_DEFAULT);
$celularum = filter_input(INPUT_POST, 'telef-celular1', FILTER_DEFAULT);
$celulardois = filter_input(INPUT_POST, 'telef-celular2', FILTER_DEFAULT);
$emergencia = filter_input(INPUT_POST, 'tel-emergencia', FILTER_DEFAULT);
$mudemail = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$alocado = filter_input(INPUT_POST, 'alocacao', FILTER_DEFAULT); 
$sexoo = filter_input(INPUT_POST, 'sexo', FILTER_DEFAULT); 
$tipodemorador = filter_input(INPUT_POST, 'situacao', FILTER_DEFAULT); 
$tipodedeficiencia = filter_input(INPUT_POST, 'existe', FILTER_DEFAULT); 



$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  cmoradores SET nomeMor = '$nomedomorador', apt = '$aparbloco', anonasc = '$datadenascimento', teleRes = '$residencetele', teleCel1 = '$celularum', teleCel2 = '$celulardois', teleEMR = '$emergencia', emailMor = '$mudemail', alocado = '$alocado', sexo = '$sexoo', situacao = '$tipodemorador', tipoDef = '$tipodedeficiencia' WHERE codigo = '$id'";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../Records/cadastros58245659582geristros4523112.php");
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>
