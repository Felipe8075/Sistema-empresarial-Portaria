
<?php include "../conexao.php"; 
$id = $_REQUEST['entrega'];

$selecione ="DELETE FROM entregas WHERE id ='$id'";
mysqli_query($conexao, $selecione);
header("Location: Pageentregs.php");
?>
