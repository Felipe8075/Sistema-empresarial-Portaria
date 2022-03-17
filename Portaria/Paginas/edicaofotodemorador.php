<?php include_once"../conexao.php";?>


<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

if(isset($_FILES['foto']))
    {
        date_default_timezone_set("Brazil/East");

        $ext = strtolower(substr($_FILES['foto']['name'],-4));

        $new_name = date("Y.m.d-H.i.s") . $ext;
        $dir = '../Galeria/Fotomoradores/';

        move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name);
    }


$foto = $new_name;


$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  cmoradores SET  fotografia = '$foto' WHERE codigo = '$id'";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Você editou morador com sucesso !'); window.location = 'cdtmoradores.php';</script>";
    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>
