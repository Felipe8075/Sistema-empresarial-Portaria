<?php include_once"../CONECT/conexao.php";

//Verificação no banco de dados 
$Verificar_Apartamento = filter_input(INPUT_POST,'Apartamento_bloco',FILTER_DEFAULT); //apartamento do veículo post para verificação
$Verificar_Nome_veiculo = filter_input(INPUT_POST,'Nome_veiculo',FILTER_DEFAULT); //Nome do veículo post para verificação
$Verificar_Placa_veiculo = filter_input(INPUT_POST,'Placa_veiculo',FILTER_DEFAULT); //Placa do veículo post para verificação

$select_banck_dice = "SELECT * FROM veiculos WHERE residencia = '$Verificar_Apartamento' AND nomeveiculo = '$Verificar_Nome_veiculo' AND pladoveiculo = '$Verificar_Placa_veiculo'";
$result_search_dice = mysqli_query($conexao, $select_banck_dice);
$cont_row_dice = mysqli_num_rows($result_search_dice);


if($cont_row_dice == 0){

        if(isset($_FILES['fotoo']))
    {
        date_default_timezone_set("Brazil/East");

        $ext = strtolower(substr($_FILES['fotoo']['name'],-4));

        $fast_name= date("Y.m.d.H.i.s") . $ext;
        $dir = '../../Galeria/Veiculos/';

        move_uploaded_file($_FILES['fotoo']['tmp_name'], $dir.$fast_name);
    
    }

$Apartamento = filter_input(INPUT_POST,'Apartamento_bloco',FILTER_DEFAULT); //apartamento do veículo
$estacionamento = filter_input(INPUT_POST,'Estacionamento',FILTER_DEFAULT); //Estacionamento do vaículo
$Nome_veiculo = filter_input(INPUT_POST,'Nome_veiculo',FILTER_DEFAULT); //Nome do veículo
$Marca_veiculo = filter_input(INPUT_POST,'Marca_veiculo',FILTER_DEFAULT); //Marca do Veículo
$Cor_veiculo = filter_input(INPUT_POST,'Cor_veiculo',FILTER_DEFAULT); //Cor do veículo
$Placa_veiculo = filter_input(INPUT_POST,'Placa_veiculo',FILTER_DEFAULT); //Placa do veículo
$Ano_veiculo = filter_input(INPUT_POST,'Ano_veiculo',FILTER_DEFAULT); //Ano do veículo
$data_cadastro = filter_input(INPUT_POST,'datecad',FILTER_DEFAULT); //Data de registro do veículo no banco de dados
$hora_cadastro = filter_input(INPUT_POST,'horacad',FILTER_DEFAULT); //Horário registro do veículo no banco de dados
$imagem = $fast_name;
$conexao = mysqli_connect($servidor,$usuario,$senha,$dbnome);

mysqli_select_db($conexao, 'dbnome');

$sql = "INSERT INTO veiculos (residencia,blocomorador,nomeveiculo,marcaveiculo,cordoveiculo,pladoveiculo,anodoveiculo,fotodoveiculo,data_registro,hora_registro) VALUES ('$Apartamento','$estacionamento','$Nome_veiculo','$Marca_veiculo','$Cor_veiculo','$Placa_veiculo','$Ano_veiculo','$imagem','$data_cadastro','$hora_cadastro')";

if (mysqli_query($conexao, $sql)) {
    echo "<script>alert('Cadastro efetuado com sucesso!'); window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";

    
}else{
    echo "Deu erro: " . $sql . "<br>" . mysqli_error ($conexao);
}
mysqli_close($conexao);
}else{
    echo "<script>alert('Este veículo já tem cadastro no sistema!'); window.location = '../Records/cadastros58245659582geristros4523112.php';</script>";
};

?>

