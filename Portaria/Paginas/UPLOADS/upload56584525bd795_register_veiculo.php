<?php include_once"../CONECT/conexao.php";?>

<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

$Apartamento = filter_input(INPUT_POST, 'Apartamento', FILTER_DEFAULT);
$estacionamento = filter_input(INPUT_POST, 'vaga_estacionamento', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'Nome_veiculo', FILTER_DEFAULT);
$marca = filter_input(INPUT_POST, 'marca_veiculo', FILTER_DEFAULT);
$cor = filter_input(INPUT_POST, 'cor_veiculo', FILTER_DEFAULT);
$placa = filter_input(INPUT_POST, 'placa_veiculo', FILTER_DEFAULT); 
$anocar = filter_input(INPUT_POST, 'ano_veiculo', FILTER_DEFAULT); 



$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  veiculos SET residencia = '$Apartamento', blocomorador = '$estacionamento', nomeveiculo = '$nome', 	marcaveiculo = '$marca', cordoveiculo = '$cor', pladoveiculo = '$placa', anodoveiculo = '$anocar' WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../Records/cadastros58245659582geristros4523112.php");
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>
