<?php include_once"../CONECT/conexao.php";?>

<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

$nomedofuncionario = filter_input(INPUT_POST, 'nome_funcionario', FILTER_DEFAULT);
$Apartamento = filter_input(INPUT_POST, 'Apartamento', FILTER_DEFAULT);
$Documento = filter_input(INPUT_POST, 'documento_funcionario', FILTER_DEFAULT);
$Celular = filter_input(INPUT_POST, 'Celular', FILTER_DEFAULT);
$horario = filter_input(INPUT_POST, 'Horario_trabalho', FILTER_DEFAULT);
$Acesso = filter_input(INPUT_POST, 'Permissao', FILTER_DEFAULT); 



$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  funcionarioos SET nomefunc = '$nomedofuncionario', numapartament = '$Apartamento', documentofunc = '$Documento', celularfunc = '$Celular', horario = '$horario', permicao = '$Acesso' WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../Records/cadastros58245659582geristros4523112.php");
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>
