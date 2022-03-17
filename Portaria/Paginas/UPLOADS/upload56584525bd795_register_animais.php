<?php include_once"../CONECT/conexao.php";?>

<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

$Apartamento = filter_input(INPUT_POST, 'Apartamento', FILTER_DEFAULT);
$tipo_animal = filter_input(INPUT_POST, 'tipo_animal', FILTER_DEFAULT);
$Nome_animal = filter_input(INPUT_POST, 'Nome_animal', FILTER_DEFAULT);

$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  meuspet SET numapart = '$Apartamento', tipopet = '$tipo_animal', nomepet = '$Nome_animal' WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../Records/cadastros58245659582geristros4523112.php");
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>
