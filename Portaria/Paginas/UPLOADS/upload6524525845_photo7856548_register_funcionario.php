<?php include_once"../CONECT/conexao.php";?>

<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
$id = $_POST['id'];

if(isset($_FILES['fotoo']))
    {
        date_default_timezone_set("Brazil/East");

        $ext = strtolower(substr($_FILES['fotoo']['name'],-4));

        $new_name = date("Y.m.d-H.i.s") . $ext;
        $dir = '../../Galeria/funcionarios/';

        move_uploaded_file($_FILES['fotoo']['tmp_name'], $dir.$new_name);
    }


$foto = $new_name;


$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  funcionarioos SET fotofunc = '$foto' WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    header("Location: ../Records/cadastros58245659582geristros4523112.php");
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
?>