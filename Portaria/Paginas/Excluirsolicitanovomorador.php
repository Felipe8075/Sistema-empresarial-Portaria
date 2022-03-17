<?php include "../conexao.php";
$id = $_REQUEST['usuario'];
    
$sql ="DELETE FROM solicitacdmorador WHERE codigo ='$id'";
mysqli_query($conexao, $sql);
echo "<script>alert('Morador Deletado!'); window.location = 'cdtmoradores.php'; </script>";