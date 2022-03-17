<?php include_once"../CONECT/conexao.php";

//Verificação no banco de dados 
$Verificar_Apartamento = filter_input(INPUT_POST,'Aprtamento',FILTER_DEFAULT); //apartamento do veículo post para verificação
$Verificar_Nome_Funcionario = filter_input(INPUT_POST,'Nome_funcionario',FILTER_DEFAULT); //Nome do veículo post para verificação
$Verificar_documento = filter_input(INPUT_POST,'documentofuncionario',FILTER_DEFAULT); //Placa do veículo post para verificação

$select_banck_dice = "SELECT * FROM funcionarioos WHERE numapartament = '$Verificar_Apartamento' AND nomefunc = '$Verificar_Nome_Funcionario' AND documentofunc = '$Verificar_documento'";
$result_search_dice = mysqli_query($conexao, $select_banck_dice);
$cont_row_dice = mysqli_num_rows($result_search_dice);


if($cont_row_dice == 0){
    if(isset($_FILES['fotoo'])){
        date_default_timezone_set("Brazil/East");

        $ext = strtolower(substr($_FILES['fotoo']['name'],-4));

        $new_name = date("Y.m.d.H.i.s") . $ext;
        $dir = '../../Galeria/funcionarios/';

        move_uploaded_file($_FILES['fotoo']['tmp_name'], $dir.$new_name);
    }
    $funcapart = filter_input(INPUT_POST, 'Aprtamento', FILTER_DEFAULT);
    $funcnome = filter_input(INPUT_POST, 'Nome_funcionario', FILTER_DEFAULT);
    $telefonefunc = filter_input(INPUT_POST, 'Telefone_funcionario', FILTER_DEFAULT);
    $documento = filter_input(INPUT_POST, 'documentofuncionario', FILTER_DEFAULT);
    $horarioentrada = filter_input(INPUT_POST, 'horarioentrada', FILTER_DEFAULT);
    $entradaperimitida = filter_input(INPUT_POST, 'select_tipodeentrada', FILTER_DEFAULT);
    $data_cadastral = filter_input(INPUT_POST, 'data_cadastro', FILTER_DEFAULT);
    $hora_cadastral = filter_input(INPUT_POST, 'hora_cadastro', FILTER_DEFAULT);
    $imagem = $new_name;
    

$conexao = mysqli_connect($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbnome');

$sql = "INSERT INTO funcionarioos (numapartament,nomefunc,documentofunc,celularfunc,horario,permicao,fotofunc,Data_registro,Hora_registro) VALUES ('$funcapart','$funcnome','$documento','$telefonefunc','$horarioentrada','$entradaperimitida','$imagem','$data_cadastral','$hora_cadastral')";

if (mysqli_query($conexao, $sql)){
    echo "<script>alert('Cadastro efetuado com sucesso!'); window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
}else{
    echo "<script>alert('Funcionário já tem cadastro no sistema!'); window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";

};
?>