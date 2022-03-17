<?php include_once"../CONECT/conexao.php";?>


<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue

$id = filter_input(INPUT_POST, 'iid', FILTER_DEFAULT);
$datasaida = filter_input(INPUT_POST, 'datadesaida', FILTER_DEFAULT);
$horasaida = filter_input(INPUT_POST, 'horadesaida', FILTER_DEFAULT);
$botaoum = filter_input(INPUT_POST, 'buttonprimeiro', FILTER_DEFAULT);
$botaodois = filter_input(INPUT_POST, 'buttonsegundo', FILTER_DEFAULT);


$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  registrosdeentrada SET 	datadesaida = '$datasaida', horadesaida = '$horasaida', button = '$botaoum', buttonII = '$botaodois', abaprestador = '$botaoum' WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Visita encerrada!'); window.location = '../home0232022520portarias458pages5658.php';</script>";
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>

