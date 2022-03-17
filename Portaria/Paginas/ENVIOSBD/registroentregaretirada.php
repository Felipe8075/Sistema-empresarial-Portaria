<?php include_once"../CONECT/conexao.php";?>


<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue

$id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
$dtaentrega = filter_input(INPUT_POST, 'entregadta', FILTER_DEFAULT);
$horentrega = filter_input(INPUT_POST, 'entregahra', FILTER_DEFAULT);
$quemretira = filter_input(INPUT_POST, 'nomeretirada', FILTER_DEFAULT);
$entreguepor = filter_input(INPUT_POST, 'nomeporteira', FILTER_DEFAULT);
$btnretirada = filter_input(INPUT_POST, 'imgentrega', FILTER_DEFAULT);
$confirm = filter_input(INPUT_POST, 'imgconfirm', FILTER_DEFAULT);

$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  entregas SET resposta = '$btnretirada', dataentrega = '$dtaentrega', horaentraega = '$horentrega', reiradopor = '$quemretira', entreguepor = '$entreguepor', confirme = '$confirm' WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Entrega Retirada da Portaria!'); window.location = '../home0232022520portarias458pages5658.php';</script>";
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>

