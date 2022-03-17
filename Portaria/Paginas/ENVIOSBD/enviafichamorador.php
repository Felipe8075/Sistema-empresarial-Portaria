<?php include_once"../CONECT/conexao.php";

$nomefilter = filter_input(INPUT_POST,'nome-moradorC',FILTER_DEFAULT);
$docmentfilter = filter_input(INPUT_POST, 'documentacao', FILTER_DEFAULT);

$selecioneobanco = "SELECT * FROM cmoradores WHERE nomeMor = '$nomefilter' AND documento = '$docmentfilter'";
$Resultselectbanco = mysqli_query($conexao,$selecioneobanco);
$contar = mysqli_num_rows($Resultselectbanco);


while($receberRegistros = mysqli_fetch_array($Resultselectbanco)){
    $nameselecionado = $receberRegistros['nomeMor'];
    $documentoselecionado = $receberRegistros['documento'];
};

?>



<?php

if( $contar != 0){
    echo "<script>alert('Morador já tem Cadastro no sistema!.');window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";

        
}else{
    // echo "<script>alert('Morador já tem Cadastro no sistema!.');window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";
    if(isset($_FILES['fotoo']))
        {
            date_default_timezone_set("Brazil/East");

            $ext = strtolower(substr($_FILES['fotoo']['name'],-4));

            $new_name = date("Y.m.d-H.i.s") . $ext;
            $dir = '../../Galeria/Fotomoradores/';

            move_uploaded_file($_FILES['fotoo']['tmp_name'], $dir.$new_name);
        }
        $nomemorador = filter_input(INPUT_POST,'nome-moradorC',FILTER_DEFAULT);
        $residencia = filter_input(INPUT_POST, 'num-apartamento', FILTER_DEFAULT);
        $alocando = filter_input(INPUT_POST, 'alocacao', FILTER_DEFAULT);
        $nascidat = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
        $documentRG = filter_input(INPUT_POST, 'documentacao', FILTER_DEFAULT);
        $sexoo = filter_input(INPUT_POST, 'sexo', FILTER_DEFAULT);
        $teleresidencial = filter_input(INPUT_POST, 'telef-residencial', FILTER_DEFAULT);
        $celular1 = filter_input(INPUT_POST, 'telef-celular1', FILTER_DEFAULT);
        $portadoremer = filter_input(INPUT_POST, 'atendeamargencia', FILTER_DEFAULT);
        $emergencia = filter_input(INPUT_POST, 'celemergencia', FILTER_DEFAULT);
        $situation = filter_input(INPUT_POST, 'situacao', FILTER_DEFAULT);
        $tpodefi = filter_input(INPUT_POST, 'tipo-defi', FILTER_DEFAULT);
        $emaiil = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $senhamorador = filter_input(INPUT_POST, 'senhatemp', FILTER_DEFAULT);
        $seletdef = filter_input(INPUT_POST, 'existe', FILTER_DEFAULT);
        $image = $new_name;
        $datacadastro = filter_input(INPUT_POST, 'daycadastro', FILTER_DEFAULT);
        $idade = filter_input(INPUT_POST, 'idademorador', FILTER_DEFAULT);
        $senhasegura = password_hash($senhamorador,PASSWORD_DEFAULT);

    $conexao = mysqli_connect($servidor,$usuario,$senha,$dbnome);

    mysqli_select_db($conexao, 'dbnome');
    $sql = "INSERT INTO cmoradores (apt,alocado,nomeMor,anonasc,documento,sexo,teleRes,teleCel1,teleCel2,situacao,emailMor,tipoDef,senhapry,teleEMR,deficiente,fotografia,datacadastro,idade) VALUES ('$residenc','$alocando','$nomemorador','$nascidat','$documentRG','$sexoo','$teleresidencial','$celular1','$portadoremer','$situation','$emaiil','$tpodefi','$senhasegura','$emergencia','$seletdef','$image','$datacadastro','$idade')";


    if (mysqli_query($conexao, $sql)) {
        header("Location: ../Records/cadastros58245659582geristros4523112.php");
    }else{
        echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
        
    }
}
mysqli_close($conexao);
?>




<!--window.location = 'cdtmoradores.php'-->