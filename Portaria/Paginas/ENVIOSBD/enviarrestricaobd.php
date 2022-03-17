<?php include_once"../CONECT/conexao.php";;?>


<?php
//trazer o id vai nos dar referêmcia da correspondência a ser entregue
    
    

    if(isset($_FILES['fotoo'])){
        date_default_timezone_set("Brazil/East");
        $trax = strtolower(substr($_FILES['fotoo']['name'],-4));

        $img = date("Y.m.d-H.i.s") . $trax;
        $pasta = '../../Galeria/Fotodobloqueado/';

        move_uploaded_file($_FILES['fotoo']['tmp_name'], $pasta.$img);
    };
    $id = filter_input(INPUT_POST,'ID', FILTER_DEFAULT);
    $nomemorador = filter_input(INPUT_POST,'nomedomorador',FILTER_DEFAULT);
    $apartamento = filter_input(INPUT_POST,'apartamento',FILTER_DEFAULT);
    $teleresidencia = filter_input(INPUT_POST,'telefoneresidencia',FILTER_DEFAULT);
    $telecelular = filter_input(INPUT_POST,'celular',FILTER_DEFAULT);
    $email = filter_input(INPUT_POST,'emaildomorador',FILTER_DEFAULT);
    $imgate = filter_input(INPUT_POST,'imgdeatent',FILTER_DEFAULT);
    $tiporestri1 = filter_input(INPUT_POST,'selecione_tipo_restri1',FILTER_DEFAULT);
    $tiporestri2 = filter_input(INPUT_POST,'selecione_tipo_restri2',FILTER_DEFAULT);
    $nomedobloqueado = filter_input(INPUT_POST,'nomedobloqueado',FILTER_DEFAULT);
    $documento = filter_input(INPUT_POST,'documentodobloqueado',FILTER_DEFAULT);
    $descreva = filter_input(INPUT_POST,'descridobloqueio',FILTER_DEFAULT);
    $datadobloqueio = filter_input(INPUT_POST,'databloqueada', FILTER_DEFAULT);
    $foto = $img;


$conexao = mysqli_connect ($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbname');
$sql = "UPDATE  cmoradores SET imgcam = '$imgate' WHERE codigo = '$id'";
$dados = "INSERT INTO restrito (apartamento, nomemorador, celresidencia, celular, email, restri1, restri2, nomebloquado, documentobloqueado, descri, fotografia, datarestrition) VALUES ('$apartamento','$nomemorador','$teleresidencia','$telecelular','$email','$tiporestri1','$tiporestri2','$nomedobloqueado','$documento','$descreva','$foto','$datadobloqueio')";


if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Restrição aplicada com sucesso!'); window.location = '../Records/cadastros58245659582geristros4523112.php'; </script>";
    
}else{
     echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
};

if (mysqli_query($conexao, $dados)){
    echo "<script>alert('Bloqueio efetuado com sucesso !'); </script>";
}else{
    echo "Deu erro: " . $dados . "<br>" . mysqli_error ($conexao);
};
mysqli_close($conexao);
?>
