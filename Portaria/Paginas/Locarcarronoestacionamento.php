<?php include_once"../conexao.php";

$idcar = $_POST["iddocarro"];

$nomevei = $_POST["nomecar"];
$marcavei = $_POST["marcacar"];
$corvei = $_POST["corcar"];
$placavei = $_POST["placacar"];
$anovei = $_POST["anocar"];
$numcasa = $_POST["numaprtamentocar"];
$vaga = $_POST["umavagaocupada"];
$conexao = mysqli_connect($servidor,$usuario,$senha,$dbnome);
mysqli_select_db($conexao, 'dbnome');

$sql = "INSERT INTO Registrosentradadeveiculos (residencia,nomeveiculo,marcaveiculo,cordoveiculo,pladoveiculo,anodoveiculo) VALUES ('$numcasa','$nomevei','$marcavei','$corvei','$placavei','$anovei')";
$editartbveiculos = "UPDATE  veiculos SET alocado = '$vaga' WHERE id = '$idcar'";


if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Moradorador do apartamento $numcasa, acaba de solicitar uma vaga.');window.location = '../index.php';</script>";
    if (mysqli_query($conexao, $editartbveiculos)) {
        echo "<script>alert('O mesmo(A) só poderá utilizar outra vaga após liberar a que esta alocada.');window.location = '../index.php';</script>";
    };
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);

close(conexao);
?>