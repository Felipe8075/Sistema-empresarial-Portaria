<?php include_once"../conexao.php";?>


<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

$residencetele = $_POST['telef-residencial'];
$celularum = $_POST['telef-celular1'];
$mudemail = $_POST['email'];
$senhaum = $_POST['grau'];



$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  cmoradores SET teleRes = '$residencetele', teleCel1 = '$celularum', emailMor = '$mudemail', nomeDef = '$senhaum', grauPar = '$senhaum' WHERE codigo = '$id'";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Dados atualizados com sucesso !');window.location = 'https://www.google.com';</script>";
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>
<!--  -->